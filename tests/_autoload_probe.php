<?php

define('ABSPATH', __DIR__ . '/');

fwrite(STDOUT, 'before-platform' . PHP_EOL);

register_shutdown_function(static function (): void {
	$error = error_get_last();
	fwrite(STDOUT, 'shutdown: ' . json_encode($error) . PHP_EOL);
	fwrite(STDOUT, 'ob-level: ' . ob_get_level() . PHP_EOL);
});

set_error_handler(static function (int $severity, string $message, string $file, int $line): bool {
	fwrite(STDOUT, sprintf("error: %s in %s:%d%s", $message, $file, $line, PHP_EOL));

	return false;
});

set_exception_handler(static function (Throwable $exception): void {
	fwrite(STDOUT, sprintf("exception: %s in %s:%d%s", $exception->getMessage(), $exception->getFile(), $exception->getLine(), PHP_EOL));
});

$composerDirectory = dirname(__DIR__) . '/vendor/composer';

require $composerDirectory . '/platform_check.php';
fwrite(STDOUT, 'after-platform' . PHP_EOL);

require $composerDirectory . '/ClassLoader.php';
fwrite(STDOUT, 'after-class-loader' . PHP_EOL);

require $composerDirectory . '/autoload_static.php';
fwrite(STDOUT, 'after-autoload-static' . PHP_EOL);

$loader = new \Composer\Autoload\ClassLoader(dirname($composerDirectory));
fwrite(STDOUT, 'after-loader-construction' . PHP_EOL);

$initializer = \Composer\Autoload\ComposerStaticInit6e978fa0e717dda51834da926411b64d::getInitializer($loader);
fwrite(STDOUT, 'after-initializer' . PHP_EOL);
$initializer($loader);
fwrite(STDOUT, 'after-initializer-call' . PHP_EOL);

$loader->register(true);
fwrite(STDOUT, 'after-register' . PHP_EOL);

$files = \Composer\Autoload\ComposerStaticInit6e978fa0e717dda51834da926411b64d::$files;
fwrite(STDOUT, 'file-count: ' . count($files) . PHP_EOL);

foreach ($files as $fileIdentifier => $file) {
	fwrite(STDOUT, 'before-file: ' . $fileIdentifier . ' ' . $file . PHP_EOL);
	require_once $file;
	fwrite(STDOUT, 'after-file: ' . $fileIdentifier . PHP_EOL);
}

fwrite(STDOUT, 'after-files' . PHP_EOL);