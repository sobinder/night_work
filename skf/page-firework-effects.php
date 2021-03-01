<?php
/**
 * Template Name: Fireworks Effects
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

<section class="effects">
			<div class="container" style="max-width:1600px;">
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
							<?php the_field('fireworks_title');?>
<ul>                         
<?php if(get_field('fireworks_images')): ?>
<?php while(the_repeater_field('fireworks_images')): ?>
<li>
<img src="<?php the_sub_field('image');?>" />
<h3><?php the_sub_field('text');?></h3>
</li>
<?php endwhile; ?>
 <?php endif; ?>
								
								
							</ul>
						</div>
					</div>

				</div>
			</div>
		</section>


<?php get_footer();