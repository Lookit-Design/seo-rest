<?php
/**
 * @package Nexus_SEO_REST
 */

class Test_Nexus_SEO_REST_Plugin extends WP_UnitTestCase {

	public function test_registers_yoast_meta_for_watchdog() {
		$registered = get_registered_meta_keys( 'post', 'watchdog' );
		$this->assertArrayHasKey( '_yoast_wpseo_focuskw', $registered );
		$this->assertArrayHasKey( '_yoast_wpseo_metadesc', $registered );
		$this->assertArrayHasKey( '_yoast_wpseo_focuskeywords', $registered );
		$this->assertTrue( $registered['_yoast_wpseo_focuskw']['show_in_rest'] );
	}

	public function test_meta_auth_requires_edit_post() {
		$author = self::factory()->user->create( array( 'role' => 'author' ) );
		$editor = self::factory()->user->create( array( 'role' => 'editor' ) );
		$own    = self::factory()->post->create( array( 'post_author' => $author ) );
		$other  = self::factory()->post->create( array( 'post_author' => $editor ) );

		$registered = get_registered_meta_keys( 'post', 'watchdog' );
		$callback   = $registered['_yoast_wpseo_focuskw']['auth_callback'];

		wp_set_current_user( $author );
		$this->assertTrue( $callback( false, '_yoast_wpseo_focuskw', $own ) );
		$this->assertFalse( $callback( false, '_yoast_wpseo_focuskw', $other ) );
	}
}
