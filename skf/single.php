<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ecns
 */

get_header(); ?>


        
<section class="page-banner bg-image" style="<?php if (is_blog()) { ?>background-image: url(<?php the_field('header_image', get_option('page_for_posts')); ?>);<?php } else { ?><?php if (get_field('header_image')) { ?>background-image: url(<?php the_field('header_image');?>);<?php } ?><?php } ?>) no-repeat center center;">

<div class="container">
				<div class="row">

					<div class="col-md-12">
						<div class="title">

                        <h1><?php echo $our_title = get_the_title( get_option('page_for_posts', true) );?></h1>
						
						</div>
					</div>

				</div>
			</div>
</section>


<div class="section blog clearfix">
<div class="container">
<div class="row">
<div class="col-md-8 col-sm-7 post-content">

<div class="post clearfix">


		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation();

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