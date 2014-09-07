<!DOCTYPE HTML>
<!--[if lte IE 8]> <html class="legacy"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->
<!--[if !IE]><!--> <html> <!--<![endif]-->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title><?php 
		wp_title( '&mdash;', true, 'right' );
		bloginfo( 'name' ); 
		$site_description = get_bloginfo( 'description', 'display' );

		if ( $site_description && ( is_home() || is_front_page() ) )
			echo " $site_description";
		if ( $paged >= 2 || $page >= 2 )
			echo ' &mdash; ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );
		?></title>
	
		<meta name="author" content="http://www.everything-type-company.com, http://martyspellerberg.com" />

		<!-- Fav Icons: Browser, iOS, Windows 8 -->
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon.ico">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-114.png" />
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-72.png" />
		<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-57.png" />
		<meta name="application-name" content="<?php bloginfo( 'name' ); ?>"/> 
		<meta name="msapplication-TileColor" content="#ffffff"/> 
		<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-144.png"/>

		<!-- Fonts.com -->
		<script type="text/javascript">
		var MTIProjectId='40fa9ea9-bff7-40ab-8253-f2ba9e038a4f';
		 (function() {
		        var mtiTracking = document.createElement('script');
		        mtiTracking.type='text/javascript';
		        mtiTracking.async='true';
		        mtiTracking.src=('https:'==document.location.protocol?'https:':'http:')+'//fast.fonts.net/t/trackingCode.js';
		        (document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild( mtiTracking );
		   })();
		</script>

		<?php wp_head(); ?>

</head>

<body>

<div class="topnavmargin">
	<div class="sectionnav">

		<h1><a href="<?php bloginfo('url'); ?>">

			<!--[if lte IE 8]>
				<img src="<?php echo get_stylesheet_directory_uri() ?>/images/heckscher.gif" alt="<?php bloginfo('name'); ?>" />
			<![endif]-->

			<!--[if gt IE 8]>
				<img src="<?php echo get_stylesheet_directory_uri() ?>/images/heckscher.svg" alt="<?php bloginfo('name'); ?>" />
			<!--<![endif]-->

			<!--[if !IE]><!-->
				<img src="<?php echo get_stylesheet_directory_uri() ?>/images/heckscher.svg" alt="<?php bloginfo('name'); ?>" />
			<!--<![endif]-->

		</a></h1>

		<div class="navblock">

				<h3>Board of Trustees</h3>
				<?php wp_nav_menu( array('theme_location' => 'trustees' )); ?>

		</div>

	</div>
</div>

<div class="margin mainsection">