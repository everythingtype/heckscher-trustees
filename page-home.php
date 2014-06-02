<?php 

/* Template Name: Home Page */ 

get_header(); ?>

<div class="home">

<div class="abovefold">

	<div class="intro">

		<h1><a href="<?php bloginfo('url'); ?>"><span><?php bloginfo('name'); ?></span></a></h1>

		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>

					<?php the_content(); ?>

			<?php endwhile; ?>
		<?php endif; ?>

	</div>

	<div class="slideshow slideshowone">
		<?php echo do_shortcode('[wooslider slide_page="about-us-slideshow" slider_type="slides" limit="20"]'); ?>
	</div>

</div>

<div class="projects box"><a href="/projects/">
	<span>Our</span>
	<span>Highlighted</span>
	<span>Projects</span>
	<p>In all of our giving activities, we stress the achievement of positive, measurable, and clear outcomes. <strong>Read More</strong></p>
</a></div>

<div class="mission"><a href="/about/mission/">
	<span>Our</span>
	<span>Mission</span>
	<span class="icon icon-arrow"></span>
</a></div>

<div class="philanthropy box"><a href="/about/venture-philanthropy/">
	<span>Venture</span>
	<span>Philanthropy</span>
	<p>Our goal is to foster venture philanthropy using three principal funding strategies: catalytic giving, strategic partnerships and targeted problem solving. <strong>Read More</strong></p>
</a></div>

<div class="floater">

	<div class="grantseekers"><a href="/guidelines/grant-guidelines/">
		<span>Information</span>
		<span>for Our</span>
		<span>Grantseekers</span>
		<span class="icon icon-arrow"></span>
	</a></div>

	<div class="history box"><a href="/about/our-history/">
		<span>Our History</span> 
		<div class="thumbnail"><img src="/wp-content/uploads/2013/11/chapter2-538x380.jpg" alt="Our History"></div>
	</a></div>

</div>

<div class="slideshow slideshowtwo">
	<?php echo do_shortcode('[wooslider slide_page="highlighted-projects-slideshow" slider_type="slides" limit="20"]'); ?>
</div>

</div>

<?php get_footer(); ?>