<?php $section = get_heckscher_section(); ?>

<?php if ( $section == 'guidelines' ) : ?>
	<p class="sectionindicator">Guidelines</p>
<?php elseif (  $section == 'projects' ) : ?>
	<p class="sectionindicator">Projects</p>
<?php elseif (  $section == 'about' ) : ?>
	<p class="sectionindicator">About</p>
<?php elseif (  $section == 'info' ) : ?>
	<p class="sectionindicator">Info</p>
<?php elseif (  $section == 'news' ) : ?>
	<p class="sectionindicator">News</p>
<?php endif; ?>