<?php
/**
 * Template Name: Newsletter
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ecns
 */

get_header(); ?>




<?php while ( have_posts() ) : the_post(); ?>



<section class="news-letter">
			<div class="container">
				<div class="row">

					<div class="col-md-12">
						<div class="king-corner bg-imge">
							<div style=" margin-left:auto; margin-right:auto; width:100%; max-width:1000px;">
                            <h2>The King's Corner <strong>SIGN UP</strong></h2>
							<p>Sign up for our E-Newsletter to receive exclusive coupons, in-store specials and sneak peeks at new products.</p>                            
                             <?php echo do_shortcode('[mc4wp_form id="39"]');?>
							 
                             </div>							
						</div>
					</div>

				</div>
			</div>
		</section>
<?php endwhile; ?>
<?php get_footer();