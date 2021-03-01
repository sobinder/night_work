<?php
/**
 * Template Name: Kings Classroom
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
<style>
.page-template-page-king-classroom .post-content:before, .page-template-page-king-classroom-subpage .post-content:before {display:none !important;}
</style>

<div class="shop-banner" style=" background:url(<?php if( has_post_thumbnail() ) { ?><?php echo the_post_thumbnail_url('full');?>);"><?php } else { ?><?php echo get_template_directory_uri();?>/images/king-class-room.jpg) no-repeat center center;"><?php } ?>
<div class="container">
<div class="row">
<div class="col-sm-12">
<h1><?php
echo empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent );
?></h1>
</div>
</div>
</div>
</div>


<div class="section blog clearfix">
<div class="container">
<div class="row">



<div class="col-md-12 col-sm-12 post-content king-class-room-boxes m-left np">
<?php
			while ( have_posts() ) : the_post(); ?>

				
				<div class="col-sm-4 col-xs-6 text-center">
                <a href="<?php the_field('box_one_link');?>">
                <img src="<?php the_field('box_one_image');?>" width="200" height="200" /> 
               <?php the_field('box_one_text');?></a> </div>
                
				<div class="col-sm-4 col-xs-6 text-center">
                <a href="<?php the_field('box_two_link');?>">
                <img src="<?php the_field('box_two_image');?>" width="200" height="200" /> 
               <?php the_field('box_two_text');?></a> </div>
               
               				<div class="col-sm-4 col-xs-6 text-center">
                <a href="<?php the_field('box_three_link');?>">
                <img src="<?php the_field('box_three_image');?>" width="200" height="200" /> 
               <?php the_field('box_three_text');?></a> </div>
               
               				<div class="col-sm-4 col-xs-6 text-center">
                <a href="<?php the_field('box_four_link');?>">
                <img src="<?php the_field('box_four_image');?>" width="200" height="200" /> 
               <?php the_field('box_four_text');?></a> </div>
               
               				<div class="col-sm-4 col-xs-6 text-center">
                <a href="<?php the_field('box_five_link');?>">
                <img src="<?php the_field('box_five_image');?>" width="200" height="200" /> 
               <?php the_field('box_five_text');?></a> </div>
               
               				<div class="col-sm-4 col-xs-6 text-center">
                <a href="<?php the_field('box_six_link');?>">
                <img src="<?php the_field('box_six_image');?>" width="200" height="200" /> 
               <?php the_field('box_six_text');?></a> </div>
               
                
			<?php endwhile; // End of the loop.
			?>
</div>
<div class="clearfix visible-xs"></div>
<div class="col-md-3 col-sm-4 left-sidebar hidden">

<div class="post clearfix">
<ul class="king-class-room-list">
 <ul class="king-class-room-list">
    <?php the_field('sidebar_menu');?>
  </ul>
</ul>
</div> </div>


</div>
</div>
</div>

<?php get_footer();