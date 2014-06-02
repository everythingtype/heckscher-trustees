<div class="verytop">

	<div class="searchtoggle"><span class="icon icon-search"></span>Search</div>

	<div class="searchform">
		<form method="get" action="<?php bloginfo('home'); ?>/">
			<?php if ( is_search() ) :?>
				<input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" />
			<?php else : ?>
				<input type="text" onfocus="this.value='';" value="Type here to search" name="s" id="s" />
			<?php endif; ?>
		</form>
	</div>

	<?php get_template_part('parts/breadcrumbs'); ?>

</div>