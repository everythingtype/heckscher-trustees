<?php $thecategory = get_category_by_slug('news'); ?>

<div class="heckscherdropdown dropdown-about">
	<span class="more">Archive</span>
	
	<div class="ddwrapper">
		<ul>
			<li><a href="<?php echo get_category_link( $thecategory->term_id ); ?>"><span>Latest</span></a></li>
			<?php dynamic_sidebar( 'news-sidebar' ); ?>
		</ul>
	</div>
</div>