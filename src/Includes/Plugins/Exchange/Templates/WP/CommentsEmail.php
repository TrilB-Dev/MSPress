<?php
/**
 * WordPress comment notification email catalog.
 *
 * @package MSPress
 * @subpackage Includes\Plugins\Exchange\Templates\WP
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

return [
	'comment_awaiting_moderation' => [
		'name'      => 'Comment Awaiting Moderation',
		'source'    => 'wp_notify_moderator()',
		'recipient' => 'Site admin and post author when they can edit comments',
		'subject'   => '[%1$s] Please moderate: "%2$s"',
		'body'      => 'A comment, pingback, or trackback requires approval. Includes comment content, author information, and moderation links.',
	],
	'comment_published' => [
		'name'      => 'Comment Published',
		'source'    => 'wp_notify_postauthor()',
		'recipient' => 'Post author',
		'subject'   => '[%1$s] Comment: "%2$s"',
		'body'      => 'A comment has been automatically approved, a note was added, or a previously moderated comment was approved. Includes comment text and links to the post.',
	],
];
