<?php
/*
    Plugin Name: Empty plugin
    Plugin URI: http://www.yourwebsitename.com/visit_plugin_website
    Description: An empty wordpress plugin
    Author: Daniele Favi
    Author URI: http://www.yourwebsitename.com/plugin_by
    Version: 1.0.0
*/


ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

add_action('admin_menu', 'empty_plugin_create_menu_entry');

function empty_plugin_create_menu_entry() {
	$icon = plugins_url('/images/empy-plugin-icon-16.png', __FILE__);
    add_menu_page('Empty Plugin', 'Empty Plugin', 'edit_posts', 'main-page-empty-plugin', 'empty_plugin_show_main_page', $icon);
	add_submenu_page( 'main-page-empty-plugin', 'Add New', 'Add New', 'edit_posts', 'add-edit-empty-plugin?action=add_new', 'empty_plugin_add_another_page' );
}

function empty_plugin_show_main_page() {
    include('main-page-empty-plugin.php');
}


function empty_plugin_add_another_page() {
    include('another-page-empty-plugin.php');
}