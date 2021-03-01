<?php
/**
 * Template Name: Special
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ecns
 */

get_header(); ?>




<?php while ( have_posts() ) : the_post(); ?>





<section class="store-specials specials-home">
			<div class="container">
				<div class="row">

					<div class="col-md-12">
						<div class="content">
<?php if(get_field('specials')): ?>
<?php while(the_repeater_field('specials')): ?>
<a href="<?php the_sub_field('special_link');?>"><img src="<?php the_sub_field('special_image');?>" /></a>
<?php endwhile; ?>
 <?php endif; ?>


<?php the_field('more_specials_text');?>

<ul>
<?php if(get_field('more_specials')): ?>
<?php while(the_repeater_field('more_specials')): ?>
<li><a href="<?php the_sub_field('link');?>"><img src="<?php the_sub_field('image');?>" /></a></li>
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