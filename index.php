<?php
/**
* Plugin Name: Remove Regular Post Type
* Plugin URI: https://github.com/giffen-good
* Description: Strips all "default" post-type related UI from nav within wordpress admin. Core functionality remains fully intact
* Version: 1.0
* Author: Christopher Rock
* Author URI: http://yourwebsiteurl.com/
**/

//
// Plugin removes all UI within the CMS associated with managing "default" post types.
//
// Code is based on snippet authored by Blake Miller

// Remove side menu
add_action( 'admin_menu', 'remove_default_post_type' );

function remove_default_post_type() {
    remove_menu_page( 'edit.php' );
}

// Remove +New post in top Admin Menu Bar
add_action( 'admin_bar_menu', 'remove_default_post_type_menu_bar', 999 );

function remove_default_post_type_menu_bar( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'new-post' );
}

// Remove Quick Draft Dashboard Widget
add_action( 'wp_dashboard_setup', 'remove_draft_widget', 999 );

function remove_draft_widget(){
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
}

// End remove post type
