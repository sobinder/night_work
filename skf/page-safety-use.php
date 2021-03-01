<?php
/**
 * Template Name: Safety Use
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


<?php while ( have_posts() ) : the_post();?>

<section class="proper-use">
			<div class="container" style="max-width:1400px;">
				<div class="row">

					<div class="col-md-12">
						<div class="content">
                        
							<?php the_field('heading');?>

							<div class="gallery" style="width:100%;max-width:860px;margin-left:auto;margin-right:auto;">
								<ul>
                                
<?php if(get_field('product_images')): ?>
<?php while(the_repeater_field('product_images')): ?>
<li><img src="<?php the_sub_field('image');?>" /></li>
<?php endwhile; ?>
 <?php endif; ?>
								</ul>
							</div>

							<?php the_field('pre-show');?>
                            <?php the_field('usage');?>
                            <?php the_field('warning');?>

							

						</div>
					</div>

				</div>
			</div>
		</section>
        
<?php endwhile;?>

<?php get_footer();