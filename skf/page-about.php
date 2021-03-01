<?php
/**
 * Template Name: About
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

<div class="section about-us clearfix">
<div class="banner-image hidden"><?php while ( have_posts() ) : the_post(); the_post_thumbnail( 'full' ); endwhile; ?></div>
<div class="container">
<div class="row">
<div class="col-lg-9 col-md-10 col-sm-12 post-content">

<div class="post clearfix">

<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>


</div> </div>

</div>
</div>
</div>

<?php get_footer();