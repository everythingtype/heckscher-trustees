<?php get_header(); ?>

	<div class="pagebody">

		<?php if (have_posts()) : ?>

			<div class="thegrid searchgrid">

			<?php 
				$i = 0;
				while (have_posts()) : the_post(); ?>


				<?php $section = get_heckscher_section(); ?>

				<a href="<?php the_permalink(); ?>" class="<?php echo $section; if ( $i == 2 ) echo ' third' ?>">
					<?php get_template_part('parts/sectionindicator'); ?>
					<h4><?php the_title(); ?></h4>

					<?php get_template_part('parts/gridexcerpt'); ?>

				</a>

			<?php
				if ( $i < 2 ) :
					$i++;
				else :
					$i = 0;
				endif; 

				endwhile; ?>

			</div>

		<?php endif; ?>


	</div>

<?php get_footer(); ?>