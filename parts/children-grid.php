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

<div class="thegrid childrengrid grid-<?php echo get_heckscher_section(); ?>">

	<?php 
	
		$i = 0;
		foreach ($postslist as $post) : ?>

		<?php setup_postdata($post); ?>

		<a href="<?php echo get_permalink(); ?>" <?php if ( $i == 2 ) echo 'class="third"' ?>>

			<h3><?php echo get_the_title(); ?></h3>

			<?php get_template_part('parts/gridexcerpt'); ?>

		</a>

	<?php 
		if ( $i < 2 ) :
			$i++;
		else :
			$i = 0;
		endif; 

		endforeach; ?>

</div>

<?php wp_reset_postdata(); 

endif; ?>