<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ecns
 */

get_header(); ?>

<div class="shop-banner" style=" background:url(<?php if( has_post_thumbnail() ) { ?><?php the_post_thumbnail_url();?><?php } else { ?><?php echo get_template_directory_uri();?>/images/location-header.png<?php } ?>) no-repeat right center;">
<div class="container">
<div class="row">
<div class="col-sm-12">
<h1><small>Sky King Of</small><br /><?php the_title();?></h1>
</div>
</div>
</div>
</div>

<div class="section single-location clearfix">
<div class="container">
<div class="row">
<div class="col-md-12 col-sm-12 post-content">

<h1 class="entry-title hidden">Sky King of <span class="text-capitalize"><?php the_title();?></span></h1>

  <div class="post entry-content clearfix">
  
  <?php while ( have_posts() ) : the_post(); ?>
				<div class="clearfix"></div>
				<div class="clearfix">
				<?php the_content();?>
                </div>
                <div class="clearfix"></div>
            
            <div class="clearfix"></div>
            <div class="clearfix">
            <div class="col-sm-6 nlp">
            	<?php if( get_field('store_hours') ): ?><h2>Store Hours</h2><?php the_field('store_hours');?><?php endif; ?>
            	<?php if( get_field('holiday_hours') ): ?><h2>Holiday Hours</h2><?php the_field('holiday_hours');?><?php endif; ?>
            </div>
            <div class="col-sm-6 nmp">
            <?php if( get_field('nearby_cities') ): ?><h2>Nearby Cities</h2><?php the_field('nearby_cities');?><?php endif; ?>
            <?php if( get_field('nearby_attractions') ): ?><h2>Nearby Attractions</h2><?php the_field('nearby_attractions');?><?php endif; ?>
            </div>
            </div>
            <div class="col-sm-12 nlp"><?php if( get_field('additional_information') ): ?><h2>Additional Information</h2><p></p><p class="clearfix"></p><?php the_field('additional_information');?><?php endif; ?></div>
            
		<?php endwhile; ?>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>
</div>
</div>



<?php
$args = array( 
    'post_type' => 'locations', 
    'post_status' => 'publish', 
);
$query = new WP_Query( $args ); // $query is the WP_Query Object
$posts = $query->get_posts();   // $posts contains the post objects

$output = array();
foreach( $posts as $post ) {  
$location = get_field('address');
// Pluck the id and title attributes
$output[] = array( 'id' => $post->ID, 'name' => $post->post_title, 'lat' => $location['lat'], 'lng' => $location['lng'],'address' => $location['address'],'category' => 'page', );
}
?>

<script id="listTemplate" type="text/x-handlebars-template">
{{#location}}
<li data-markerid="{{markerid}}">
	<div class="list-label" style="display:none;">{{marker}}</div>
	<div class="list-details">
		<div class="list-content">
			<div class="loc-name">{{name}}</div>
			<div class="loc-addr">{{address}}</div> 
			<div class="loc-addr2">{{address2}}</div> 
			<div class="loc-addr3">{{city}}{{#if city}},{{/if}} {{state}} {{postal}}</div>
			<div class="loc-phone">{{phone}}</div>
            <div class="loc-email">{{email}}</div>
			<div class="loc-webs"><a href="{{web}}" target="_blank">{{niceURL web}}</a></div>
			{{#if distance}}
				<div class="loc-dist">{{distance}} {{length}}</div>
				<div class="loc-directions"><a href="https://maps.google.com/maps?saddr={{origin}}&amp;daddr={{address}} {{address2}} {{city}}, {{state}} {{postal}}" target="_blank">Directions</a></div>
			{{/if}}
		</div>
	</div>
</li>
<option value="{{name}}">{{name}} {{distance}}</option>
{{/location}}
</script>
<script id="infowindowTemplate" type="text/x-handlebars-template">
{{#location}}
	<div class="list-details">
		<div class="list-content">
			<div class="loc-name">{{name}}</div>
			<div class="loc-addr">{{address}}</div> 
			<div class="loc-addr2">{{address2}}</div> 
			<div class="loc-addr3">{{city}}{{#if city}},{{/if}} {{state}} {{postal}}</div>
			<div class="loc-phone">{{phone}}</div>
            <div class="loc-email">{{email}}</div>
			<div class="loc-webs"><a href="{{web}}" target="_blank">{{niceURL web}}</a></div>
			{{#if distance}}
				<div class="loc-dist">{{distance}} {{length}}</div>
				<div class="loc-directions"><a href="https://maps.google.com/maps?saddr={{origin}}&amp;daddr={{address}} {{address2}} {{city}}, {{state}} {{postal}}" target="_blank">Directions</a></div>
			{{/if}}
		</div>
{{/location}}
</script>

<?php if (is_front_page()) { ?>
    


<?php } else { ?>

<div class="bh-sl-container">
	<div id="page-header">
		<h1 class="bh-sl-title">20 LOCATIONS ACROSS FLORIDA, GEORGIA, PENNSYLVANIA, & INDIANA</h1>
	</div>

	<div class="bh-sl-form-container">
		<form id="bh-sl-user-location" method="post" action="#">
			<div class="form-input">
				<input type="text" id="bh-sl-address" name="bh-sl-address" />
			</div>
 <select id="bh-sl-maxdistance" name="bh-sl-maxdistance" style="display:none;">
                <option value="50000">50000 Miles</option>
              </select>
			<button id="bh-sl-submit" type="submit">Submit</button>
		</form>
	</div>

	<div id="bh-sl-map-container" class="bh-sl-map-container">
		<div id="bh-sl-map" class="bh-sl-map"></div>
		<div class="bh-sl-loc-list">
			<ul class="list"></ul>
		</div>
	</div>
</div>
        
<script>
jQuery(function($) {
    $(document).ready(function() {
		$(function() {
		$('#bh-sl-map-container').storeLocator({
			'mapSettings' : {
zoom : 24,
mapTypeId: google.maps.MapTypeId.ROADMAP,
zoomControl:true,
disableDoubleClickZoom:false,
scaleControl:true,
scrollwheel:true,
navigationControl: false,
draggable:true
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
					autoGeocode: true,
			catMarkers : {
				'page' : ['<?php echo get_template_directory_uri();?>/store/assets/img/crown.png', 32, 23],
			}
		});
	});
	});
}(jQuery));
</script>

<?php } ?>


<?php get_footer();?>