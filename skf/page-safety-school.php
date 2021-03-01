<?php
/**
 * Template Name: Safety School
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


<section class="welcome-to">
			<div class="container" style="max-width: 1700px;">
				<div class="row">

					<div class="col-md-12 text-center">
						<h2>Welcome to sky king's safety school</h2>
						<p>WE HOPE THAT YOU WILL ENJOY THE FUN AND EXCITEMENT OF SKY KING FIREWORKS PRODUCTS IN A SAFE AND CAREFUL MANNER.<br />First and foremost, THANK YOU for choosing Sky King Fireworks to light up your night. Fireworks have been around for thousands of years and have been used and enjoyed by millions of people around the world.Fireworks started in China, but over the years have become an American tradition. They can provide family and friends with nights and days full of fun and entertainment, but must be used by adults carefully and safely.We hope that you will enjoy the fun and excitement of your Sky King Fireworks.</p>
						
						<h4>Click on a product below to see how to properly use it in a safe and enjoyable manner</h4>

						<ul>
                        
                         <?php
$posts = get_field('select_proper_use_pages');
if( $posts ): ?>
    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>

							<li><a href="<?php the_permalink();?>" style="background:url(<?php the_post_thumbnail_url("full");?>);"><h2><?php the_title();?></h2></a></li>
      
    <?php endforeach; ?>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>

						</ul>
					</div>

				</div>
			</div>
		</section>

		<section class="safety-school">
			<div class="container">
				<div class="row">

					<div class="col-md-12 text-center">
						<h2>learn more at sky king safety school</h2>
						<p>Sky King is committed to providing you with all the information you need to properly handle and enjoy all types of fireworks.</p>

						<ul>
                        
                        <?php
$posts = get_field('select_sub_pages');
if( $posts ): ?>
    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>

							<li><a href="<?php the_permalink();?>"><img src="<?php the_post_thumbnail_url("full");?>"> </a></li>
      
    <?php endforeach; ?>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
							
							
						</ul>
					</div>

				</div>
			</div>
		</section>






<?php get_footer();