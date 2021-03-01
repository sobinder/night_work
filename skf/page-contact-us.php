<?php
/**
 * Template Name: Contact Us
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
<?php while ( have_posts() ) : the_post(); ?>
<section class="contact-us">
<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php the_content();?>
			</div>
		</div>
	</div>
</section>
<?php endwhile; // End of the loop. ?>
<?php get_footer();
