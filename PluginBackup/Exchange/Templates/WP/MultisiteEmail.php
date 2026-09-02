<?php
/**
 * WordPress multisite notification email catalog.
 *
 * @package MSPress
 * @subpackage Includes\Plugins\Exchange\Templates\WP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return [
	'new_site_created' => [
		'name'      => 'New Site Created',
		'source'    => 'WordPress multisite site-registration notification',
		'recipient' => 'Network admin',
		'subject'   => '[%s] New Site Created',
		'body'      => 'A new site has been added to your network. Includes the site URL and owner.',
		'inferred'  => true,
	],
	'new_user_added' => [
		'name'      => 'New User Added',
		'source'    => 'WordPress multisite user-registration notification',
		'recipient' => 'Network admin',
		'subject'   => '[%s] New User Added to Network',
		'body'      => 'A user has been added to your network. Includes the username and assigned site.',
		'inferred'  => true,
	],
];
