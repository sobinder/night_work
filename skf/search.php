<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package ecns
 */

get_header(); ?>

<div class="shop-banner" style=" background:url(<?php bloginfo('url');?>/wp-content/uploads/2020/04/Header-Test.jpg);">
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

<div class="col-md-12 col-sm-12 post-content">

<div class="clearfix">
		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'ecns' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

</div>
</div>
</div>
</div>


</div>

<?php get_footer();