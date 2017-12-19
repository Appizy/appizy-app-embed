<?php
/**
 * Administration Menu Options
 *
 * @package Appizy App Embed
 */

function appizy_add_settings_link( $links, $file ) {

	static $this_plugin;

	if ( ! $this_plugin ) {
		$this_plugin = plugin_basename( __FILE__ );
	}

	if ( strpos( $file, 'code-embed.php' ) !== false ) {
		$settings_link = '<a href="admin.php?page=ce-options">' . __( 'Settings', 'appizy-app-embed' ) . '</a>';
		array_unshift( $links, $settings_link );
	}

	return $links;
}

add_filter( 'plugin_action_links', 'appizy_add_settings_link', 10, 2 );

function appizy_menu() {

	// Add search sub-menu.
	global $ce_search_hook;

	$ce_search_hook = add_submenu_page( 'tools.php', __( 'Code Embed Search', 'appizy-app-embed' ), __( 'Appizy', 'appizy-app-embed' ), 'edit_posts', 'appizy-search', 'appizy_search' );

	add_action( 'load-' . $ce_search_hook, 'appizy_add_options_help' );
}

add_action( 'admin_menu', 'appizy_menu' );

/**
 * Add Options Help
 *
 * Add help tab to options screen
 *
 * @since    2.0
 *
 * @uses     ce_options_help    Return help text
 */
function appizy_add_options_help() {

	global $ce_options_hook;
	$screen = get_current_screen();

	if ( $screen->id !== $ce_options_hook ) {
		return;
	}

	$screen->add_help_tab(
		array(
			'id'      => 'appizy-options-help-tab',
			'title'   => __( 'Help', 'appizy-app-embed' ),
			'content' => 'Hello',
		)
	);
}

/**
 * Define a tool screen
 */
function appizy_search() {
	include_once __DIR__ . '/tools-screen.php';
}

