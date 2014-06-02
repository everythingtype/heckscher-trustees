<div class="relatedfooter"><div class="margin">

	<h2>Highlighted Projects</h2>

<?php 

$projectsid = get_ID_by_slug('projects');

$categoryargs = array(
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'post_parent' => $projectsid,
	'post_type' => 'page',
	'numberposts'     => -1,
	'post_status' => 'publish'
); 

$categories = get_posts($categoryargs); 

$categoryids = array();

foreach ($categories as $post) :
	$categoryids[] = $post->ID;
endforeach; 

wp_reset_postdata();

$projectargs = array(
	'orderby' => 'rand',
	'post_parent__in' => $categoryids,
	'post__not_in' => array( $post->ID ),
	'post_type' => 'page',
	'numberposts' => 2,
	'post_status' => 'publish'
); 

$projects = get_posts($projectargs);

$first = true;

foreach ($projects as $post) :

	setup_postdata($post);

	$classes = "item";
	if ($first === true ) :
		$classes .= " first";
		$first = false;
	endif;
	?>

	<div class="<?php echo $classes?>">
		<?php if ( has_post_thumbnail() ) : ?>
			<a href="<?php the_permalink(); ?>" class="itemthumbnail"><?php the_post_thumbnail('heckscher-medium'); ?></a>
		<?php else : ?>
			<a href="<?php the_permalink(); ?>" class="itemtitle"><?php echo get_the_title($post->post_parent); ?><br /><strong><?php the_title(); ?></strong></a>
		<?php endif; ?>
		<div class="itemexcerpt"><?php the_excerpt(); ?></div>
	</div>

<?php endforeach;

wp_reset_postdata();

get_template_part('parts/footerlinks'); ?>

</div></div>