<?php
/**
 * Template Name: Full Width
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ecns
 */

get_header(); ?>



<div class="section blog clearfix">
<div class="container">
<div class="row">
<div class="col-sm-12 post-content">

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