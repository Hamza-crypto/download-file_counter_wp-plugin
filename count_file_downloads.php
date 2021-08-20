<?php
/**
 * Plugin Name: File Download Counter
 * Plugin URI: https://www.yourwebsiteurl.com/
 * Description: Auto Downloads Files after successful payment and keeps tracks
 * Version: 1.0
 * Author: Hamza
 * Author URI: http://yourwebsiteurl.com/
 **/

if (!defined('WPINC')) {
	die();
}
register_activation_hook(__FILE__, 'ld_create_table');

if (!defined('LD_PLUGIN_DIR')) {
	define('LD_PLUGIN_DIR', plugin_dir_url(__FILE__));
}

require plugin_dir_path(__FILE__) . 'inc/install.php';
require plugin_dir_path(__FILE__) . 'inc/ajax_functionality.php';


//Load template from specific page
add_filter( 'page_template', 'get_page_template_func' );

function get_page_template_func( $page_template ){

	global $post;
	$post_slug = $post->post_name;

	if ( $post_slug == 'download' ) {
		$page_template = dirname( __FILE__ ) . '/template-parts/download.php';

	}

	if ( $post_slug == 'report' ) {
		$page_template = dirname( __FILE__ ) . '/template-parts/report.php';
	}
	return $page_template;
}



