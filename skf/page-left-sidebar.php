<?php
/**
 * Template Name: Left Sidebar
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

<div class="shop-banner" style=" background:url(https://skykingfireworks.com/wp-content/uploads/2017/01/Blue-Stars.jpg);">
<div class="container">
<div class="row">
<div class="col-sm-12">
<h1><?php the_title();?></h1>
</div>
</div>
</div>
</div>


<div class="section blog clearfix">
<div class="container">
<div class="row">
<?php
if ( is_user_logged_in() ) { ?>
    <div class="col-md-3 col-sm-4 right-sidebar">
<div class="sidebar">
<h2>My Account</h2>
<?php
									wp_nav_menu( array(
										'menu'              => 'my-account--menu',
										'theme_location'    => 'my-account-menu',
										'depth'             => 2,
										'container'         => '',
										'menu_class'        => '',
										'menu_id'        => '',
										)
									);
								?>
</div>
</div>


<div class="col-md-9 col-sm-8 post-content">

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
<?php } else { ?>
   <?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
<?php } ?>




</div>
</div>
</div>

<?php get_footer();