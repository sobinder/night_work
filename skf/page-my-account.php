<?php
/**
 * Template Name: My Account
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


<div class="section blog clearfix" style="padding-top:35px;padding-bottom:35px;">
<div class="container">
<div class="row">


<div class="col-lg-9 col-md-8 post-content pull-right m-left">
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
</div>

<?php get_footer();