<?php get_header(); ?>

	<div class="pagebody">

		<?php if (have_posts()) : ?>

			<?php while (have_posts()) : the_post(); ?>

				<?php if ( is_single() ) : ?>
						<p class="date"><?php the_time('F j, Y'); ?></p>
						<h2><?php the_title(); ?></h2>
				<?php elseif ( is_page('trustees') ) : ?>
					<?php get_template_part('parts/trusteestop'); ?>
				<?php elseif ( is_page_or_subpage_of('trustees') && !is_page('trustees') ) : ?>
					<h2>Board of Trustees<br /><span><?php the_title(); ?></span></h2>
				<?php else : ?>
					<h2><?php the_title(); ?></h2>
				<?php endif; ?>	

				<?php if ( get_field('navigation_options') == "dropdown" ) get_template_part('parts/sibling-dropdown'); ?>

				<?php if ( has_post_thumbnail() && get_field('navigation_options') !== "grid" ) : ?>
					<div class="postthumbnail"><? the_post_thumbnail('heckscher-large'); ?></div>
				<?php endif; ?>

				<div id="content" <?php if ( get_field('list_style') ) echo 'class="liststyle"'?>>
					<?php the_content(); ?>
					<?php if ( is_page_or_subpage_of('grant-guidelines') && !is_page('grant-guidelines') ) get_template_part('parts/guidelinelinks'); ?>
					<?php if ( is_page('contact-us') ) get_template_part('parts/googlemap'); ?>
				</div>

				<?php if ( get_field('navigation_options') == "grid" ) get_template_part('parts/children-grid'); ?>

				<?php if ( get_field('accordion') ) get_template_part('parts/children-accordion'); ?>

			<?php endwhile; ?>

		<?php else : ?>

			<h2>Error &mdash; Page not found</h2>

		<?php endif; ?>

	</div>

<?php get_footer(); ?>