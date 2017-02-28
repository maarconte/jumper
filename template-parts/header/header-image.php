<?php
/**
 * Displays header media
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<div class="custom-header">

	<div class="custom-header-media">
	<?php if ( is_home() ) { ?>
		<?php the_custom_header_markup(); ?>
	<?php } else if (is_archive() || is_single()) { 
		?>
		<img src="<?php the_field('image', 'category_'.$cat); ?>" alt="">
	<?php } else if (is_page()) {
		the_post_thumbnail();
}
		?>
	</div>
	<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
</div><!-- .custom-header -->
