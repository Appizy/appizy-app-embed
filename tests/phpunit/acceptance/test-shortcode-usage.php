<?php

/**
 * Class SampleTest
 *
 * @package Wp_Meta_Verify
 */
class SampleTest extends WP_UnitTestCase {

	function setUp() {
		parent::setUp();
	}

	function tearDown() {
		parent::tearDown();
	}

	function test_appizy_shortcode() {
		$post_content = <<<EOF
Graf by itself:[appizy]
EOF;

		$expected = <<<EOF
<p>Graf by itself:<div class='appizy-app'><iframe class='appizy-app-iframe' data-app-id='' frameborder='0' width='100%' src=''></iframe></div></p>
EOF;

		$post_id = self::factory()->post->create( compact( 'post_content' ) );
		$this->go_to( get_permalink( $post_id ) );
		$this->assertTrue( is_single() );
		$this->assertTrue( have_posts() );
		$this->assertNull( the_post() );

		$this->assertEquals( strip_ws( $expected ), strip_ws( get_echo( 'the_content' ) ) );
	}

	function test_appizy_shortcode_print_enabled() {
		$post_content = <<<EOF
Graf by itself:[appizy print="enabled"]
EOF;

		$expected = <<<EOF
<p>Graf by itself:<div class='appizy-app'><iframe class='appizy-app-iframe' data-app-id='' frameborder='0' width='100%' src=''></iframe><div class="appizy-app-toolbar"><button class="button button-print">Print</button></div></p>
EOF;

		$post_id = self::factory()->post->create( compact( 'post_content' ) );
		$this->go_to( get_permalink( $post_id ) );

		$this->assertEquals( strip_ws( $expected ), strip_ws( get_echo( 'the_content' ) ) );
	}
}
