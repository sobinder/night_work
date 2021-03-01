<?php
/**
 * Template Name: Homepage
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

<section class="slider-wrapper" style=" margin-bottom:50px;">
<div class="slider">
			<?php
			global $post;
			$args = array( 'posts_per_page' => 100, 'post_type'=> 'sliders');
			$myposts = get_posts( $args );
			foreach( $myposts as $post ) : setup_postdata($post); ?>
			<div style="background:url('<?php the_field('slider_background'); ?>') no-repeat bottom center;background-size:cover;position:relative;min-height:750px;text-align:center;">
            <a href="<?php the_field('slider_link'); ?>" style="position:absolute;width:100%;height:100%;top:0;left:0;display:block;">
             <div style="display:table;width:100%;height:100%;">
               <div class="m-top" style="display:table-cell;vertical-align:middle;">
               <div classs="container">
                 <div class="row justify-content-center">
                   <div class="col-sm-9"><img data-src="<?php the_field('slider_image'); ?>" alt="" class="lazy img-responsive" style="width:auto !important;"></div>
                 </div>
                 </div>
               </div>
              </div>
            </a>
            </div>
			<?php endforeach; ?>
            
            <?php wp_reset_query(); ?>
            
            
            
            
</div>






</section>









<section class="location-finder text-center clearfix" style="padding:0; padding-bottom:30px;">
<div class="container" style="max-width:1500px;">
<div class="row justify-content-center">
<div class="col-md-12 text-center"> 
<div class="title star blue">
<h2 style="text-align:center !important;">Find A <strong>Showroom</strong> </h2>
</div></div>
<div class="col-md-8">
<div class="bh-sl-container">
	<div id="page-header">
	</div>

	<div class="bh-sl-form-container">
		<form id="bh-sl-user-location" method="get" action="<?php bloginfo('url'); ?>/locations">
                                <div class="form-input address-input form-field clearfix" data-toggle="tooltip" data-placement="top" title="Please type the starting address to enable directions" style="position:relative;max-width:850px;">
                                    <input type="text" id="bh-sl-address" name="bh-sl-address" placeholder="Enter a city and state or postal code"/>
<button id="bh-sl-submit" type="submit">Submit</button>
                                </div>

		</form>
		
	</div>
</div>


</div>


</div>
</div>
</section>










<section class="our-products np">
			<div class="container">
				<div class="row">

					<div class="col-md-12 col-sm-12 col-12 text-center">
						<div class="title">
						<?php the_field('products_title');?>
                        </div>
					</div>
					
					<div class="col-md-12">
                    
                    
                    <ul class="featured-slider">
                    
                   
                    <?php 
$posts = get_field('select_featured_products');
if( $posts ): ?>
    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>

          <li>
<div>
<a href="<?php the_permalink();?>">
<img class="lazy" data-src="<?php the_post_thumbnail_url("full");?>" alt="" /></a>
</div>
								<a href="<?php the_permalink();?>">
								<h3><?php the_title();?></h3>
								<p><?php $content = get_the_excerpt(); echo wp_trim_words( $content , '8' ); ?></p>
								</a>
							</li>
       
<?php endforeach; ?>

</ul>

<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>



                    	
					</div>

				</div>
			</div>
            
            
        
        
		</section>

		


<div class="clearfix text-center featured-videos">
<div class="container">
<div class="row">
<div class="col-sm-12 clearfix">
<div class="title star blue"><?php the_field('featured_videos_title');?></div>
</div>
<div class="col-sm-12 clearfix">
					<div class="stm-medias-unit clearfix">
                    
                    
                    <?php
			global $post;
			$args = array( 'posts_per_page' => 100, 'post_type'=> 'videos');
			$myposts = get_posts( $args );
			foreach( $myposts as $post ) : setup_postdata($post); ?>
			<?php $video = get_field("video_id");?>
            <?php $block_size = get_field('video_block_size');?>
             <div class="stm-media-single-unit <?php echo ''.$block_size.'';?>">
			<a href="https://www.youtube.com/watch?v=<?php the_field('video_id'); ?>" class="lazy video-popup video-modal-btn" data-bg="<?php if ( has_post_thumbnail() ) {the_post_thumbnail_url();}
else {echo 'https://img.youtube.com/vi/' .$video. '/3.jpg'; }?>"></a>
            </div>
			<?php endforeach; ?>
            
            <?php wp_reset_query(); ?>
            
   
</div></div>

</div>
</div>
</div>









<?php if (is_front_page() or is_blog() or is_shop()) { ?>   


                
<?php } else { ?>
<section class="king-fireworks clearfix bg-image">
			<div class="container">
				<div class="row">

					<div class="col-md-12">
						<h3>Sky King Fireworks Has</h3>
						<h2>THE <strong>BEST</strong> FIREWORKS AT THE <strong>LOWEST</strong> PRICES</h2>
					</div>
					<div class="col-md-6">
						<div class="text-right"><a href="<?php bloginfo('url');?>/product-category/new-products/" class="btn">new products</a></div>
					</div>
					<div class="col-md-6">
						<a href="<?php bloginfo('url');?>/product-category/best-sellers/" class="btn">best sellers</a>
					</div>

				</div>
			</div>
		</section>

<?php } ?>



<div class="clearfix newsletter">
<div class="newsletter_top">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="join-list">

<div class="title star">
<?php the_field('special_offers_title','option');?>
</div>


</div>
</div>
</div>
</div>
</div>

<div class="newsletter_middle">
<div class="container">
<div class="row">

<div class="col-md-12 clearfix">

 
                                 <ul class="special-slider">
                                 
                                 
                                 
<?php if(get_field('special_offers','option')): ?>
<?php while(the_repeater_field('special_offers','option')): ?>
<li>
								<div>
                                <a href="<?php the_sub_field('link','option');?>">
                                <?php if(get_sub_field('image','option')): ?> 
								<img class="lazy" data-src="<?php the_sub_field('image','option');?>" />
								<?php endif; ?>
                                </a>
</div>
								<a href="<?php the_sub_field('link','option');?>">
								<h3><?php the_sub_field('small_text','option');?></h3>
								<h2><?php the_sub_field('large_text','option');?></h2>
								</a>
							</li>
<?php endwhile; ?>
 <?php endif; ?>


                                

                        
                            
                            </ul>
                            
                            </div>
                            


</div>

</div>
</div>
</div>




<div class="newsletter_bottom">
<img class="lazy" data-src="<?php echo get_template_directory_uri();?>/images/border_bottom.png" style="width:100%; display:block;" />
</div>


</div>












<section class="logo-bar text-center hidden-xs" style="padding-top:0;">
<div class="container">
<div class="row justify-content-center">

<div class="col-md-12 text-center" style="padding-bottom:15px;">
<div class="title star blue"><?php the_field('logos_title','option');?></div>
</div>

<div class="col-8">

 <ul class="list-inline d-inline-flex justify-content-around">
 
 
 <?php if(get_field('logos','option')): ?>

    <?php while(the_repeater_field('logos','option')): ?>
   
 <li><img class="lazy" data-src="<?php the_sub_field('logo');?>"></li>
                    

    <?php endwhile; ?>
 <?php endif; ?>

                                </ul>    

</div>





</div>
</div>
</section>



        
<?php get_footer(); ?>
