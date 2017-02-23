<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div id="primary" class="index_page content-area">
	<main id="main" class="site-main" role="main">
<section class="category_list">
	<?php
$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC',
	'exclude'    => array( 1 )
) );
 
foreach( $categories as $category ) {
	$category_link = get_category_link( $category->term_id );
	$category_name = $category->name ;
	$category_id = $category->term_id; ?> 
<figure class="category_box">
 <a href="<?php echo $category_link ?>"><div class="header_box" style="background-image:url('<?php the_field('image', 'category_'.$category_id); ?>')"></div></a>
    <figcaption><a href="<?php echo $category_link ?>"><?php echo $category_name ?></a></figcaption>
</figure>
   

<?php } ?>
</section>


	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer();
