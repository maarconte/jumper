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
	if (is_archive()) {
		$cat_id = $cat;
	} else {
		$categories = get_the_category();
		$cat_id = $categories[0]->term_id;
	}

		?>
		<img src="<?php the_field('image', 'category_'.$cat_id); ?>" alt="">
	<?php } else if (is_page()) {
		the_post_thumbnail();
}
		?>
	<p> <?php echo $category ;?></p>
	</div>
	<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
</div><!-- .custom-header -->
