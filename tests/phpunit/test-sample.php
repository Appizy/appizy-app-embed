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

	/**
	 * A single example test.
	 */
	public function test_sample() {
		// Replace this with some actual testing code.
		$this->assertTrue( true );
	}

	function test_appizy_shortcode() {
		$post_content = <<<EOF
Graf by itself:[appizy]
EOF;

		$expected = <<<EOF
<p>Graf by itself:</p>
EOF;

		$post_id = self::factory()->post->create( compact( 'post_content' ) );
		$this->go_to( get_permalink( $post_id ) );
		$this->assertTrue( is_single() );
		$this->assertTrue( have_posts() );
		$this->assertNull( the_post() );

		$this->assertEquals( strip_ws( $expected ), strip_ws( get_echo( 'the_content' ) ) );
	}
}
