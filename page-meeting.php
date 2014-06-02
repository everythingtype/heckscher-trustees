<?php 

/* Template Name: Board Meeting */

get_header(); ?>

	<div class="pagebody meeting">

		<?php if (have_posts()) : ?>

			<?php while (have_posts()) : the_post(); ?>

				<h2>Board of Trustees Meeting<br /><span><?php the_title(); ?></span></h2>

				<?php get_template_part("parts/meeting-documents"); ?>

				<?php get_template_part("parts/projects-for-review"); ?>

			<?php endwhile; ?>

		<?php else : ?>

			<h3>Error &mdash; Page not found</h3>

		<?php endif; ?>

	</div>

<?php get_footer(); ?>