<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ecns
 */
?>
<?php $the_query = new WP_Query( 'page_id=4458' ); ?>

<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>


<section class="page-banner shop-banner bg-image" style="background:url(<?php if( get_field('header_image') ) { ?><?php echo the_field('header_image');?>);"><?php } else { ?><?php echo get_template_directory_uri();?>/images/banner.jpg) no-repeat center center;"><?php } ?>
			<div class="container">
				<div class="row">

					<div class="col-md-12">
						<div class="title">
                        <?php if( get_field('header_text') ) { ?><?php echo the_field('header_text');?><?php } else { ?><h1><?php echo empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent );?></h1><?php } ?>
                        
                      
						
						</div>
					</div>

				</div>
			</div>
		</section>
        
     <?php endwhile;?>
     
     

        
     
<div class="section clearfix d-none">
<div class="download-coupon clearfix">
<div class="container text-center">
<?php the_field('all_the_big_staff');?>
</div>
</div>
</div>
</div>



<div class="container d-none hidden">
<div class="row">
<div class="col-md-12 col-sm-12">
<div class="shop-content clearfix">

<div class="clearfix text-center"><h2 class="shop-title">Recommended</h2></div>




     
     
     
     <div class="bxslider">
	  <?php if( get_field('select_recommended_categories') ): ?>
							<?php
                            $terms = get_field('select_recommended_categories');
                            if( $terms ): ?>
                                <?php foreach( $terms as $term ): ?>
                                <div class="slider_item">
                                <div class="col-sm-6 m-center">
                                <h2><?php echo  '' . $term->name . '';?></h2>
                                <div class="visible-xs"><?php woocommerce_subcategory_thumbnail( $term, 'full' );?></div>
                                <p><?php echo  '' . $term->description . '';?></p>
                                <?php echo '<a href="' . get_term_link( $term ) . '" class="btn m-center">';?>Show item<?php echo '</a>';?>
                                </div>
                                <div class="col-sm-6  m-center text-center hidden-xs">
                                <?php echo '<a href="' . get_term_link( $term ) . '">';?>
								<?php woocommerce_subcategory_thumbnail( $term, 'full' );?>
                                <?php echo '</a>';?>
                                </div>
                                 </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
              <?php endif;?>
	</div>
	<br />
  
  <ul id="bx-pager" class="hidden">
                     
                     
	   <?php if( get_field('select_recommended_categories') ): ?>
							<?php
                            $terms = get_field('select_recommended_categories');
							$n='0';
                            if( $terms ): ?>
                            
                                <?php foreach( $terms as $term ): ?>
                                
                                <li><a href="<?php get_term_link($term);?>" data-slide-index="<?php echo $n++ ?>">
                                <div>
								<?php woocommerce_subcategory_thumbnail( $term, 'full' );
								echo '</div>';
										echo '<span>' . $term->name . '</span>';
										echo '</a></li>';?>
                                </a></li>

                                <?php endforeach; ?>
                            <?php endif; ?>


              <?php endif; wp_reset_query();?>
	</ul>

                        </div>
                        </div>





              
</div></div>

</div>
</div>


        
<div class="clearfix">
<div class="section-categories">

<div class="container">
<div class="row">

<?php
 $args = array(
    'number'     => 200,
    'orderby'    => 'menu_order',
    'order'      => 'asc',
    'hide_empty' => 1,
);
$product_categories = get_terms( 'product_cat', $args );
$count = count($product_categories);
 if ( $count > 0 ){
     foreach ( $product_categories as $product_category ) {
       echo '<div class="col-md-4 col-lg-3 col-sm-6 col-sm-6"><a href="' . get_term_link( $product_category ) . '" style="border:none !important;"><div><div>';
	    woocommerce_subcategory_thumbnail( $product_category, 'full' );
		echo '</div></div><span>' . $product_category->name . '</span>';
		echo '</a>';
		echo '</div>';
     }
 }
?>
</div>
</div>
</div>
</div>




     
<section class="king-fireworks clearfix bg-image" style=" margin-bottom:0 !important;">

			<div class="container" style="max-width: 1700px;">
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
        
        <style>.king-fireworks:after { height:100% !important;} .king-fireworks { padding-bottom:50px !important;padding-top:60px !important;}</style>
        
        