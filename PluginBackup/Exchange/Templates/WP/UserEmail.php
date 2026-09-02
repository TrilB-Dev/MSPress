<?php
/**
 * WordPress user notification email catalog.
 *
 * @package MSPress
 * @subpackage Includes\Plugins\Exchange\Templates\WP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return [
	'password_reset_request' => [
		'name'      => 'Password Reset Request',
		'source'    => 'retrieve_password()',
		'recipient' => 'User requesting a password reset',
		'subject'   => '[%s] Password Reset',
		'body'      => 'Someone requested a password reset for your account. Contains the reset link and username.',
	],
	'email_address_changed' => [
		'name'      => 'Email Address Change Confirmation',
		'source'    => 'WordPress user email-change notification',
		'recipient' => 'User',
		'subject'   => '[%s] Email Change Confirmation',
		'body'      => 'You requested to change the email address associated with your account. Includes a confirmation link.',
		'inferred'  => true,
	],
	'new_user_welcome' => [
		'name'      => 'New User Welcome',
		'source'    => 'wp_new_user_notification()',
		'recipient' => 'Newly registered user',
		'subject'   => '[%s] Your Account Details',
		'body'      => 'Welcome. Your account has been created. Includes the username and login link.',
		'inferred'  => true,
	],
	'personal_data_export' => [
		'name'      => 'Personal Data Export',
		'source'    => 'WordPress personal data export notification',
		'recipient' => 'User requesting data',
		'subject'   => '[%s] Your Personal Data Export',
		'body'      => 'Your personal data export is ready. Includes a download link.',
		'inferred'  => true,
	],
	'personal_data_erasure' => [
		'name'      => 'Personal Data Erasure Confirmation',
		'source'    => 'WordPress personal data erasure notification',
		'recipient' => 'User',
		'subject'   => '[%s] Personal Data Erasure Completed',
		'body'      => 'Your personal data has been erased. Includes a summary of erased items.',
		'inferred'  => true,
	],
];
