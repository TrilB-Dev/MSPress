<?php

declare( strict_types=1 );

use MSPress\Includes\Plugins\Onedrive\Includes\OneDrive\OneDriveItemService;
use PHPUnit\Framework\TestCase;

final class OneDriveItemServiceTest extends TestCase {
	/**
	 * @return iterable<string, array{string, string}>
	 */
	public function item_path_provider(): iterable {
		yield 'nested path with spaces and reserved characters' => [
			'Folder With Spaces/File #1%.txt',
			'https://graph.microsoft.com/v1.0/me/drive/root:/Folder%20With%20Spaces/File%20%231%25.txt',
		];
		yield 'nested path preserves separators' => [
			'Projects/Client Documents/Final Report.docx',
			'https://graph.microsoft.com/v1.0/me/drive/root:/Projects/Client%20Documents/Final%20Report.docx',
		];
	}

	/**
	 * @dataProvider item_path_provider
	 */
	public function testBuildRootItemUrlEncodesEachPathSegment( string $item_path, string $expected_url ): void {
		$service = ( new ReflectionClass( OneDriveItemService::class ) )->newInstanceWithoutConstructor();
		$method = ( new ReflectionClass( $service ) )->getMethod( 'build_root_item_url' );
		$method->setAccessible( true );

		self::assertSame( $expected_url, $method->invoke( $service, $item_path ) );
	}
}
