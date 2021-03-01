<?php
/**
 * The template for displaying archive pages.
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


<div class="col-md-6 col-sm-8 post-content">


		<?php
		if ( have_posts() ) : ?>

			<div class="page-header" style="display:none !important;">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
                
               <?php /* <img src="<?php if (function_exists('z_taxonomy_image_url')) echo z_taxonomy_image_url(); ?>" />*/ ?>

			</div><!-- .page-header -->

			<?php
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

<div class="col-sm-3 left-sidebar visible-xs">
<div class="fixed-sidebar-left">
<div class="widget widget_search">
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
        <input type="search" class="search-field"
            placeholder="<?php echo esc_attr_x( 'Search', 'placeholder' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
</form>
<a href="#" class="sidebar-toggle"><i class="fa fa-bars"></i></a>
</div>
<?php dynamic_sidebar( 'sidebar-fixed' ); ?>
</div>
</div>

<div class="col-md-3 col-sm-4 right-sidebar">
<div class="sidebar">
<?php get_sidebar();?>
</div>
</div>
</div>

<?php get_footer();