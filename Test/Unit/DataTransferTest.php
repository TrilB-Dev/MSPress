<?php

declare( strict_types=1 );

use MSPress\Includes\Tools\DataTransfer;
use PHPUnit\Framework\TestCase;

final class DataTransferTest extends TestCase {
	public function testValidGraphCorePayloadIsAccepted(): void {
		$data = [
			'schema' => DataTransfer::SCHEMA,
			'version' => DataTransfer::VERSION,
			'graph_core' => [
				'client_id' => 'client-id',
				'tenant_id' => 'tenant-id',
				'enable_graph_mailer' => 'on',
			],
		];

		self::assertSame( [ 'valid' => true, 'errors' => [] ], DataTransfer::validate( $data ) );
	}

	/**
	 * @dataProvider invalidPayloadProvider
	 */
	public function testUnsupportedPayloadsAreRejected( array $data ): void {
		$result = DataTransfer::validate( $data );

		self::assertFalse( $result['valid'] );
		self::assertNotEmpty( $result['errors'] );
	}

	/**
	 * @return iterable<string, array{array<string, mixed>}>
	 */
	public function invalidPayloadProvider(): iterable {
		$valid = [
			'schema' => DataTransfer::SCHEMA,
			'version' => DataTransfer::VERSION,
			'graph_core' => [
				'client_id' => 'client-id',
				'tenant_id' => 'tenant-id',
				'enable_graph_mailer' => 'off',
			],
		];

		$legacy = $valid;
		$legacy['settings'] = [];

		$unknown_field = $valid;
		$unknown_field['graph_core']['client_secret'] = 'must-not-import';

		$missing_field = $valid;
		unset( $missing_field['graph_core']['tenant_id'] );

		$invalid_mailer = $valid;
		$invalid_mailer['graph_core']['enable_graph_mailer'] = 'yes';

		$wrong_type = $valid;
		$wrong_type['graph_core']['client_id'] = 123;

		yield 'legacy section' => [ $legacy ];
		yield 'unknown graph core field' => [ $unknown_field ];
		yield 'missing field' => [ $missing_field ];
		yield 'invalid mailer value' => [ $invalid_mailer ];
		yield 'non-string field' => [ $wrong_type ];
	}

	public function testExportJsonUsesTheGraphCoreSchema(): void {
		$json = DataTransfer::export_json();

		self::assertJson( $json );
		self::assertSame( DataTransfer::SCHEMA, json_decode( $json, true )['schema'] );
	}
}