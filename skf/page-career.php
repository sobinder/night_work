<?php
/**
 * Template Name: Career
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ecns
 */

get_header(); ?>


<div class="section blog clearfix" style="padding:30px 0px;">
<div class="container">
<div class="row">


<div class="col-md-11 col-sm-12 post-content m-left career-content">

<?php while ( have_posts() ) : the_post(); ?>

	<?php the_content();?>

<?php endwhile; ?>


</div>
</div>
</div>
</div>
</section>

<?php get_footer();