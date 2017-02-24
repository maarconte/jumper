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
	<?php } else if (is_archive()) { 
		$category = str_replace('Category: ','',get_the_archive_title());;
		$category_id = get_cat_ID($category);
		?>
		<img src="<?php the_field('image', 'category_'.$category_id); ?>" alt="">
	<?php }?>
	<p> <?php echo $category ;?></p>
	</div>

	<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
</div><!-- .custom-header -->
