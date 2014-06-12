<?php 

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

$meeting = get_posts($meetingargs); ?>

<h2><?php the_title(); ?><br /><span>Next Meeting</span></h2>

<div class="thegrid childrengrid grid-<?php echo get_heckscher_section(); ?>">
<?php foreach ($meeting as $post) : setup_postdata($post); ?>

	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

<?php endforeach; ?>
</div>

<h2><span>Archive</span></h2>

<?php 

wp_reset_postdata(); 

?>