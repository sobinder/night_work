<style>div#bh-sl-map{height:300px !important;
}</style> <section class="section clearfix"> 
<div class="container" style="position:relative;">

<?php while ( have_posts() ) : the_post(); ?>
 
<div class="post-navigation d-none" style="float:right;"> 
<?php
$pagelist = get_pages("child_of=".$post->post_parent."&post_type=locations&sort_column=title&sort_order=asc");
$pages = array();
foreach ($pagelist as $page) {
$pages[] += $page->ID;
}
$current = array_search(get_the_ID(), $pages);
$prevID = $pages[$current-1];
$nextID = $pages[$current+1];
?>

<?php if (!empty($prevID)) { ?>
<a href="<?php echo get_permalink($prevID); ?>" title="<?php echo get_the_title($prevID); ?>"><i class="fa fa-angle-left"></i></a>
<?php }
if (!empty($nextID)) { ?>
<a href="<?php echo get_permalink($nextID); ?>" title="<?php echo get_the_title($nextID); ?>"><i class="fa fa-angle-right"></i></a>
 <?php } ?>

</div><!-- .navigation -->
<?php endwhile; ?>

<div class="row">


<div class="col-md-7 col-sm-12 post-content m-left">
<div class="clearfix">
<div class="post entry-content clearfix">
  
  <?php while ( have_posts() ) : the_post(); ?>
  
  
  <h1 class="location-title">Sky King Of <?php the_title();?></h1>
  
  <p><?php $locations = get_field('address');
$hours = get_field('store_hours_short');
$locations = explode( "," , $locations['address']);
$place = $locations[0].'<br>'; //place name
$street = $locations[1].''; // street address
$city = $locations[2].''.$locations[3]; // city, state zip
echo $place; echo $street;
echo $city;
?></p>



<div class="location-widget d-block d-md-none" style="text-align:left !important;">

                <div class="store_information">
                <p><?php if( get_field('phone_number')):?><i class="fa fa-phone"></i> <a href="tel:<?php the_field('phone_number');?>"><?php the_field('phone_number');?></a><br /><?php endif; ?></p>
                <p><?php if( get_field('fax_number')):?><i class="fa fa-fax"></i> <a href="tel:<?php the_field('fax_number');?>"><?php the_field('fax_number');?></a><br /><?php endif; ?></p>
                <p><?php if( get_field('email_address')):?><i class="fa fa-envelope"></i> <a href="mailto:<?php the_field('email_address');?>"><?php the_field('email_address');?></a><br /><?php endif; ?></p>
                
                <p class="direction"><i class="fa fa-share-square" aria-hidden="true"></i> <a href="https://maps.google.com/maps?saddr=&amp;daddr=<?php echo $locations[0].','; echo $locations[1].','; echo $locations[2].','; echo $locations[3].''; echo $locations[2].''; echo $locations[3].',';?>" target="_blank">Directions</a></p>
                
                
                
<p class="text-center"><a href="<?php the_field('store_link');?>" class="btn btn-store btn-hidden-<?php the_ID();?>" style="margin-top:15px;font-size:18px;font-family:Roboto;font-weight:700;color:#fff;background:#ee2225; text-decoration:none;border: none;border-radius: 5px;height:55px;line-height:55px; padding:0; margin-left:auto; margin-right:auto; margin-bottom:0px;">Go to Online Store</a></p>
                
                </div>





<p></p>

</div>

  
            <div class="clearfix">
             <div class="col-sm-12 np">
               <div class="location-gallery"><?php the_field('gallery');?></div>
               <div class="location-thumbnails"><?php the_field('gallery');?></div>
             </div>
             
          
            </div>
            
		<?php endwhile; ?>
<div class="clearfix"></div>

<div class="location-widget d-none d-md-block np" style="padding:0 !important;">
<div class="clearfix">
 <div class="bh-sl-container locator-form">
	<div id="bh-sl-map-container" class="bh-sl-map-container">
		<div id="bh-sl-map" class="bh-sl-map"></div>
	</div>
</div>
</div>
</div>


<div class="location-directions d-md-block d-none">
<div class="row">
<div class="col-md-6">
<h2>Directions</h2>
</div>

<div class="col-md-6 text-right">

</div>

</div>



<?php if( get_field('directions') ): ?>
<p></p><p class="clearfix"></p>
<?php the_field('directions');?>
<?php endif; ?>
</div>



</div>
</div>
</div>


<div class="col-md-5">


<div class="location-widget d-none d-md-block" style="text-align:left !important;">

                <div class="store_information">
                <p><?php if( get_field('phone_number')):?><i class="fa fa-phone"></i> <a href="tel:<?php the_field('phone_number');?>"><?php the_field('phone_number');?></a><br /><?php endif; ?></p>
                <p><?php if( get_field('fax_number')):?><i class="fa fa-fax"></i> <a href="tel:<?php the_field('fax_number');?>"><?php the_field('fax_number');?></a><br /><?php endif; ?></p>
                <p><?php if( get_field('email_address')):?><i class="fa fa-envelope"></i> <a href="mailto:<?php the_field('email_address');?>"><?php the_field('email_address');?></a><br /><?php endif; ?></p>
                
                <p class="direction"><i class="fa fa-share-square" aria-hidden="true"></i> <a href="https://maps.google.com/maps?saddr=&amp;daddr=<?php echo $locations[0].','; echo $locations[1].','; echo $locations[2].','; echo $locations[3].''; echo $locations[2].''; echo $locations[3].',';?>" target="_blank">Directions</a></p>
                
                
                
<p class="text-center"><a href="<?php the_field('store_link');?>" class="btn btn-store btn-hidden-<?php the_ID();?>" style="margin-top:15px;font-size:18px;font-family:Roboto;font-weight:700;color:#fff;background:#ee2225; text-decoration:none;border: none;border-radius: 5px;height:55px;line-height:55px; padding:0; margin-left:auto; margin-right:auto; margin-bottom:0px;">Go to Online Store</a></p>
                
                </div>





<p></p>

</div>


<div class="store-widget">
<h2>CURRENT STORE <strong>PROMOTION</strong></h2>
<?php the_field('store_promotion');?>
</div>



<div class="location-widget d-none">
<h2>Hours Of <strong>Operation</strong></h2>
<div class="store_hours">
<?php if( get_field('store_hours') ): ?>
<p><?php echo $hours;?></p>
<div class="d-none">
<br />
<h4>Holiday Hours</h4>
<?php the_field('store_hours');?>
<?php endif; ?>
</div>
</div>
</div>


	<div class="location-widget">
<h2>Store <strong>Hours</strong></h2>
<div class="">
<?php the_field('store_hours');?>
</div>
</div>

	

<div class="location-widget">
<?php if( get_field('managers_information') ): ?>
<h2>Store <strong>Management</strong></h2>
<?php the_field('managers_information');?>
<?php endif; ?>              
</div>






<div class="location-widget">
 <?php if( get_field('nearby_cities') ): ?>
 <h2>Nearby <strong>Cities</strong></h2>
 <?php the_field('nearby_cities');?>
 <?php endif; ?>

</div>

<div class="location-widget">

  <?php if( get_field('nearby_attractions') ): ?>
  <h2>Nearby <strong>Attractions</strong></h2>
  <?php the_field('nearby_attractions');?>
  <?php endif; ?>
</div>


<div class="location-widget facebook-widget">

  <?php if( get_field('google_plus') ): ?>
<a href="<?php the_field('google_plus');?>" target="_blank"><i class="fa fa-facebook"></i> For local deals, information or just chat <strong>VISIT THIS LOCATIONS FACEBOOK PAGE</strong></a>  
  <?php endif; ?>
</div>





</div>



</div>
</div>







<div class="container d-none">

<div class="row">
<div class="col-md-12 col-sm-12 post-content m-left">
<div class="clearfix">
<div class="post entry-content clearfix">
  <?php while ( have_posts() ) : the_post(); ?>
            <div class="col-sm-9 nlp nmp directions" style="padding-right:40px;"></div>
            <div class="col-sm-3">
              <button type="submit" name="add-to-cart" value="899" class="single_add_to_cart_button button alt" style="margin-top:50px;" data-toggle="modal" data-target="#direction-modal">Get Directions</button>
            <div class="social-share m-center">
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
      <a href="mailto:?subject=<?php the_permalink();?>&amp;body=<?php the_content();?>" title="E-Mail" class="wpfai-envelope wpfai-link" target="_blank">
          <i class="fa fa-envelope"></i>
      </a>
    </li></ul>
</div></div>
            
		<?php endwhile; ?>
<div class="clearfix"></div>
</div>




<?php
global $post;
$current_page = $post->ID;
$args = array( 
    'post_type' => 'locations',
	//'child_of' => $current_page,
	'p' => $current_page,
	'posts_per_page' => 100,
    'post_status' => 'publish',
);
$query = new WP_Query( $args ); // $query is the WP_Query Object
$posts = $query->get_posts();   // $posts contains the post objects

$output = array();
foreach( $posts as $post ) {  
$location = get_field('address');
$email = get_field('email_address');
$phone = get_field('phone_number');
$fax = get_field('fax_number');
$google = get_field('google_plus');
$locations = get_field('address');
$locations = explode( "," , $locations['address']);
$place = $locations[0].''; //place name
$street = $locations[1].''; // street address
$city = $locations[2].''.$locations[3]; // city, state zip
$link = get_the_permalink();
$output[] = array( 'place' => $place, 'street' => $street, 'city' => $city, 'id' =>$post->ID, 'name' =>$post->post_title, 'lat' =>$location['lat'], 'lng' =>$location['lng'],'address' =>$location['address'], 'email' =>$email, 'phone' =>$phone, 'fax' =>$fax, 'category' =>'page','link'=>$link,'web'=>$google);
}
?>
<?php wp_reset_query();?>

<script id="listTemplate" type="text/x-handlebars-template">
{{#location}}
<li data-markerid="{{markerid}}" class="clearfix">
<div class="loc-directions"><a class="btn" href="https://maps.google.com/maps?saddr={{origin}}&amp;daddr={{address}} {{address2}} {{city}}, {{state}} {{postal}}" target="_blank">Go</a></div>
  </div>
</li>
{{/location}}
</script>
<script id="infowindowTemplate" type="text/x-handlebars-template">
{{#location}}
	<div class="list-details">
		<div class="list-content">
		
		<p style="margin-bottom:0;"><strong><a href="{{link}}" style="font-size:21px;" class="title">Sky King of {{name}}</a></strong><br>
<div class="loc-addr">{{place}}<br>{{street}} {{city}}</div> 
{{#if phone}}<div class="loc-phone">Phone: <a href="tel:{{phone}}">{{phone}}</a></div>{{/if}}
{{#if fax}}<div class="loc-fax">Fax: <a href="tel:{{fax}}">{{fax}}</a></div>{{/if}}
{{#if email}}<div class="loc-email">Email: <a href="mailto:{{email}}">{{email}}</a></div>{{/if}}
{{#if web}}Find us on <a href="{{web}}" target="_blank">Google Plus</a></td>{{/if}}
<div class="loc-directions">Directions: <a href="https://maps.google.com/maps?saddr={{origin}}&amp;daddr={{address}} {{address2}} {{city}}, {{state}} {{postal}}" target="_blank">Directions</a></div>
			
			<div class="loc-link">Details: <a href="{{link}}">View this location</a></div>
		</div>
{{/location}}
</script>




</div>

</div>




</div>
</div>
</section>


<?php $locationss = get_field('address');
$locationss = explode( "," , $locationss['address']);
$place = $locationss[0].''; //place name
$street = $locationss[1].''; // street address
$city = $locationss[2].''.$locationss[3]; // city, state zip
?>
        
<script>
jQuery(function($) {
    $(document).ready(function() {
  
  jQuery(document).on( 'click', '#submit', function() {
	var value = $("#origin").val();
	window.open("https://maps.google.com/maps?saddr="+value+"&amp;daddr=<?php while (have_posts()) : the_post(); ?><?php echo $locationss[0].','; echo $locationss[1].','; echo $locationss[2].','; echo $locationss[3].''; echo $locationss[2].''; echo $locationss[3].', ';?><?php endwhile; ?>", "_blank");
});
  
 function explode(){
     if($('#bh-sl-address').val() == ''){
       $('.loc-dist').hide();
       $('.loc-directions').hide();
} else {
 $('.location-distance').show();
       $('.loc-directions').show();
  }
}
  
		$(function() {
		$('#bh-sl-map-container').storeLocator({
  callbackSuccess: function(){
		setTimeout(explode,100);	
	},
   callbackListClick:function(){
		setTimeout(explode,1);	
	},
  callbackMarkerClick: function(){
		setTimeout(explode,1);	
	},
			'mapSettings' : {
zoom:0,
mapTypeId: google.maps.MapTypeId.ROADMAP,
zoomControl:true,
disableDoubleClickZoom:false,
scaleControl:true,
scrollwheel:false,
navigationControl: false,
draggable:true
},
distanceAlert:50000,
'inlineDirections':false,
					'dataType': 'json',
					'dataRaw': <?php echo json_encode($output); ?>,
					'querystringParams' : true,
					'listTemplateID': 'listTemplate',
					'infowindowTemplateID': 'infowindowTemplate',
					'slideMap':false,
					'modal':false,
					'maxDistance':false,
					'defaultLoc':true,
					<?php while ( have_posts() ) : the_post(); ?>
					<?php $location = get_field('address'); ?>
					'defaultLat': '<?php echo $location['lat']?>',
					'defaultLng' : '<?php echo $location['lng']?>',
					<?php endwhile; ?>
					'autoGeocode':false,
			catMarkers : {
				'page' : ['<?php echo the_field('map_crown','option');?>', 69, 86],
			}
		});
	});
	});
}(jQuery));
</script>


    <!-- subscribe-modal -->
      <div class="modal fade" id="direction-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <!-- modal-body -->
               <div class="modal-body text-center">
               
                 <h2 class="hidden">You're all set! Thank you for signing up.</h2>
                 
                 <form id="bh-sl-user-location" method="post" action="#">
			<div class="form-input address-input form-field">
				<input type="text" id="bh-sl-address" name="bh-sl-address" placeholder="Enter a city and state or postal code" />
			</div>
 <select id="bh-sl-maxdistance" name="bh-sl-maxdistance" style="display:none;">
                <option value="50000">50000 Miles</option>
              </select>
			<div class="submit">
            <button id="bh-sl-submit" type="submit">Submit</button>
            </div>
            
		</form>
                 

  <div class="bh-sl-container locator-form">
	<div id="bh-sl-map-container" class="bh-sl-map-container">
    <div class="bh-sl-loc-list">
			           <ul class="list"></ul>
		           </div> 
	</div>
</div>

                 <form class="hidden">
                   <input id="origin" type="text" />
                 </form>

                 <a class="hidden" href="https://maps.google.com/maps?saddr={{origin}}&amp;daddr=<?php echo $locationss[0].','; echo $locationss[1].','; echo $locationss[2].','; echo $locationss[3].''; echo $locationss[2].''; echo $locationss[3].',';?>" target="_blank">Directions</a>
                 
                <button type="button" id="submit" class="btn btn-black hidden">Click to go</button>
               
              </div>
               <!-- modal-body -->
            </div>
            <!-- modal-content -->
         </div>
         <!-- modal-dialog -->
      </div>