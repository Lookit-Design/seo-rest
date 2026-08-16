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
}
