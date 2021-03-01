<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
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

<div class="section blog">
<div class="container">
<div class="row">
<div class="col-md-9 col-sm-8 post-content">
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

</div>
<div class="col-md-3 col-sm-4 right-sidebar">
<div class="sidebar">
<?php get_sidebar();?>
</div>
</div>
</div>
</div>
</div>

<?php get_footer();