<?php
/**
 * Template Name: Special Bonus Program
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ecns
 */

get_header(); ?>




<?php while ( have_posts() ) : the_post(); ?>



<section class="bonus-program">
			<div class="container" style="max-width: 1700px;">
				<div class="row">

					<div class="col-md-12">
						<div class="content">
                        <?php the_field('bonus_program_title');?>
							
							<ul>
                            <?php if(get_field('bonus_program_images')): ?>
<?php while(the_repeater_field('bonus_program_images')): ?>
<li><img src="<?php the_sub_field('image');?>" /></li>
<?php endwhile; ?>
 <?php endif; ?>

							</ul>

							
                            <?php the_field('bonus_program_footer_text');?>
                           
						</div>
					</div>

				</div>
			</div>
		</section>






<?php endwhile; ?>
<?php get_footer();