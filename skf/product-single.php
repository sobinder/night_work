       
<section class="page-banner bg-image" style="background:url(<?php if(get_field('header_image')) { ?>
<?php the_field('header_image');?>
<?php } else { ?>
<?php
$terms = get_the_terms( $post->ID, 'product_cat');
foreach ( $terms as $term ) {
    $termID[] = $term->term_id;
}
$trm = $termID[0];
$variable = get_field( 'header_image', 'product_cat_'.$trm );
if ( $variable )
  echo $variable;
?>
<?php } ?>) no-repeat center center;">

<div class="container">
				<div class="row">

					<div class="col-md-12">
						<div class="title">
                        <?php if( get_field('header_text') ) { ?><?php echo the_field('header_text');?><?php } else { ?>
                       <?php       global $post;
        $terms = get_the_terms( $post->ID, 'product_cat' );
        //$terms = get_the_terms( $post->ID, 'product_tag'  );
        foreach ($terms  as $term  ) {
            $product_cat_id = $term->term_id;
            $product_cat_name = $term->name;
            break;
        }

       echo '<h1>'.$product_cat_name.'</h1>'; ?>
                        <p>The biggest and best selection of fireworks, novelties, and celebration items</p><?php } ?>
						
						</div>
					</div>

				</div>
			</div>
</section>




<div class="section shop clearfix">

<div class="shop-breadcrumb" style="border-top:solid 50px #000;">
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


<div class="single-shop-content">

<div class="container" style="position:relative;">

<div class="post-navigation">
<?php previous_post_link_product('%link', '<i class="fa fa-angle-left"></i>', true); ?>
<?php next_post_link_product('%link', '<i class="fa fa-angle-right"></i>', true); ?>
</div>

<?php wc_print_notices(); ?>

<div class="row vertical-align">



<?php while ( have_posts() ) : the_post(); ?>

            <div class="col-lg-6 col-md-5">
            <a href="<?php the_post_thumbnail_url('full');?>" class="zoom first" title="" data-rel="prettyPhoto[product-gallery]"><img src="<?php the_post_thumbnail_url('full');?>" class="attachment-shop_thumbnail size-shop_thumbnail"></a>
            </div>
             <div class="col-lg-6 col-md-7 m-left">

             <h2 class="product-title"><?php the_title();?></h2>

<?php global $post, $product; ?>

             	<?php if ( wc_product_sku_enabled() && ( $product->get_sku()) ) : ?>

		<span class="sku_wrapper"><?php _e( '', 'woocommerce' ); ?> <span class="sku" itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : __( 'N/A', 'woocommerce' ); ?></span></span>

     <?php endif; ?>
     
     
<ul class="brands d-flex">  

<?php $terms = wc_get_product_terms( $product->get_id(), 'berocket_brand');
foreach ( $terms as $term ) {
$image 	= get_term_meta( $term->term_id, 'brand_image_url', true );
echo '<li><img src="'.$image.'" style="max-width:70px;">'.$term->name.'</li>';
}
?>

<?php $terms = wc_get_product_terms( $product->get_id(), 'berocket_series');
foreach ( $terms as $term ) {
$image 	= get_term_meta( $term->term_id, 'series_image_url', true );
echo '<li><img src="'.$image.'" style="max-width:70px;">'.$term->name.'</li>';
}
?>

</ul>

     
                 
     
     
     <div class="shop-text"> 
      <?php the_content();?>
      </div>
        
        
        <h2 class="product-price"><?php woocommerce_get_template( 'loop/price.php' ); ?></h2>
        
        
         <div class="border" style="border-top:none !important; margin-top:0; padding-top:0 !important;">
 <h2 class="product-price" style="font-family:'Roboto';color:#ff0000;font-size:24px; font-weight:700;">BUY 1 GET 1 ON ALL FIREWORKS</h2>
</div>
       





<div class="">
<div class="row align-items-center">


<div class="col-md-8"> 
<a href="#wow-modal-id-1" data-toggle="modal" data-target="#shop_store" class="btn btn-store btn-shop-store" style="font-size:18px;font-family:Roboto; font-weight:700;color:#fff;background:#0163ce;border: none;border-radius: 5px;height:55px;line-height:55px; padding:0; margin-bottom:20px;">Go to Online Store</a>
<!--<a href="<?php bloginfo('url');?>/locations" class="btn btn-store" style="font-size:16px;font-family:Roboto; font-weight:700;color:#fff;background:#c22121;border: none;border-radius: 5px;height:55px;line-height:55px; padding:0;">Shop the Store</a>-->
 <?php // echo do_shortcode('[yith_wcwl_add_to_wishlist]');?> </div>
 
 
<div class="col-md-12">

<div class="short-descr">
<p class="promotions"><i class="fa fa-check-circle"></i> Prices, Sales and Promotions may vary by location.</p>
</div>


 <?php if( get_field('instruction_page') ) { ?>
 <div class="border" style="border-bottom:none !important;">
<p style="color:#0163ce;"><i class="fa fa-info-circle"></i> <a href="<?php the_field('instruction_page');?>" style="color:#0163ce; font-weight:700;">LEARN HOW TO PROPERLY LIGHT THIS ITEM</a></p>
</div>
 <?php } else { ?>


 <?php } ?>
 

</div>

</div>
</div>
	
				 
					

	
		

             <div class="product_meta">

	<div class="clearfix meta-wrapper">
	<?php do_action( 'woocommerce_product_meta_start' ); ?>
	<div class="text-right m-center">

 	<?php /*woocommerce_template_single_add_to_cart();*/?>

    

     </div>


<div class="social-share m-center d-none">

<ul class="wpfai-list">
<li class="wpfai-list-item"> <strong style=" display:inline-block;">Share</strong></li>
<li class="wpfai-list-item facebook">
      <a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>" title="Facebook" class="wpfai-facebook wpfai-link" target="_blank">
          <i class="fa fa-facebook"></i>
      </a>
    </li><li class="wpfai-list-item twitter">
      <a href="http://twitter.com/home?status=<?php the_permalink();?>" title="Twitter" class="wpfai-twitter wpfai-link" target="_blank">
          <i class="fa fa-twitter"></i>
      </a>
    </li><li class="wpfai-list-item pinterest">
      <a href="http://pinterest.com/pin/create/button/?url=<?php the_permalink();?>&amp;media=<?php the_post_thumbnail_url('full');?>" title="Pinterest" class="wpfai-pinterest wpfai-link" target="_blank">
          <i class="fa fa-pinterest"></i>
      </a>
    </li><li class="wpfai-list-item envelope">
      <a href="mailto:?subject=<?php the_permalink();?>&amp;body=<?php the_excerpt();?>" title="E-Mail" class="wpfai-envelope wpfai-link" target="_blank">
          <i class="fa fa-envelope"></i>
      </a>
    </li></ul>
</div>



	<?php do_action( 'woocommerce_product_meta_end' ); ?>
    </div>


</div>

</div>

</div>
</div>
</div>

<?php if( get_field('youtube_video_id') ): ?>

 <?php if( get_field('background_image') ) { ?>
 <div class="parallax-window" data-parallax="scroll" data-image-src="<?php the_field('background_image'); ?>">
 <?php } else { ?>
<div class="parallax-window" data-parallax="scroll" data-image-src="<?php the_field('background_image','option'); ?>">

 <?php } ?>
 
 


<div class="product-description">
<div class="container">
<div class="row justify-content-center vertical-align">
<div class="col-md-9">
<h2><?php the_field('text','option');?></h2>



	<div class="video-container">
		<iframe width="560" height="349" src="https://www.youtube.com/embed/<?php echo get_field('youtube_video_id');?>?rel=0&hd=1" frameborder="0" allowfullscreen></iframe>
    </div>



</div>




</div>
</div>
</div>
</div>
</div>

		
<?php endif;?>



<section class="effects_and_colors">
<div class="container">

<div class="row align-items-center">
<div class="col-md-6">


<?php
$terms = get_the_terms( $product->get_id(), 'pa_color' ); ?>


<?php 
if($terms) { ?>

<div class="color-piece text-center">
<h2>COLORS IN THIS PIECE</h2>
<ul class="color justify-content-center row align-items-start">


<?php 
   foreach( $terms as $term ) {
	   $color = get_field('color_code', 'pa_color'.'_'.$term->term_id);
	   echo '<li class="col-4 col-lg-3 col-md-4"><div  style="background:url('.$color.')"></div><span>'.$term->name.'</span></li>';
} ?>
</ul>

</div>


</div>

<?php } ?>


<div class="col-md-6"> 



<?php
$terms = get_the_terms($product->get_id(), 'pa_effect' ); ?>

<?php 
if($terms) { ?>

<div class="color-piece text-center">
<h2>EFFECTS IN THIS PIECE</h2>
<ul class="color justify-content-center row align-items-start">


<?php 
   foreach( $terms as $term ) {
	   $image = get_field('effect', 'pa_effect'.'_'.$term->term_id);
	  echo '<li class="col-4 col-lg-3 col-md-4"><div  style="background:url('.$image.')"></div><span>'.$term->name.'</span></li>';
} ?>
</ul>

</div>


</div>

<?php } ?>

</div>
</div>
</section>

<?php endwhile; // end of the loop. ?>



<div class="container d-none comment-section">
<div class="row">
<div class="col-md-12 col-sm-12">



<div class="woocommerce-tabs wc-tabs-wrapper">
		<ul class="tabs wc-tabs">

                <li class="tab">
					<a href="#tab-write-a-review" class="tab-write-a-review">Comments</a>
				</li>

                <li class="tab">
					<a href="#tab-reviews">Write a review</a>
				</li>

		</ul>

<div class="clearfix"></div>

			<div class="panel entry-content wc-tab" id="tab-reviews">
				<?php if ( comments_open() ) : ?>
					<?php comments_template(); ?>
				<?php endif; ?>
			</div>

            <div class="panel entry-content wc-tab" id="tab-write-a-review">
				<?php wc_get_template( 'single-product-reviews.php' ); ?>
			</div>
	</div>


<?php if( get_field('recommended_products') ): ?>

  <h2 class="text-center shop-title">Recommended</h2>

<ul class="related-slider">

<?php
$posts = get_field('recommended_products');
if( $posts ): ?>
    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
      <?php setup_postdata($post); ?>
       <li><a href="<?php the_permalink();?>"><div><div><?php the_post_thumbnail();?></div></div><span><?php the_title();?></span></a></li>
    <?php endforeach; ?>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
</ul>
<?php endif;?>

<?php /*
 $args = array(
    'number'     => 12,
    'orderby'    => 'rand',
    'order'      => $order,
    'hide_empty' => 1,
);
$product_categories = get_terms( 'product_cat', $args );
$count = count($product_categories);
 if ( $count > 0 ){
     foreach ( $product_categories as $product_category ) {
       echo '<li><a href="' . get_term_link( $product_category ) . '"><div><div>';
	    woocommerce_subcategory_thumbnail( $product_category, 'full' );
		echo '</div></div><span>' . $product_category->name . '</span>';
		echo '</a>';
		echo '</li>';
     }
 }
*/ ?>



</div>
</div>
</div>


<section class="related_products">
<div class="container">
<div class="row">
<div class="col-md-12 text-center">
<div class="title star blue text-center">
<h2 class="text-center">Complete <strong>Your Show</strong></h2>
</div>
</div>
</div>

<ul class="row products">
<?php
global $post;
$terms = wp_get_post_terms( $post->ID, 'product_cat' );
foreach ( $terms as $term ) $cats_array[] = $term->term_id;
$args=array(
'caller_get_posts'=>1,
'post__not_in' => array($post->ID),
'posts_per_page'=>4,
'orderby' => 'rand',
'post_type' => 'product',
'tax_query' => array(
array(
'taxonomy' => 'product_cat',
'field' => 'id',
'terms' => $cats_array
)));

$my_query = new WP_Query($args);
if( $my_query->have_posts() ) {
while ($my_query->have_posts()) : $my_query->the_post(); ?>

  <?php
$terms = get_the_terms( $post->ID , 'product_cat' );
$first_term = $terms[0];?>


<li class="product type-product col-6 col-sm-6 col-md-4 col-lg-3">
	<a href="<?php the_permalink();?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
    <img src="<?php the_post_thumbnail_url('full');?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail">
    
    <div class="colors">

<?php
$terms = get_the_terms( $post->ID , 'pa_color' ); ?>

<?php 
if($terms) { ?>

<?php 
   foreach( $terms as $term ) {
	   $color = get_field('color_code', 'pa_color'.'_'.$term->term_id);
	   echo '<span  style="background:url('.$color.')"></span>';
}
}
?>



</div>
    <h2 class="woocommerce-loop-product__title"><?php the_title();?></h2>
    <span class="category"><?php echo $first_term->name; ?></span>
	<?php woocommerce_get_template( 'loop/price.php' ); ?>
</a></li>


  
<?php
endwhile;
}
wp_reset_query();
?>
</ul>


</div>
</div>
</section>

<?php
                            global $post;
                            $current_page = $post->ID;
                            $args = array(
                                'post_type' => 'locations',
                                'posts_per_page' => 100,
                                'post_status' => 'publish',
                                'meta_key' => 'location_directory',
                                'meta_value' => 'No',
                            );
                            $query = new WP_Query($args); // $query is the WP_Query Object
                            $posts = $query->get_posts();   // $posts contains the post objects

                            $output = array();
                            foreach ($posts as $post) {
                                $id = get_the_ID();
                                $location = get_field('address');
                                $email = get_field('email_address');
                                $phone = get_field('phone_number');
                                $fax = get_field('fax_number');
                                $google = get_field('google_plus');
                                $locations = get_field('address');
                                $locations = explode(",", $locations['address']);
                                $place = $locations[0] . ''; //place name
                                $street = $locations[1] . ''; // street address
                                $city = $locations[2] . '' . $locations[3]; // city, state zip
                                $link = get_the_permalink();
                                $hours = get_field('store_hours');
                                $output[] = array('hours' => $hours, 'place' => $place, 'street' => $street, 'city' => $city, 'id' => $post->ID, 'name' => $post->post_title, 'lat' => $location['lat'], 'lng' => $location['lng'], 'address' => $location['address'], 'email' => $email, 'phone' => $phone, 'fax' => $fax, 'category' => 'page', 'link' => $link, 'web' => $google, 'id' => $id);
                            }
                            ?>

<script type="text/javascript">
( function( $ ) {
  	$('.btn-shop-store').on('click', function() {
      $("#shop_search_result").empty();
      $("#search_shop").removeAttr('value');
  	});

  	
	var outputs = <?php echo json_encode($output); ?>;
  
  
        var place = '';
        var input;
        
        var resultOutput = outputs;

        function haversine_distance(mk1, mk2) {
            var R = 3958.8; // Radius of the Earth in miles
            var rlat1 = mk1.lat * (Math.PI/180); // Convert degrees to radians
            var rlat2 = parseFloat(mk2.lat) * (Math.PI/180); // Convert degrees to radians
            var difflat = rlat2-rlat1; // Radian difference (latitudes)
            var difflon = (parseFloat(mk2.lng) - mk1.lng) * (Math.PI/180); // Radian difference (longitudes)

            var d = 2 * R * Math.asin(Math.sqrt(Math.sin(difflat/2)*Math.sin(difflat/2)+Math.cos(rlat1)*Math.cos(rlat2)*Math.sin(difflon/2)*Math.sin(difflon/2)));
            return d;
        }

        function initialize() {
            input = document.getElementById('search_shop');
          	$("#btn_search_shop_result").on('click', function() {
              	var firstValue = $(".pac-container .pac-item:first").text();
                console.log('test', firstValue);
              	$('#search_shop').val(firstValue);
              	var geocoder = new google.maps.Geocoder();

                if (firstValue) {
                    geocoder.geocode( { 'address': firstValue}, function(results, status) {
                      	console.log("results", results);

                        if (status == google.maps.GeocoderStatus.OK) {
                            var latitude = results[0].geometry.location.lat();
                            var longitude = results[0].geometry.location.lng();
                            console.log(latitude, longitude);
                        }
                        var northEast = '';
                        var southWest = '';
                      	if (results[0].geometry.bounds) {
                          	northEast = JSON.stringify( results[0].geometry.bounds.getNorthEast());
                      		southWest = JSON.stringify( results[0].geometry.bounds.getSouthWest());
                      	}
                      	

                        var returnArray = [];
                        for (var i = 0; i < resultOutput.length; i++) {
                            if (northEast !== "" && southWest !== "") {
                                var jsonNorthEast = JSON.parse(northEast);
                                var jsonSouthWest = JSON.parse(southWest);
                                if (parseFloat(resultOutput[i].lat) > jsonSouthWest.lat
                                    && parseFloat(resultOutput[i].lng) > jsonSouthWest.lng
                                    && parseFloat(resultOutput[i].lat) < jsonNorthEast.lat
                                    && parseFloat(resultOutput[i].lng) < jsonNorthEast.lng) {
                                    returnArray.push(resultOutput[i]);
                                }
                            } else {
                                if (firstValue === resultOutput[i].address) {
                                    returnArray.push(resultOutput[i]);
                                }
                            }

                        }
                        console.log('returnArray', returnArray);
                        if (returnArray.length === 0) {
                            var shortestPoint = resultOutput[0];
                            var currentPoint = {
                                lat: results[0].geometry.location.lat(),
                                lng: results[0].geometry.location.lng()
                            };
                            console.log('resultOutput', resultOutput);
                            for (var i = 0; i < resultOutput.length - 1; i++) {
                                resultOutput[i].distance = haversine_distance(currentPoint, resultOutput[i]);
                            }
                            resultOutput.sort((a,b) => (a.distance > b.distance) ? 1 : ((b.distance > a.distance) ? -1 : 0));

                            returnArray.push(resultOutput[0]);
                            returnArray.push(resultOutput[1]);
                            returnArray.push(resultOutput[2]);
                            console.log('returnArray1', returnArray);
                        }

                        $("#shop_search_result").empty();

                        for (var i = 0; i < returnArray.length; i++) {
                            $('#shop_search_result').append('<li><a href="http://' + returnArray[i].name.replace(/\s/g, '').split('.').join("").split('/')[0] + '.skykingfireworks.com/shop/"><span class="tab">' + returnArray[i].name + '</span></a></li>')
                        }

                    });
                }
            });
            var options = {
                types: ['geocode'],
                componentRestrictions: {
                    country: 'us'
                }
            };
            autocomplete = new google.maps.places.Autocomplete(input, options);
            google.maps.event.addListener(autocomplete, 'place_changed', function() {
                if (event !== undefined) {
                    if(event.keyCode == 13 || event.keyCode == 9) { // detect the enter key
                        var firstValue = $(".pac-container .pac-item:first").text(); // assign to this variable the first string from the autocomplete dropdown
                    }
                    $('#search_shop').val(firstValue); // add this string to input
                }
                console.log('place', place);
                console.log("firstValue", firstValue);

                place = autocomplete.getPlace();
                if (!firstValue) {
                    firstValue = place['formatted_address'];
                }
                var geocoder = new google.maps.Geocoder();

                if (firstValue) {
                    geocoder.geocode( { 'address': firstValue}, function(results, status) {
                      	console.log("results", results);

                        if (status == google.maps.GeocoderStatus.OK) {
                            var latitude = results[0].geometry.location.lat();
                            var longitude = results[0].geometry.location.lng();
                            console.log(latitude, longitude);
                        }
                        var northEast = '';
                        var southWest = '';
                      	if (results[0].geometry.bounds) {
                          	northEast = JSON.stringify( results[0].geometry.bounds.getNorthEast());
                      		southWest = JSON.stringify( results[0].geometry.bounds.getSouthWest());
                      	}
                      	

                        var returnArray = [];
                        for (var i = 0; i < resultOutput.length; i++) {
                            if (northEast !== "" && southWest !== "") {
                                var jsonNorthEast = JSON.parse(northEast);
                                var jsonSouthWest = JSON.parse(southWest);
                                if (parseFloat(resultOutput[i].lat) > jsonSouthWest.lat
                                    && parseFloat(resultOutput[i].lng) > jsonSouthWest.lng
                                    && parseFloat(resultOutput[i].lat) < jsonNorthEast.lat
                                    && parseFloat(resultOutput[i].lng) < jsonNorthEast.lng) {
                                    returnArray.push(resultOutput[i]);
                                }
                            } else {
                                if (firstValue === resultOutput[i].address) {
                                    returnArray.push(resultOutput[i]);
                                }
                            }

                        }
                        console.log('returnArray', returnArray);
                        if (returnArray.length === 0) {
                            var shortestPoint = resultOutput[0];
                            var currentPoint = {
                                lat: results[0].geometry.location.lat(),
                                lng: results[0].geometry.location.lng()
                            };
                            console.log('resultOutput', resultOutput);
                            for (var i = 0; i < resultOutput.length - 1; i++) {
                                resultOutput[i].distance = haversine_distance(currentPoint, resultOutput[i]);
                            }
                            resultOutput.sort((a,b) => (a.distance > b.distance) ? 1 : ((b.distance > a.distance) ? -1 : 0));

                            returnArray.push(resultOutput[0]);
                            returnArray.push(resultOutput[1]);
                            returnArray.push(resultOutput[2]);
                            console.log('returnArray1', returnArray);
                        }

                        $("#shop_search_result").empty();

                        for (var i = 0; i < returnArray.length; i++) {
                            $('#shop_search_result').append('<li><a href="http://shop.skykingfireworks.com/' + returnArray[i].name.replace(/\s/g, '').split('.').join("").split('/')[0] + '/"><span class="tab">' + returnArray[i].name + '</span></a></li>')
                        }

                    });
                }



            });

        }
        google.maps.event.addDomListener(window, "load", initialize);

} )( jQuery );

	
</script>
<?php get_footer();
