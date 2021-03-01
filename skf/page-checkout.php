<?php
/**
 * Template Name: Checkout
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


<section class="checkout">
<div class="container">
<div class="row">
<div class="col-lg-9 col-md-8 post-content pull-right m-left">
<?php the_content();?>
</div>
	
	<div class="col-lg-3 col-md-4 left-sidebar">

<div class="post clearfix">
  
  <?php
									wp_nav_menu( array(
										'menu'              => 'my-account--menu',
										'theme_location'    => 'my-account-menu',
										'depth'             => 2,
										'container'         => '',
										'menu_class'        => 'king-class-room-list',
										'menu_id'        => '',
										)
									);
								?>
  
</div> </div>

	
	
</div>
</div>
</section>



<?php endwhile; ?>
<?php get_footer();