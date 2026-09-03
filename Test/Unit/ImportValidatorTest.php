<?php

declare( strict_types=1 );

use MSPress\Includes\Tools\DataTransfer;
use MSPress\Includes\Tools\ImportValidator;
use PHPUnit\Framework\TestCase;

final class ImportValidatorTest extends TestCase {
	public function testFromJsonReturnsValidatedGraphCoreData(): void {
		$data = $this->validData();

		$result = ImportValidator::from_json( json_encode( $data ) );

		self::assertSame( $data, $result );
	}

	/**
	 * @dataProvider invalidJsonProvider
	 */
	public function testFromJsonRejectsInvalidInput( string $json, string $error_code ): void {
		$result = ImportValidator::from_json( $json );

		self::assertInstanceOf( WP_Error::class, $result );
		self::assertSame( $error_code, $result->get_error_code() );
	}

	/**
	 * @return iterable<string, array{string, string}>
	 */
	public function invalidJsonProvider(): iterable {
		yield 'empty' => [ '  ', 'empty_import' ];
		yield 'malformed JSON' => [ '{', 'invalid_json' ];
		yield 'scalar JSON' => [ 'true', 'invalid_json' ];
		yield 'legacy JSON' => [ json_encode( [ 'settings' => [] ] ), 'invalid_import' ];
	}

	public function testFileRejectsMalformedUploadMetadata(): void {
		$result = ImportValidator::file( 'not-an-upload' );

		self::assertInstanceOf( WP_Error::class, $result );
		self::assertSame( 'invalid_upload', $result->get_error_code() );
	}

	public function testFileValidatesReadableJsonUpload(): void {
		$path = tempnam( sys_get_temp_dir(), 'mspress-import-' );
		self::assertNotFalse( $path );

		file_put_contents( $path, json_encode( $this->validData() ) );
		$result = ImportValidator::file( [ 'error' => UPLOAD_ERR_OK, 'tmp_name' => $path ] );
		unlink( $path );

		self::assertIsArray( $result );
		self::assertSame( DataTransfer::SCHEMA, $result['schema'] );
	}

	/**
	 * @return array{schema: string, version: int, graph_core: array{client_id: string, tenant_id: string, enable_graph_mailer: string}}
	 */
	private function validData(): array {
		return [
			'schema' => DataTransfer::SCHEMA,
			'version' => DataTransfer::VERSION,
			'graph_core' => [
				'client_id' => 'client-id',
				'tenant_id' => 'tenant-id',
				'enable_graph_mailer' => 'on',
			],
		];
	}
}