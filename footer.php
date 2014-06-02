<?php if ( is_front_page() || is_category() ||  is_single() || is_page('our-history') || is_page_or_subpage_of('trustees') ) get_template_part('parts/footerlinks'); ?>

</div>

<?php if ( !is_front_page() && !is_category() && !is_single() && !is_page('our-history') && !is_page_or_subpage_of('trustees') )  get_template_part('parts/related-footer'); ?>

<?php wp_footer(); ?>

</body>
</html>