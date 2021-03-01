<?php
/**
 * Template Name: Chemistry
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


<section class="chemistry">
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
							<h2>chemistry of <strong>fireworks</strong></h2>
					
							<ul>
								<li>
									<img src="<?php echo get_template_directory_uri();?>/images/aluminum.jpg">
									<h3>Aluminum</h3>
									Aluminum is used to produce silver and white flames and sparks. It is a commoncomponent of sparklers.
								</li>
								<li>
									<img src="<?php echo get_template_directory_uri();?>/images/barium.jpg">
									<h3>Barium</h3>
									Barium is used to create green colors in fireworks, and it can also help stabilize other volatile elements.
								</li>
								<li>
									<img src="<?php echo get_template_directory_uri();?>/images/carbon.jpg">
									<h3>Carbon</h3>
									Carbon is one of the main components of black powder, which is used as apropellent in fireworks. Carbon provides the fuel for a firework. Common forms include carbon black, sugar, or starch.
								</li>
								<li>
									<img src="<?php echo get_template_directory_uri();?>/images/calcium.jpg">
									<h3>Calcium</h3>
									Calcium is used to deepen firework colors. Calcium salts produce orange fireworks.
								</li>
								<li>
									<img src="<?php echo get_template_directory_uri();?>/images/chlorine.jpg">
									<h3>Chlorine</h3>
									Chlorine is an important component of many oxidizers in fireworks. Several of the metal salts that produce colors contain chlorine.
								</li>
								<li>
									<img src="<?php echo get_template_directory_uri();?>/images/copper.jpg">
									<h3>Copper</h3>
									Copper compounds produce blue colors in fireworks.
								</li>
								<li>
									<img src="<?php echo get_template_directory_uri();?>/images/iron.jpg">
									<h3>Iron</h3>
									Iron is used to produce sparks. The heat of the metal determines the color of the sparks.
								</li>
								<li>
									<img src="<?php echo get_template_directory_uri();?>/images/potassium.jpg">
									<h3>Potassium</h3>
									Potassium helps to oxidize firework mixtures. Potassium nitrate, potassium chlorate, and potassium perchlorate are all important oxidizers.
								</li>
								<li>
									<img src="<?php echo get_template_directory_uri();?>/images/lithium.jpg">
									<h3>Lithium</h3>
									Lithium is a metal that is used to impart a red color to fireworks. Lithium carbonate, in particular, is a common colorant.
								</li>
								<li>
									<img src="<?php echo get_template_directory_uri();?>/images/magnesium.jpg">
									<h3>Magnesium</h3>
									Magnesium burns a very bright white, so it is used to add white sparks or improve the overall brilliance of a firework.
								</li>
								<li>
									<img src="<?php echo get_template_directory_uri();?>/images/sodium.jpg">
									<h3>Sodium</h3>
									Sodium imparts a gold or yellow color to fireworks, however, the color is often so bright that it frequently masks other, less intense colors.
								</li>
								<li>
									<img src="<?php echo get_template_directory_uri();?>/images/oxygen.jpg">
									<h3>Oxygen</h3>
									Fireworks include oxidizers, which are substances that produce oxygen in order for burning to occur. The oxidizers are usually nitrates, chlorates, or perchlorates. Sometimes the same substance is used to provide oxygen and color.
								</li>
								<li>
									<img src="<?php echo get_template_directory_uri();?>/images/phosphorus.jpg">
									<h3>Phosphorus</h3>
									Phosphorus burns spontaneously in air and is also responsible for some glow in the dark effects. It may be a component of a firework's fuel.
								</li>
								<li>
									<img src="<?php echo get_template_directory_uri();?>/images/sulfur.jpg">
									<h3>Sulfur</h3>
									Sulfur is a component of black powder, and as such, it is found in a firework's propellant/fuel.
								</li>
								<li>
									<img src="<?php echo get_template_directory_uri();?>/images/antimony.jpg">
									<h3>Antimony</h3>
									Antimony is used to create firework glitter effects.
								</li>
								<li>
									<img src="<?php echo get_template_directory_uri();?>/images/strontium.jpg">
									<h3>Strontium</h3>
									Strontium salts impart a red color to fireworks. Strontium compounds are also important for stabilizing fireworks mixtures.
								</li>
								<li>
									<img src="<?php echo get_template_directory_uri();?>/images/titanium.jpg">
									<h3>Titanium</h3>
									Titanium metal can be burned as powder or flakes to produce silver sparks.
								</li>
								<li>
									<img src="<?php echo get_template_directory_uri();?>/images/zinc.jpg">
									<h3>Zinc</h3>
									Zinc is a bluish white metal that is used to create smoke effects for fireworks and other pyrotechnic devices.
								</li>
							</ul>
						</div>
					</div>

				</div>
			</div>
		</section>



<?php get_footer();