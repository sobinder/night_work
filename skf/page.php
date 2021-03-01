<?php
/**
 * The template for displaying all pages.
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
<h1><?php the_title();?></h1>
</div>
</div>
</div>
</div>

<div class="section blog clearfix" style="padding:35px 0px;">
<div class="container">
<div class="row">
<div class="col-md-8 col-sm-7 post-content">

<div class="post clearfix">

<?php
			while ( have_posts() ) : the_post();

				// get_template_part( 'template-parts/content', 'page' );
				
				the_content();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>


</div> </div>


<div class="col-md-4 col-sm-5 right-sidebar">
<div class="sidebar">
<?php get_sidebar();?>
</div>
</div>
</div>
</div>
</div>

<?php get_footer();