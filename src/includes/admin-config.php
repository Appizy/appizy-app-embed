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
function ce_add_settings_link( $links, $file ) {

	static $this_plugin;

	if ( ! $this_plugin ) {
		$this_plugin = plugin_basename( __FILE__ );
	}

	if ( strpos( $file, 'code-embed.php' ) !== false ) {
		$settings_link = '<a href="admin.php?page=ce-options">' . __( 'Settings', 'simple-embed-code' ) . '</a>';
		array_unshift( $links, $settings_link );
	}

	return $links;
}

add_filter( 'plugin_action_links', 'ce_add_settings_link', 10, 2 );

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
function ce_set_plugin_meta( $links, $file ) {

	if ( strpos( $file, 'code-embed.php' ) !== false ) {
		$links = array_merge( $links, array( '<a href="https://wordpress.org/plugins/simple-embed-code/">' . __( 'Support', 'simple-embed-code' ) . '</a>' ) );
	}

	return $links;
}

add_filter( 'plugin_row_meta', 'ce_set_plugin_meta', 10, 2 );

/**
 * Code Embed Menu
 *
 * Add a new option to the Admin menu and context menu
 *
 * @since    1.4
 *
 * @uses ce_help         Return help text
 */
function ce_menu() {

	// Add search sub-menu.
	global $ce_search_hook;

	$ce_search_hook = add_submenu_page( 'tools.php', __( 'Code Embed Search', 'simple-embed-code' ), __( 'Appizy', 'simple-embed-code' ), 'edit_posts', 'ce-search', 'ce_search' );

	add_action( 'load-' . $ce_search_hook, 'ce_add_options_help' );
}

add_action( 'admin_menu', 'ce_menu' );

/**
 * Add Options Help
 *
 * Add help tab to options screen
 *
 * @since    2.0
 *
 * @uses     ce_options_help    Return help text
 */
function ce_add_options_help() {

	global $ce_options_hook;
	$screen = get_current_screen();

	if ( $screen->id !== $ce_options_hook ) {
		return;
	}

	$screen->add_help_tab(
		array(
			'id'      => 'ce-options-help-tab',
			'title'   => __( 'Help', 'simple-embed-code' ),
			'content' => 'Hello',
		)
	);
}

/**
 * Define a tool screen
 */
function ce_search() {
	include_once __DIR__ . '/tools-screen.php';
}

