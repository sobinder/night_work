<?php
/**
 * Template Name: Special In-Store 
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ecns
 */

get_header(); ?>




<?php while ( have_posts() ) : the_post(); ?>






<section class="store-specials">
			<div class="container">
				<div class="row">

					<div class="col-md-12">
						<div class="content">
							
                            <?php the_field('in_store_title');?>

							<ul style="margin-left:-20px;">
                            
                            <?php if(get_field('in_store_images')): ?>
<?php while(the_repeater_field('in_store_images')): ?>
<li><img src="<?php the_sub_field('image');?>" /></li>
<?php endwhile; ?>
 <?php endif; ?>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</section>



<?php endwhile; ?>
<?php get_footer();