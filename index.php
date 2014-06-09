<?php get_header(); ?>

<div class="pagebody">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<?php if ( is_page('trustees') ) : ?>
				<?php get_template_part('parts/trusteestop'); ?>
			<?php else : ?>
				<h2>Board of Trustees<br /><span><?php the_title(); ?></span></h2>
			<?php endif; ?>

			<div id="content">
				<?php the_content(); ?>
			</div>

			<?php if ( get_field('navigation_options') == "grid" ) get_template_part('parts/children-grid'); ?>

		<?php endwhile; ?>

	<?php else : ?>

		<h2>Error &mdash; Page not found</h2>

	<?php endif; ?>

</div>

<?php get_footer(); ?>