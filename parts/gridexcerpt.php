<?php if ( has_post_thumbnail() ) : ?>
	<div class="gridthumbnail"><?php the_post_thumbnail('heckscher-thumb'); ?></div>
<?php elseif ( get_field('excerpt') ) : ?>
	<div class="gridexcerpt"><?php the_field('excerpt'); ?></div>
<?php else : ?>
	<div class="gridexcerpt"><?php echo get_the_excerpt(); ?></div>
<?php endif; ?>