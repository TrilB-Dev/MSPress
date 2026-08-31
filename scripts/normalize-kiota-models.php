<?php

declare(strict_types=1);

$projectRoot = dirname(__DIR__);
$canonicalModelDirectory = $projectRoot . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Includes' . DIRECTORY_SEPARATOR . 'MSGraph' . DIRECTORY_SEPARATOR . 'Kiota' . DIRECTORY_SEPARATOR . 'Models';
$canonicalModelNamespace = 'MSPress\\Includes\\MSGraph\\Kiota\\Models';
$pluginClients = [
	'Entra' => [
		'path' => 'src/Includes/Plugins/Entra/Includes/Kiota',
		'namespace' => 'MSPress\\Includes\\Plugins\\Entra\\Includes\\Kiota',
	],
	'Exchange' => [
		'path' => 'src/Includes/Plugins/Exchange/Includes/Kiota',
		'namespace' => 'MSPress\\Includes\\Plugins\\Exchange\\Includes\\Kiota',
	],
	'OneDrive' => [
		'path' => 'src/Includes/Plugins/Onedrive/Includes/Kiota',
		'namespace' => 'MSPress\\Includes\\Plugins\\OneDrive\\Includes\\Kiota',
	],
	'SharePoint' => [
		'path' => 'src/Includes/Plugins/Sharepoint/Includes/Kiota',
		'namespace' => 'MSPress\\Includes\\Plugins\\SharePoint\\Includes\\Kiota',
	],
];

$dryRun = in_array('--dry-run', $argv, true) || in_array('--check', $argv, true);
$errors = [];
$changes = [];
$modelSources = [];
$namespaceReplacements = [];
$virtualContents = [];

foreach ($pluginClients as $client) {
	$namespaceReplacements[$client['namespace'] . '\\Models'] = $canonicalModelNamespace;
}

function normalizePath(string $path): string
{
	return str_replace('\\', '/', $path);
}

function relativePhpFiles(string $directory): array
{
	if (!is_dir($directory)) {
		return [];
	}

	$files = [];
	$iterator = new RecursiveIteratorIterator(
		new RecursiveDirectoryIterator($directory, FilesystemIterator::SKIP_DOTS)
	);

	foreach ($iterator as $file) {
		if ($file->isFile() && strtolower($file->getExtension()) === 'php') {
			$relativePath = substr($file->getPathname(), strlen($directory) + 1);
			$files[normalizePath($relativePath)] = $file->getPathname();
		}
	}

	ksort($files);

	return $files;
}

function replaceModelNamespaces(string $contents, array $replacements): string
{
	uksort($replacements, static fn (string $left, string $right): int => strlen($right) <=> strlen($left));

	return str_replace(array_keys($replacements), array_values($replacements), $contents);
}

function displayChange(array &$changes, string $message): void
{
	$changes[] = $message;
}

function writeFileIfNeeded(string $path, string $contents, bool $dryRun): bool
{
	if (is_file($path) && file_get_contents($path) === $contents) {
		return true;
	}

	if ($dryRun) {
		return true;
	}

	$directory = dirname($path);
	if (!is_dir($directory) && !mkdir($directory, 0777, true) && !is_dir($directory)) {
		return false;
	}

	return file_put_contents($path, $contents) !== false;
}

function clearPathAttributes(string $path): bool
{
	if (!@chmod($path, 0777) && PHP_OS_FAMILY !== 'Windows') {
		return false;
	}

	if (PHP_OS_FAMILY !== 'Windows') {
		return true;
	}

	$quotedPath = '"' . str_replace('"', '""', $path) . '"';
	$output = [];
	$status = 0;
	exec('attrib -R -A ' . $quotedPath, $output, $status);

	return $status === 0;
}

function removeDirectory(string $directory, ?string &$failure = null): bool
{
	if (!is_dir($directory)) {
		return true;
	}

	try {
		if (!clearPathAttributes($directory)) {
			$failure = 'clear attributes: ' . $directory;
			return false;
		}

		$iterator = new RecursiveIteratorIterator(
			new RecursiveDirectoryIterator($directory, FilesystemIterator::SKIP_DOTS),
			RecursiveIteratorIterator::CHILD_FIRST
		);

		foreach ($iterator as $file) {
			$path = $file->getPathname();
			if (!clearPathAttributes($path)) {
				$failure = 'clear attributes: ' . $path;
				return false;
			}

			if ($file->isDir()) {
				if (!@rmdir($path)) {
					$failure = 'rmdir: ' . $path;
					return false;
				}
			} elseif (!@unlink($path)) {
				$failure = 'unlink: ' . $path;
				return false;
			}
		}
	} catch (Throwable $exception) {
		$failure = 'iterate: ' . $directory . ' (' . $exception->getMessage() . ')';
		return false;
	}

	clearstatcache(true, $directory);
	if (!@rmdir($directory)) {
		$failure = 'rmdir: ' . $directory;
		return false;
	}

	clearstatcache(true, $directory);
	if (is_dir($directory)) {
		$failure = 'verify removal: ' . $directory;
		return false;
	}

	return true;
}

foreach ($pluginClients as $name => $client) {
	$pluginRoot = $projectRoot . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $client['path']);
	$modelDirectory = $pluginRoot . DIRECTORY_SEPARATOR . 'Models';
	$files = relativePhpFiles($modelDirectory);

	if (!is_dir($modelDirectory)) {
		continue;
	}

	foreach ($files as $relativePath => $sourcePath) {
		$contents = file_get_contents($sourcePath);
		if ($contents === false) {
			$errors[] = 'Unable to read ' . normalizePath($sourcePath);
			continue;
		}

		$normalizedContents = replaceModelNamespaces($contents, $namespaceReplacements);
		$destinationPath = $canonicalModelDirectory . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $relativePath);
		$virtualContents[normalizePath($sourcePath)] = $normalizedContents;
		$virtualContents[normalizePath($destinationPath)] = $normalizedContents;

		if (isset($modelSources[$relativePath])) {
			if ($modelSources[$relativePath]['contents'] !== $normalizedContents) {
				$errors[] = 'Conflicting generated model: ' . $relativePath . ' (' . $modelSources[$relativePath]['client'] . ' vs ' . $name . ')';
			}
			continue;
		}

		$modelSources[$relativePath] = [
			'client' => $name,
			'contents' => $normalizedContents,
		];

		if (is_file($destinationPath)) {
			$existingContents = file_get_contents($destinationPath);
			if ($existingContents === false || replaceModelNamespaces($existingContents, $namespaceReplacements) !== $normalizedContents) {
				$errors[] = 'Conflicting canonical model: ' . $relativePath . ' (' . $name . ')';
			}
		} else {
			displayChange($changes, 'copy ' . $relativePath . ' from ' . $name . ' to Core');
			if (!writeFileIfNeeded($destinationPath, $normalizedContents, $dryRun)) {
				$errors[] = 'Unable to write ' . normalizePath($destinationPath);
			}
		}
	}
}

if ($errors !== []) {
	foreach ($errors as $error) {
		fwrite(STDERR, 'ERROR: ' . $error . PHP_EOL);
	}
	exit(1);
}

foreach ($pluginClients as $name => $client) {
	$pluginRoot = $projectRoot . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $client['path']);
	$modelDirectory = $pluginRoot . DIRECTORY_SEPARATOR . 'Models';
	if (!is_dir($modelDirectory)) {
		continue;
	}

	foreach (relativePhpFiles($pluginRoot) as $relativePath => $sourcePath) {
		if (str_starts_with($relativePath, 'Models/')) {
			continue;
		}

		$contents = file_get_contents($sourcePath);
		if ($contents === false) {
			$errors[] = 'Unable to read ' . normalizePath($sourcePath);
			continue;
		}

		$rewrittenContents = replaceModelNamespaces($contents, $namespaceReplacements);
		if ($rewrittenContents !== $contents) {
			$virtualContents[normalizePath($sourcePath)] = $rewrittenContents;
			displayChange($changes, 'rewrite model references in ' . $name . '/' . $relativePath);
			if (!writeFileIfNeeded($sourcePath, $rewrittenContents, $dryRun)) {
				$errors[] = 'Unable to rewrite ' . normalizePath($sourcePath);
			}
		}
	}
}

if ($errors !== []) {
	foreach ($errors as $error) {
		fwrite(STDERR, 'ERROR: ' . $error . PHP_EOL);
	}
	exit(1);
}

$generatedRoots = [$canonicalModelDirectory];
foreach ($pluginClients as $client) {
	$generatedRoots[] = $projectRoot . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $client['path']);
}

foreach ($generatedRoots as $generatedRoot) {
	foreach (relativePhpFiles($generatedRoot) as $relativePath => $sourcePath) {
		$normalizedSourcePath = normalizePath($sourcePath);
		$contents = $virtualContents[$normalizedSourcePath] ?? file_get_contents($sourcePath);
		if ($contents === false) {
			$errors[] = 'Unable to validate ' . normalizePath($sourcePath);
			continue;
		}

		foreach ($namespaceReplacements as $oldNamespace => $newNamespace) {
			if (str_contains($contents, $oldNamespace)) {
				$errors[] = 'Stale model namespace in ' . normalizePath($sourcePath) . ': ' . $oldNamespace;
			}
		}
	}
}

if ($errors !== []) {
	foreach ($errors as $error) {
		fwrite(STDERR, 'ERROR: ' . $error . PHP_EOL);
	}
	exit(1);
}

if (!$dryRun) {
	foreach ($pluginClients as $name => $client) {
		$pluginRoot = $projectRoot . DIRECTORY_SEPARATOR . str_replace('/', DIRECTORY_SEPARATOR, $client['path']);
		$modelDirectory = $pluginRoot . DIRECTORY_SEPARATOR . 'Models';
		displayChange($changes, 'remove ' . $name . '/Models');
		$failure = null;
		if (!removeDirectory($modelDirectory, $failure)) {
			fwrite(STDERR, 'ERROR: Unable to remove ' . normalizePath($modelDirectory) . ' (' . normalizePath($failure ?? 'unknown failure') . ')' . PHP_EOL);
			exit(1);
		}
	}
}

$mode = $dryRun ? 'Dry run' : 'Normalized';
fwrite(STDOUT, $mode . ' Kiota models. ' . count($modelSources) . ' model files checked.' . PHP_EOL);
foreach ($changes as $change) {
	fwrite(STDOUT, ' - ' . $change . PHP_EOL);
}
