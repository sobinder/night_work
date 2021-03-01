<?php
/**
 * Template Name: Safety Tips
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

<section class="safety-tips">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-2 col-md-4">
						
						<?php
									wp_nav_menu( array(
										'menu'              => 'glossary-menu',
										'theme_location'    => 'glossary-menu',
										'depth'             => 2,
										'container'         => '',
										'menu_class'        => 'sidebar-menu',
										'menu_id'        => '',
										)
									);
								?> 
						
					</div>

					<div class="col-md-12 col-lg-10">
						<div class="content">
							<?php the_content();?>
						</div>
					</div>

				</div>
			</div>
		</section>

<?php endwhile; ?>



<?php get_footer();