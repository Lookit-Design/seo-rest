<?php
/**
 * Plugin Name: Nexus – SEO REST Meta for Watchdog
 * Description: Registers SEO meta fields for the watchdog post type so they are writable via the WordPress REST API (used by n8n). Works with Yoast SEO.
 * Version:     1.0.2
 * Author:      Lookit Design
 * License:     GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Requires at least: 5.9
 * Requires PHP: 7.4
 * Text Domain: nexus-seo-rest
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action(
	'init',
	function () {

		$fields = array(
			'_yoast_wpseo_focuskw'       => 'Focus keyphrase',
			'_yoast_wpseo_metadesc'      => 'Meta description',
			'_yoast_wpseo_focuskeywords' => 'Related keyphrases (Yoast Premium)',
		);

		foreach ( $fields as $key => $label ) {
			register_post_meta(
				'watchdog',
				$key,
				array(
					'show_in_rest'  => true,
					'single'        => true,
					'type'          => 'string',
					'description'   => $label,
					'auth_callback' => function ( $allowed, $meta_key, $object_id ) {
						unset( $allowed, $meta_key );
						return current_user_can( 'edit_post', $object_id );
					},
				)
			);
		}
	},
	20
); // Priority 20 — runs after Yoast's own init hooks
