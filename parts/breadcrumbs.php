<?php global $post; ?>

<div class="breadcrumbs">

<?php if ( !is_front_page() ) : ?>

		<ul>
		<li><a href="<?php echo get_bloginfo('url'); ?>">Home</a></li>
	
		<?php if ( is_page() ) : ?>

			<?php $pages = get_ancestors($post->ID, 'page'); ?>

			<?php $pages = array_reverse($pages); ?>

			<?php for ( $i = 0; $i < count($pages); $i++) { ?>

				<?php if ( get_page_template_slug( $pages[$i] ) != 'page-redirect.php' ) : ?>

					<?php $thepost = get_post( $pages[$i] ); ?>
					<?php $theslug = $thepost->post_name; ?>

					<?php if ( $theslug == "projects" ) : ?>
						<li><a href="<?php echo get_permalink( $pages[$i] ); ?>">Projects</a></li>
					 <?php elseif ( $theslug == "grant-guidelines") : ?>
					 	<li><a href="<?php echo get_permalink( $pages[$i] ); ?>">Guidelines</a></li>
					 <?php elseif ( $theslug == "about") : ?>
					 	<li><a href="<?php echo get_permalink( $pages[$i] ); ?>">About</a></li>
					<?php else : ?>
						<li><a href="<?php echo get_permalink( $pages[$i] ); ?>"><?php echo get_the_title( $pages[$i] ); ?></a></li>
					<?php endif; ?>
				<?php endif; ?>
		<?php } ?>

	<?php elseif ( is_category('news') ) : ?>

		<?php $theid = get_ID_by_slug('about'); ?>
		<li><a href="<?php echo get_permalink( $theid ); ?>">About</a></li>

	<?php elseif ( is_single() && in_category('news') ) : ?>

		<?php $theid = get_ID_by_slug('about'); ?>
		<li><a href="<?php echo get_permalink( $theid ); ?>">About</a></li>

		<?php $thecategory = get_category_by_slug('news'); ?>

			<li><a href="<?php echo get_category_link( $thecategory->term_id ); ?>"><?php echo $thecategory->name; ?></a></li>

	<?php endif; ?>
	
	</ul>

<?php else : ?>
	
	&nbsp;
	
<?php endif; ?>

</div>