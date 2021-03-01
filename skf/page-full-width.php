<?php
/**
 * Template Name: Full Width
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ecns
 */

get_header(); ?>

<div class="shop-banner" style=" background:url(<?php if( has_post_thumbnail() ) { ?><?php echo the_post_thumbnail_url('full');?>);"><?php } else { ?><?php echo get_template_directory_uri();?>/images/king-class-room.jpg) no-repeat center center;"><?php } ?>
<div class="container">
<div class="row">
<div class="col-sm-12">
<h1><?php
echo empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent );
?></h1>
</div>
</div>
</div>
</div>


<div class="shop-breadcrumb woocommerce">
<div class="container">
<div class="row">
<div class="col-sm-12 clearfix">
<nav class="woocommerce-breadcrumb">
<?php custom_breadcrumbs(); ?>
</nav>
</div>
</div>
</div>
</div>


<div class="section blog clearfix">
<div class="container">
<div class="row">


<div class="col-md-12 col-sm-12 post-content m-left">
<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
</div>




</div>
</div>
</div>

<?php get_footer();