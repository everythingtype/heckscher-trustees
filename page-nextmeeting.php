<?php  

/* Template Name: Next Meeting Redirect */  

$trusteesid = get_ID_by_slug('trustees');

$yearargs = array(
	'orderby' => 'name',
	'order' => 'DESC',
	'post_parent' => $trusteesid,
	'post_type' => 'page',
	'numberposts' => 1,
	'post_status' => 'publish'
); 

$year = get_posts($yearargs); 

$yearid = $year[0]->ID;

wp_reset_postdata();

$meetingargs = array(
	'orderby' => 'date',
	'order' => 'DESC',
	'post_parent' => $yearid,
	'post_type' => 'page',
	'numberposts' => 1,
	'post_status' => 'publish'
); 

$meeting = get_posts($meetingargs);

$permalink = get_permalink( $meeting[0]->ID );

if ( $permalink ) : 
	wp_redirect(clean_url($permalink), 301);
else :
	echo "Redirection error";
endif;

?>