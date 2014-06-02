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

	/* Wooslider Customizations */
	wp_dequeue_style('wooslider-flexslider');
	wp_dequeue_style('wooslider-common');

	if ( is_front_page() ) :
		$heckscher_wooslider = get_template_directory_uri() . '/css/wooslider.css';
		wp_register_style('heckscher_wooslider',$heckscher_wooslider, false, $version);
		wp_enqueue_style( 'heckscher_wooslider');
	endif;

	if ( is_page('our-history') ) :
		$heckscher_history = get_template_directory_uri() . '/css/ourhistory.css';
	    wp_register_style('heckscher_history',$heckscher_history, false, $version);
	    wp_enqueue_style( 'heckscher_history');
	endif;

	if ( is_front_page() ) :
		// Splash Page
		$babbqjs = get_template_directory_uri() . '/js/jquery.ba-bbq.js';
		wp_register_script('babbqjs',$babbqjs, false, $version);
		wp_enqueue_script( 'babbqjs',array('jquery'));
		
		$splashjs = get_template_directory_uri() . '/js/splash.js';
		wp_register_script('splashjs',$splashjs, false, $version);
		wp_enqueue_script( 'splashjs',array('jquery','babbqjs'));

	endif;

}

add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');


/* Menus and Sidebars */

function register_custom_menus() {
	register_nav_menu('guidelines', __('Guidelines'));
	register_nav_menu('projects', __('Highlighted Projects'));
	register_nav_menu('about', __('About Us'));
	register_nav_menu('info', __('Additional Information'));
	register_nav_menu('trustees', __('Board of Trustees'));
}

add_action('init', 'register_custom_menus');



function register_custom_sidebars() {

	register_sidebar(
		array(
			'id' => 'news-sidebar',
			'name' => __( 'News Sidebar' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);

}

add_action( 'widgets_init', 'register_custom_sidebars' );


/* Featured Images / Post Thumbnails */

if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
} 

if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'heckscher-thumb', 408, 288, true );
	add_image_size( 'heckscher-medium', 764, 516, true );
	add_image_size( 'heckscher-home', 1032, 700, true );
	add_image_size( 'heckscher-large', 1930, 1309, false );
}

//http://speakinginbytes.com/2012/11/responsive-images-in-wordpress/
function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'the_content', 'remove_thumbnail_dimensions', 10 );
add_filter( 'category_description', 'remove_thumbnail_dimensions', 10 );


/* Excerpts */

function new_excerpt_more( $more ) {
	if ( is_search() ) :
		return;
	else :
		return ' &hellip; <a href="'. get_permalink( get_the_ID() ) . '"><span class="readmore">Read More</span><span class="icon icon-arrow"></span></a>';
	endif;
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

function new_excerpt_length($length) {
    return 15;
}
add_filter('excerpt_length', 'new_excerpt_length');


/* Wooslider */

function heckscher_wooslider( $content ){
	global $post;

	$output ="";

	$imageid = get_field('slide_image'); 
	$image = wp_get_attachment_image_src($imageid,'heckscher-home');
	$link = get_field('slide_link'); 

	$thecontent = get_the_content();
	$thecontent = $thecontent . ' <a href="' . $link .'">Read more</a>';
	$thecontent = apply_filters('the_content', $thecontent);


	$output .= '<a class="slideimage" href="' . $link . '"><img src="' . $image[0] . '" /></a>';

	$output .= '<div class="slidetitle">';
		//$output .= '<div class="slidecontrols"><div class="prevslide"><span class="genericon genericon-previous"></span></div><div class="nextslide"><span class="genericon genericon-next"></span></div></div>';
		$output .= '<h3><a href="' . $link . '">' . get_the_title() . '</a></h3>';
	$output .= '</div>';

	$output .= '<div class="slideblurb">' . $thecontent . '</div>';

	return $output;
}
 
add_filter('wooslider_slide_content_slides', 'heckscher_wooslider');



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

	if ( is_page_or_subpage_of('guidelines') ) :
		return 'guidelines';
	elseif ( is_page_or_subpage_of('projects') ) :
		return 'projects';
	elseif ( is_page_or_subpage_of('about') ) :
		return 'about';
	elseif ( is_page_or_subpage_of('info') ) :
		return 'info';
	elseif ( is_page_or_subpage_of('trustees') ) :
		return 'trustees';
	elseif ( in_category('news') ) :
		return 'news';
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
