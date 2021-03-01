<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ecns
 */

get_header(); ?>


<section class="page-banner bg-image" style="background:url(<?php bloginfo('url');?>/wp-content/uploads/2020/04/Header-Test.jpg) no-repeat center center;">			
<div class="container">
				<div class="row">

					<div class="col-md-12">
						<div class="title">
                        <h1>404 Not Found</h1>					
						</div>
					</div>

				</div>
			</div>
		</section>
        
     <style>
section.page-banner {
	display:none !important;
}
section.page-banner + section.page-banner {
	display:block !important;
}
</style>   


<div class="section blog">


<div class="container">
<div class="row">
<div class="col-md-12 col-sm-12 post-content" style="z-index:3;">

<div class="post clearfix">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title" style=""><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'ecns' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'ecns' ); ?></p>

					<?php
						get_search_form();?>

						<div class="clearfix"></div>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
</div></div>
</div></div>         
</div>

<?php get_footer();