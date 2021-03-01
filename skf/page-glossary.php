<?php
/**
 * Template Name: Glossary
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

<section class="glossary">
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

							<h2>fireworks <strong>glossary</strong></h2>
							
							<table class="glossary-nav">
								<tbody>
									<tr>
										<td><a class="letter-a active">a</a></td>
										<td><a class="letter-b">b</a></td>
										<td><a class="letter-c">c</a></td>
										<td><a class="letter-d">d</a></td>
										<td><a class="letter-e">e</a></td>
										<td><a class="letter-f">f</a></td>
										<td><a class="letter-g">g</a></td>
										<td><a class="letter-h">h</a></td>
										<td><a class="letter-i">i</a></td>
										<td><a class="letter-j">j</a></td>
										<td><a class="letter-k">k</a></td>
										<td><a class="letter-l">l</a></td>
										<td><a class="letter-m">m</a></td>
									</tr>
									</tr>	
										<td><a class="letter-n">n</a></td>
										<td><a class="letter-o">o</a></td>
										<td><a class="letter-p">p</a></td>
										<td><a class="letter-q">q</a></td>
										<td><a class="letter-r">r</a></td>
										<td><a class="letter-s">s</a></td>
										<td><a class="letter-t">t</a></td>
										<td><a class="letter-u">u</a></td>
										<td><a class="letter-v">v</a></td>
										<td><a class="letter-w">w</a></td>
										<td><a class="letter-x">x</a></td>
										<td><a class="letter-y">y</a></td>
										<td><a class="letter-z">z</a></td>
									</tr>
								</tbody>
							</table>
                            
                            
                            
                            <?php the_content();?>



						</div>
					</div>

				</div>
			</div>
		</section>



<?php endwhile; ?>

<?php get_footer();