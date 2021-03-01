<?php
/**
 * Template Name: Location
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ecns
 */

get_header(); ?>



<div class="section clearfix">

<section class="text-center locator-form">
<div class="container">
<div class="row">
<div class="col-sm-12">
<?php the_content();?>
</div>
</div>
</section>



<div class="section clearfix">
<div class="container">
<div class="row">
<div class="col-sm-12 post-content location-content">
<div id="fullpage-map"></div>
<div id="mapresults"></div>

<?php
			while ( have_posts() ) : the_post();

				the_content();

			endwhile; // End of the loop.
			?>

</div>
</div>
</div>
</div>

<?php get_footer();