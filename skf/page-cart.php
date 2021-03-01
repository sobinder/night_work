<?php
/**
 * Template Name: Cart
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ecns
 */

get_header(); ?>




<?php while ( have_posts() ) : the_post(); ?>

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


<section class="cart">
<div class="container">
<div class="row">
<div class="col-md-12">
<?php the_content();?>
</div>
</div>
</div>
</section>


<?php endwhile; ?>
<?php get_footer();