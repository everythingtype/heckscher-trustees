<?php

/* Header */

function enqueue_theme_scripts() {

	$version = "d";

	// Remove Unnecessary Code
	// http://www.themelab.com/2010/07/11/remove-code-wordpress-header/
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');
	remove_action('wp_head', 'start_post_rel_link');
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'adjacent_posts_rel_link');

	wp_enqueue_script( 'jquery');
	
	// Theme JS
	$themejs = get_template_directory_uri() . '/js/heckscher.js';
	wp_register_script('themejs',$themejs, false, $version);
	wp_enqueue_script( 'themejs',array('jquery'));
	
	// Fonts CSS
	$fontscss = get_template_directory_uri() . '/fonts/fonts.css';
    wp_register_style('fontscss',$fontscss, false, $version);
    wp_enqueue_style( 'fontscss');

	// Theme CSS
    $defaultstyle = get_bloginfo('stylesheet_url'); 
    wp_register_style('defaultstyle',$defaultstyle, false, $version);
    wp_enqueue_style( 'defaultstyle');

}

add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');


/* Menus and Sidebars */

function register_custom_menus() {
	register_nav_menu('trustees', __('Board of Trustees'));
}

add_action('init', 'register_custom_menus');



/* Misc */

function is_page_or_subpage_of($slug) {

	global $post;

	if ( is_page() || is_search() ) :

		if ( is_page($slug) ) :

			return true;

		else :

			$targetid = get_ID_by_slug($slug);

			$ancestors = get_post_ancestors($post->ID);
			
			if (in_array($targetid, $ancestors)) return true;

		endif;

	endif;

}


function get_ID_by_slug($page_slug) {
	// Not happy about calling the DB, but get_page_by_path() just wasn't cutting it.

	global $wpdb;

	$page_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE ( post_name = '".$page_slug."' or post_title = '".$page_slug."' ) and post_status = 'publish' and post_type='page' ");
	return $page_id;

}


function get_heckscher_section() {

	global $post; 

	if ( is_page_or_subpage_of('trustees') ) :
		return 'trustees';
	endif;
}


function the_title_trim($title) {
	$title = attribute_escape($title);
	$findthese = array(
		'#Protected:#',
		'#Private:#'
	);
	$replacewith = array(
		'', // What to replace "Protected:" with
		'' // What to replace "Private:" with
	);
	$title = preg_replace($findthese, $replacewith, $title);
	return $title;
}
add_filter('the_title', 'the_title_trim');


function the_format($format) {
	if ($format == 'application/pdf' ) :
		echo "pdf";
	elseif ( $format == 'application/msword' ) :
		echo "doc";
	elseif ($format == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ) :
	 	echo "docx";
	elseif ($format == 'application/zip' ) :
		echo "zip";
	else :
		echo "file";
	endif; 
}

?>
