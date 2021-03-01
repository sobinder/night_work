<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ecns
 */

?>


<section class="page-banner shop-banner bg-image" style="background:url(<?php if( get_field('header_image') ) { ?><?php echo the_field('header_image');?>);"><?php } else { ?><?php bloginfo('url');?>/wp-content/uploads/2020/04/Header-Test.jpg) no-repeat center center;"><?php } ?>
			<div class="container">
				<div class="row">

					<div class="col-md-12">
						<div class="title">
                        <?php if( get_field('header_text') ) { ?><?php echo the_field('header_text');?><?php } else { ?><h1><?php echo woocommerce_page_title();?></h1><?php } ?>
                        
                      
						
						</div>
					</div>

				</div>
			</div>
		</section>
        

<div class="product-content">

<div class="container">
<div class="row">


<div class="col-md-3">

<div class="sidebar d-none d-md-block">

<p class="text-center"><a class="d-md-none" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" style=" margin-top:15px;font-size:18px;font-family:Roboto;font-weight:700;color:#fff;background:#ee2225; text-decoration:none;border: none; display:inline-block; padding-left:20px !important; margin-left:auto !important; margin-right:auto !important; padding-right:20px !important;border-radius: 5px;height:55px;line-height:55px; padding:0; margin-left:auto; margin-right:auto; margin-bottom:0px;">Filters</a></p>
<div class="row">
  <div class="col">
    <div class="collapse d-md-block multi-collapse" id="multiCollapseExample1">
      <?php dynamic_sidebar('product-sidebar');?>
    </div>
  </div>
  
</div>



</div>

</div>


<div class="col-md-9">

        
<div class="shop-breadcrumb">
<div class="container">
<div class="row">
<div class="col-sm-12 clearfix">
<nav class="woocommerce-breadcrumb">
<a href="<?php bloginfo('url'); ?>">Home</a>
<?php woocommerce_breadcrumb(); ?>
</nav>
</div>

</div>
</div>
</div>



<div class="shop-banner d-none">
<div class="container">
<div class="row">
<div class="col-sm-12">
<h2><?php echo woocommerce_page_title();?></h2>
</div>
</div>
</div>
</div>





<div class="shop-attributes">
<div class="container d-none">
<div class="row">
<div class="col-sm-12 text-center">
<?php dynamic_sidebar('sidebar-fixed'); ?>
</div>
<hr />
</div>
</div>


<div class="container">
<div class="row">
<div class="col-md-12 np col-sm-12">
<div class="shop-content clearfix">




    

		<?php if ( have_posts() ) : ?>

			


		



			<?php woocommerce_product_loop_start(); ?>

				<?php woocommerce_product_subcategories(); ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php wc_get_template_part( 'content', 'product' ); ?>

				<?php endwhile; // end of the loop. ?>

			<?php woocommerce_product_loop_end(); ?>

			<?php
				/**
				 * woocommerce_after_shop_loop hook.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action( 'woocommerce_after_shop_loop' );
			?>

		<?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

			<?php wc_get_template( 'loop/no-products-found.php' ); ?>

		<?php endif; ?>





	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>




</div></div>

</div>
</div></div>

</div>


</div>


</div>
</div>