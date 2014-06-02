<div class="topnav">
	<ul>
		<li class="guidelines"><a href="/guidelines">Guidelines<span class="icon icon-arrow"></span></a></li>
		<li class="projects"><a href="/projects">Highlighted Projects<span class="icon icon-arrow"></span></a></li>
		<li class="about"><a href="/about">About Us<span class="icon icon-arrow"></span></a></li>
	</ul>
</div>

<?php if ( !is_front_page() ) : ?>

	<div class="sectionnav">

		<h1><a href="<?php bloginfo('url'); ?>#home"><span><?php bloginfo('name'); ?></span></a></h1>

		<div class="navblock">

			<?php if ( is_search() ) : ?>
				<div class="searchintro"><?php get_template_part('parts/searchtitle'); ?></div>
			<?php elseif ( is_page_or_subpage_of('guidelines') ) : ?>
				<h3>Guidelines for Grant Seekers</h3>
				<?php wp_nav_menu( array('theme_location' => 'guidelines' )); ?>
			<?php elseif ( is_page_or_subpage_of('projects') ) : ?>
				<h3>Highlighted Projects</h3>
				<?php wp_nav_menu( array('theme_location' => 'projects' )); ?>
			<?php elseif ( is_page_or_subpage_of('about') || in_category('news') ) : ?>
				<h3>About Us</h3>
				<?php wp_nav_menu( array('theme_location' => 'about' )); ?>
			<?php elseif ( is_page_or_subpage_of('info') ) : ?>
				<h3>Additional Info</h3>
				<?php wp_nav_menu( array('theme_location' => 'info' )); ?>
			<?php elseif ( is_page_or_subpage_of('trustees') ) : ?>
				<h3>Board of Trustees</h3>
				<?php wp_nav_menu( array('theme_location' => 'trustees' )); ?>
			<?php endif; ?>

		</div>

	</div>
	
<?php endif; ?>