<?php
/**
 * Template Name: State Laws
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


<section class="state-laws">
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
							<h2>STATE <strong>LAWS</strong></h2>
						
							<h4>Every state has different laws as it pertains to Fireworks. Familiarize yourself with your State Laws by clicking on a link below.</h4>
						
								<div class="text-center">
                                <ul>
<?php if(get_field('state_law_pdfs')): ?>
<?php while(the_repeater_field('state_law_pdfs')): ?>
<li><a href="<?php the_sub_field('state_law_pdf');?>" target="_blank" rel="noopener noreferrer"><?php the_sub_field('state');?></a></li>
<?php endwhile; ?>
 <?php endif; ?>


							</ul>
                            </div>
						</div>
					</div>

				</div>
			</div>
		</section>
        
        
        

<?php get_footer();