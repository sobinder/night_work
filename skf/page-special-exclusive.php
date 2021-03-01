<?php
/**
 * Template Name: Special Exclusive
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ecns
 */

get_header(); ?>




<?php while ( have_posts() ) : the_post(); ?>







<section class="exclusive-offers">
			<div class="container">
				<div class="row">

					<div class="col-md-12">
						<h2>exclusive <strong>offers</strong></h2>
					
						<a href=""><img src="<?php echo get_template_directory_uri();?>/images/email.jpg"></a>
						<h3> RECEIVE EXCLUSIVE SHOWROOM OFFERS</h3>
						<p>Sign up to Sky King Fireworks Email Blasts below and get the best offers and coupons directly to your Inbox</p>

						<div class="form-group">
							<?php echo do_shortcode('[contact-form-7 id="4188" title="Specials"]');?>
						</div>
					</div>

				</div>
			</div>
		</section>






<section class="proper-use d-none">
			<div class="container">
				<div class="row">

					<div class="col-md-12">
						<div class="content">
							<h2>How to Properly Use <strong>Aerial Repeaters</strong></h2>

							<div class="gallery">
								<ul>
									<li><img src="<?php echo get_template_directory_uri();?>/images/pyrotechnig.png"></li>
									<li><img src="<?php echo get_template_directory_uri();?>/images/17-shots.png"></li>
									<li><img src="<?php echo get_template_directory_uri();?>/images/21-shots.png "></li>
								</ul>
							</div>

							<h5>Pre-Show Setup</h5>
							<ul>
								<li>
									<strong>1.</strong>
									<p>Set up your repeaters on a hard flat, level surface.</p>
								</li>
                                <li>
									<strong>2.</strong>
									<p>Make sure you have a clear , open space to shoot with 150 ft. distance between your launch site and the audience or inhabited buildings.</p>
								</li>
                                <li>
									<strong>3.</strong>
									<p>Have a hose, fire extinguisher, or water supply at hand for emergencies.</p>
								</li>
								<li>
									<strong>4.</strong>
									<p>Be sure you stabilize your repeater with bricks.</p>
								</li>
								
								<li>
									<strong>5.</strong>
									<p>Make sure all fuses are covered until ready to use.</p>
								</li>
								
							</ul>

							<h5>Using Aerial Repeaters</h5>
							<ul>
								<li>
									<strong>1.</strong>
									<p>Be sure to wear Safety Glasses and Safety Gloves when lighting.</p>
								</li>
								
								<li>
									<strong>2.</strong>
									<p>Use a Sky King Torch, punk or extended lighter to light.</p>
								</li>
                                
                                <li>
									<strong>3.</strong>
									<p>Use a flashlight at night so you can see the fuse.</p>
								</li>
                                
                                <li>
									<strong>4.</strong>
									<p>After you light the fuse move a minimum of 20 feet from the repeater.</p>
								</li>
                                
                                
								<li>
									<strong>5.</strong>
									<p>Never re-use a repeater that fails to light the first time, use a hose or other water source to soak the repeater and safety dispose of the repeater outdoors.</p>
								</li>
								
							</ul>

							<h5>product Warning</h5>
							<ul>
								<li>
									<strong>1.</strong>
									<p>Do not use with Alcohol.</p>
								</li>
                                <li>
									<strong>2.</strong>
									<p>Never attempt to take a repeater apart.</p>
								</li>
								<li>
									<strong>3.</strong>
									<p>Never put your head or any part of your body over a repeater.</p>
								</li>
								
							</ul>
						</div>
					</div>

				</div>
			</div>
		</section>






<?php endwhile; ?>
<?php get_footer();