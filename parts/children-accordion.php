<?php 

if ( !post_password_required() ) :

if ( is_page_or_subpage_of('trustees') ) :
	$orderby = 'date';
	$order = 'DESC';
else :
	$orderby = 'menu_order';
	$order = 'ASC';
endif;

$args = array(
	'orderby' => $orderby,
	'order' => $order,
	'post_parent' => $post->ID,
	'post_type' => 'page',
	'numberposts'     => -1,
	'post_status' => 'publish'
); 

$postslist = get_posts($args); ?>

<div class="accordion accordion-<?php echo get_heckscher_section(); ?>">

	<?php foreach ($postslist as $post) : setup_postdata($post); ?>

		<div class="accordionitem">
			<h3><span class="toggle"></span><?php echo get_the_title(); ?></h3>
			<div class="accordioncontent">
				<?php the_content(); ?>
			</div>
		</div>

	<?php endforeach; ?>

</div>

<?php wp_reset_postdata(); 

endif; ?>