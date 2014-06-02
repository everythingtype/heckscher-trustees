<?php get_header(); ?>

	<div class="pagebody">

		<?php if ( is_year() ) : 
			global $query_string;
			query_posts( $query_string . '&posts_per_page=-1' );
		endif; ?>

		<?php if (have_posts()) : ?>

			<?php if ( is_year() ) : ?>
				<h3><?php echo get_the_date('Y'); ?> <?php single_cat_title(); ?></h3>
			<?php else : ?>
				<h3>Latest <?php single_cat_title(); ?></h3>
			<?php endif; ?>

			<?php if ( is_category('news') ) get_template_part('parts/news-dropdown'); ?>

			<div class="thegrid postgrid">

			<?php 
				$i = 0;
				while (have_posts()) : the_post(); ?>

				<a href="<?php the_permalink(); ?>" <?php if ( $i == 2 ) echo 'class="third"' ?>>
				<p class="date"><?php the_time('F j, Y'); ?></p>
				<h4><?php the_title(); ?></h4>

				<?php if ( has_post_thumbnail() ) : ?>
					<div class="gridthumbnail"><?php the_post_thumbnail('heckscher-thumb'); ?></div>
				<?php endif; ?>

				</a>

			<?php
				if ( $i < 2 ) :
					$i++;
				else :
					$i = 0;
				endif; 
			
				endwhile; ?>

			</div>

		<?php else : ?>

			<h3>Error &mdash; Page not found</h3>

		<?php endif; ?>

	</div>

<?php get_footer(); ?>