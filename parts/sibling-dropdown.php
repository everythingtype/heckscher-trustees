<?php $section = get_heckscher_section(); ?>

<div class="heckscherdropdown dropdown-<?php echo $section; ?>">

	<?php if ( $section == 'guidelines') : ?>
		<span class="more">More Guidelines</span>
	<?php elseif ( $section == 'projects') : ?>
		<span class="more">More Projects</span>
	<?php else : ?>
		<span class="more">More</span>
	<?php endif; ?>

	<div class="ddwrapper">
		<ul><?php echo wp_list_pages(array(
		'echo' => 0,
		'title_li' => __(''),
		'depth' => '1',
		'link_before' => '<span>',
		'link_after' => '</span>',
	    'child_of' => $post->post_parent,
	    'exclude' => $post->ID
	)); ?></ul>
	</div>

</div>