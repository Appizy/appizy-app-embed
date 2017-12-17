<?php
/**
 * Administration Menu Options
 *
 * Add various adminstration menu options
 *
 * @package  appizy-app-embed
 */

/**
 * Add Settings link to plugin list
 *
 * Add a Settings link to the options listed against this plugin
 *
 * @since    1.6
 *
 * @param    string $links Current links.
 * @param    string $file File in use.
 *
 * @return   string          Links, now with settings added
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

/**
 * Add meta to plugin details
 *
 * Add options to plugin meta line
 *
 * @since    1.6
 *
 * @param    string $links Current links.
 * @param    string $file File in use.
 *
 * @return   string          Links, now with settings added
 */
function appizy_set_plugin_meta( $links, $file ) {

	if ( strpos( $file, 'code-embed.php' ) !== false ) {
		$links = array_merge( $links, array( '<a href="https://wordpress.org/plugins/simple-embed-code/">' . __( 'Support', 'appizy-app-embed' ) . '</a>' ) );
	}

	return $links;
}

add_filter( 'plugin_row_meta', 'appizy_set_plugin_meta', 10, 2 );

/**
 * Code Embed Menu
 *
 * Add a new option to the Admin menu and context menu
 *
 * @since    1.4
 *
 * @uses ce_help         Return help text
 */
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

