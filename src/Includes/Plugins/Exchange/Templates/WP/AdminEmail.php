<?php
/**
 * WordPress administrator notification email catalog.
 *
 * @package MSPress
 * @subpackage Includes\Plugins\Exchange\Templates\WP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return [
	'password_changed' => [
		'name'      => 'Password Changed Notification',
		'source'    => 'wp_password_change_notification()',
		'recipient' => 'Site admin',
		'subject'   => '[%s] Password Changed',
		'body'      => 'A user has changed their password. Includes the username and site information.',
		'inferred'  => true,
	],
	'new_user_registration_admin' => [
		'name'      => 'New User Registration (Admin)',
		'source'    => 'wp_new_user_notification()',
		'recipient' => 'Site admin',
		'subject'   => '[%s] New User Registration',
		'body'      => 'A new user has registered on your site. Includes the username and email address.',
		'inferred'  => true,
	],
	'admin_email_verification' => [
		'name'      => 'Admin Email Verification',
		'source'    => 'WordPress admin email verification',
		'recipient' => 'Site admin',
		'subject'   => '[%s] Admin Email Verification',
		'body'      => 'Please confirm the admin email address for your site. Includes a verification link.',
		'inferred'  => true,
	],
	'automatic_update_results' => [
		'name'      => 'Automatic Update Results',
		'source'    => 'WP_Automatic_Updater::send_email()',
		'recipient' => 'Site admin',
		'subject'   => '[%s] Automatic Update Results',
		'body'      => 'Your site has completed automatic updates. Includes plugin, theme, and core update results.',
		'inferred'  => true,
	],
	'site_health_notification' => [
		'name'      => 'Site Health Notification',
		'source'    => 'WordPress Site Health notification',
		'recipient' => 'Site admin',
		'subject'   => '[%s] Critical Site Issue Detected',
		'body'      => 'A critical issue has been detected on your site. Includes diagnostic details.',
		'inferred'  => true,
	],
	'recovery_mode_link' => [
		'name'      => 'Recovery Mode Link',
		'source'    => 'WordPress fatal error protection',
		'recipient' => 'Site admin',
		'subject'   => '[%s] Your Site is Experiencing Technical Difficulties',
		'body'      => 'A fatal error occurred. Use the recovery link below to access your site. Includes the recovery URL and expiration time.',
		'inferred'  => true,
	],
];
