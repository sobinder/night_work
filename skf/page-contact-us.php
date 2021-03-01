<?php
/**
 * Template Name: Contact Us
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
<section class="contact-us">
<div class="container">
				<div class="row">

					<div class="col-md-12">
					
						<?php the_content();?>
                        
					</div>

				</div>
			</div>
		</section>

                
<?php endwhile; // End of the loop. ?>


<div class="hidden d-none">
<section class="section blog clearfix">
<div class="container">
<div class="row">


<div class="col-md-12 col-sm-12 post-content m-left">

<div class="clearfix">

<?php
$args = array( 
    'post_type' => 'locations',
	'posts_per_page' => 100,
    'post_status' => 'publish',
	'meta_key'		=> 'location_directory',
	'meta_value'	=> 'No'
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

<script id="listTemplate" type="text/x-handlebars-template">
{{#location}}
<li data-markerid="{{markerid}}" class="clearfix">
	<div class="list-label" style="display:none;">{{marker}}</div>
	<div class="list-details single-result clearfix">
	<div class="col-sm-4 nmp text-left">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tbody><tr>
<td valign="top" align="left" width="45"><img src="<?php echo get_template_directory_uri();?>/store/assets/img/crown.png"></td>
<td valign="top" align="left">
<h2>Sky King Of</h2>
<p style="margin-bottom:0;"><strong><a href="{{link}}" style="font-size:21px;" class="title">{{name}}</a></strong><br>
<div class="loc-addr">{{place}}<br>{{street}} {{city}}</div> 
{{#if phone}}<div class="loc-phone">Phone: <a href="tel:{{phone}}">{{phone}}</a></div>{{/if}}
{{#if fax}}<div class="loc-fax">Fax: <a href="tel:{{fax}}">{{fax}}</a></div>{{/if}}
{{#if email}}<div class="loc-email">Email: <a href="mailto:{{email}}">{{email}}</a></div>{{/if}}
{{#if web}}Find us on <a href="{{web}}" target="_blank">Google Plus</a></td>{{/if}}
</tr>
</tbody></table>
</div>
	<div class="col-sm-4 nmp text-left">
	<h2>Distance</h2>
	
	{{#if distance}}
				<div class="loc-dist">
				{{distance}} {{length}}
				<p style="margin-bottom:0;color:#ffb400;">Show on Map</p> 
				</div>
				<div class="loc-directions"><a href="https://maps.google.com/maps?saddr={{origin}}&amp;daddr={{address}} {{address2}} {{city}}, {{state}} {{postal}}" target="_blank">Directions</a></div>
			{{/if}}
			</div>
	<div class="col-sm-4 nmp text-left">
	<h2>Details</h2>
	<div class="loc-link"><a href="{{link}}">View this location</a></div>
	</div>
	
		<div class="list-content hidden">
			<div class="loc-name">{{name}}</div>
			<div class="loc-addr">{{address}}</div> 
			<div class="loc-addr2">{{address2}}</div> 
			<div class="loc-addr3">{{city}}{{#if city}},{{/if}} {{state}} {{postal}}</div>
			<div class="loc-phone">Phone: <a href="tel:{{phone}}">{{phone}}</a></div>
			<div class="loc-fax">Fax: <a href="mailto:{{fax}}">{{fax}}</a></div>
			<div class="loc-email">Email: <a href="mailto:{{email}}">{{email}}</a></div>
			<div class="loc-link"><a href="{{link}}">More Details</a></div>
			<div class="loc-webs"><a href="{{web}}" target="_blank">{{web}}</a></div>
			{{#if distance}}
				<div class="loc-dist">{{distance}} {{length}}</div>
				<div class="loc-directions"><a href="https://maps.google.com/maps?saddr={{origin}}&amp;daddr={{address}} {{address2}} {{city}}, {{state}} {{postal}}" target="_blank">Directions</a></div>
			{{/if}}
		</div>
	</div>
</li>
<option value="{{name}}">{{name}} {{distance}} {{length}}</option>
{{/location}}
</script>
<script id="infowindowTemplate" type="text/x-handlebars-template">
{{#location}}
	<div class="list-details">
		<div class="list-content">
		
		<p style="margin-bottom:0;"><strong><a href="{{link}}" style="font-size:21px;" class="title">Skyking of {{name}}</a></strong><br>
<div class="loc-addr">{{place}}<br>{{street}} {{city}}</div> 
{{#if phone}}<div class="loc-phone">Phone: <a href="tel:{{phone}}">{{phone}}</a></div>{{/if}}
{{#if fax}}<div class="loc-fax">Fax: <a href="tel:{{fax}}">{{fax}}</a></div>{{/if}}
{{#if email}}<div class="loc-email">Email: <a href="mailto:{{email}}">{{email}}</a></div>{{/if}}
{{#if web}}Find us on <a href="{{web}}" target="_blank">Google Plus</a></td>{{/if}}
			{{#if distance}}
				<div class="loc-dist">Distance: {{distance}} {{length}}</div>
				<div class="loc-directions">Directions: <a href="https://maps.google.com/maps?saddr={{origin}}&amp;daddr={{address}} {{address2}} {{city}}, {{state}} {{postal}}" target="_blank">Directions</a></div>
			{{/if}}
			<div class="loc-link">Details: <a href="{{link}}">View this location</a></div>
		</div>
{{/location}}
</script>

<?php if (is_front_page()) { ?>
    


<?php } else { ?>

<div class="bh-sl-container locator-form">
	<div id="page-header">
		<h1 class="bh-sl-title hidden">20 LOCATIONS ACROSS FLORIDA, GEORGIA, PENNSYLVANIA & INDIANA</h1>
        		<h2 class="bh-sl-title">Find a store</h2>
	</div>

	<div class="bh-sl-form-container simple-locator-form">
		<form id="bh-sl-user-location" method="post" action="#">
			<div class="form-input address-input form-field">
				<input type="text" id="bh-sl-address" name="bh-sl-address" placeholder="Enter a city and state or postal code" />
			</div>
 <select id="bh-sl-maxdistance" name="bh-sl-maxdistance" style="display:none;">
                <option value="50000">50000 Miles</option>
              </select>
			<div class="submit">
            <button id="bh-sl-submit" type="submit">Find a store</button>
            </div>
            
		</form>
	</div>

	<div id="bh-sl-map-container" class="bh-sl-map-container">
		<div id="bh-sl-map" class="bh-sl-map"></div>
		<div class="bh-sl-loc-list">
			<ul class="list"></ul>
		</div>
	</div>
</div>

</div>

</div>




</div>
</div>
</section>



        
<script>
jQuery(function($) {
    $(document).ready(function() {
		$(function() {
		$('#bh-sl-map-container').storeLocator({
			'mapSettings' : {
zoom :12,
mapTypeId: google.maps.MapTypeId.ROADMAP,
zoomControl:true,
disableDoubleClickZoom:false,
scaleControl:true,
scrollwheel:true,
navigationControl: false,
draggable:true
},
distanceAlert:500,
callbackListClick: function(){
 $('html, body').animate({scrollTop:$("#bh-sl-map-container").offset().top - 80}, 800);
},
'inlineDirections':false,
					'dataType': 'json',
					'dataRaw': <?php echo json_encode($output); ?>,
					'querystringParams' : true,
			//'infowindowTemplatePath': 'http://localhost/review/wp-content/themes/twentyseventeen/store/assets/js/plugins/storeLocator/templates/infowindow-description.html',
			//'listTemplatePath': 'http://localhost/review/wp-content/themes/twentyseventeen/store/assets/js/plugins/storeLocator/templates/location-list-description.html',					
         // 'dataLocation': 'data/locations.json'
					listTemplateID: 'listTemplate',
					infowindowTemplateID: 'infowindowTemplate',
					'slideMap' : false,
					'modal' :false,
					'maxDistance':false,
					'defaultLoc':false,
					'defaultLat': '44.9207462',
					'defaultLng' : '-93.3935366',
					autoGeocode:false,
			catMarkers : {
				'page': ['<?php echo the_field('map_crown', 'option');?>', 69, 86],
			}
		});
	});
	});
}(jQuery));
</script>

<?php } ?>


</div>


<?php get_footer();