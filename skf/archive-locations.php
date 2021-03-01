<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ecns
 */
error_reporting(0);
get_header(); ?>


<?php $the_query = new WP_Query( 'page_id=30' ); ?>



<?php while ($the_query -> have_posts()) : $the_query -> the_post();  ?>


    <section class="page-banner location-banner bg-image" style="background:url(<?php if( get_field('header_image') ) { ?><?php echo the_field('header_image');?>);"><?php } else { ?><?php echo get_template_directory_uri();?>/images/banner.jpg) no-repeat center center;"><?php } ?>
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="title">
                        <?php if( get_field('header_text') ) { ?><?php echo the_field('header_text');?><?php } else { ?><h1><?php echo empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent );?></h1><?php } ?>

                        <div class="bh-sl-form-container simple-locator-form">
                            <form id="bh-sl-user-location" method="post" action="#">
                                <div class="form-input address-input form-field" data-toggle="tooltip" data-placement="top" title="Please type the starting address to enable directions">
                                    <input type="text" id="bh-sl-address" name="bh-sl-address" placeholder="Enter a city and state or postal code" />
                                </div>

                            </form>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </section>

<?php endwhile;?>


<section class="location-map bg-image clearfix">

    <ul class="tabs map-mobile-area">
        <li class="tab-view-link current" data-tab="map-view">Map View</li>
        <li class="tab-view-link" data-tab="list-view">List View</li>
    </ul>

    <div id="map-view" class="tab-view-content display-inherit current">
        <div id="bh-sl-map" class="bh-sl-map"></div>
    </div>

    <div id="list-view" class="tab-view-content display-inherit">
        <div class="location-map-list-wrapper">
            <div class="location-map-list">
                <div class="location-map-list-header">
                    <p><span class="bh-sl-total-results"></span> <span class="result">Results</span></p>
                </div>
                <div id="bh-sl-map-container" class="bh-sl-map-container">

                    <div class="bh-sl-loc-list">
                        <ul class="list"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



</section>


<section class="location-finder location-listings clearfix">
    <div class="container" style="max-width:1500px;">
        <div class="row">
            <div class="col-md-12 text-center"><h2 class="text-center" style="text-align:center !important;">LOCATION LISTINGS</h2></div>


            <div class="col-md-12">

                <ul class="location-list tabs">

                    <?php
                    global $post;
                    $args = array( 'posts_per_page' => 100, 'post_type'=> 'locations', 'post_status' => 'publish', 'meta_key' => 'location_directory', 'meta_value'	=> 'Yes',);
                    $myposts = get_posts( $args );
                    foreach( $myposts as $post ) : setup_postdata($post); ?>
                        <li class="tab-link" data-tab="tab-<?php the_ID();?>"><strong><?php the_title();?></strong></li>
                    <?php endforeach; ?>

                    <?php wp_reset_query(); ?>

                </ul>



                <?php
                global $post;
                $args = array( 'posts_per_page' => 100, 'post_type'=> 'locations', 'post_status' => 'publish', 'meta_key' => 'location_directory', 'meta_value'	=> 'Yes',);
                $myposts = get_posts( $args );
                foreach( $myposts as $post ) : setup_postdata($post); ?>

                    <?php $current_page = get_the_ID();?>





                    <div class="location-listing-result tab-content" id="tab-<?php the_ID();?>">
                        <div class="location-listing-result-header">
                            <h2><?php the_title();?></h2>
                            <p>( <?php
                                $child = new WP_Query( array(
                                    'posts_per_page' => 1,
                                    'post_type'=> 'locations',
                                    'post_status' => 'publish',
                                    'child_of' => $current_page,
                                    'post_parent' => $current_page,
                                    'meta_key' => 'location_directory',
                                    'meta_value' => 'No'
                                ));

                                if ($child->have_posts()) : while ($child->have_posts()) : $child->the_post(); ?>
                                    <?php $count = $child->found_posts; echo $count;?>

                                    <?php if ($count > 1) : ?>
                                        LOCATIONS
                                    <?php else : ?>
                                        LOCATION
                                    <?php endif; ?>
                                <?php endwhile; endif; wp_reset_query(); ?> )</p>
                        </div>

                        <div class="location-listing-individual-result">
                            <ul>

                                <?php
                                $child = new WP_Query( array(
                                    'posts_per_page' => 100,
                                    'post_type'=> 'locations',
                                    'post_status' => 'publish',
                                    'child_of' => $current_page,
                                    'post_parent' => $current_page,
                                    'meta_key' => 'location_directory',
                                    'meta_value' => 'No'
                                ) );

                                if ($child->have_posts()) : while ($child->have_posts()) : $child->the_post(); ?>
                                    <?php $location = get_field('address');
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
									$store_link = get_field('store_link');
                                    $hours = get_field('store_hours_short');
                                    ?>

                                    <li>
                                        <h2><a href="<?php the_permalink();?>">Sky King Of <?php the_title();?></a> <i class="fa fa-external-link-square" aria-hidden="true"></i></h2>
                                        <p><?php echo $place; ?><br />
                                            <?php echo $street; echo $city; ?></p>

                                        <div class="loc-directions" id="individual-direction-<?php the_ID();?>"></div>
                                        <p class="phone"><strong class="strong"><i class="fa fa-phone-square"></i> </strong> <a href="tel:<?php echo $phone;?>"><?php echo $phone;?></a></p>
                                        <p class="phone d-none"><strong class="strong"><i class="fa fa-phone-square"></i> </strong> <a href="tel:<?php echo $fax;?>"><?php echo $fax;?></a></p>
                                        <p class="mail d-none"><strong class="strong"><i class="fa fa-envelope"></i> </strong> <a href="mailto:<?php echo $email;?>"><?php echo $email;?></a></p>
                                        <?php if( get_field('store_hours_short') ) { ?>
                                            <p class="hours"><strong class="strong"><i class="fa fa-clock-o"></i> </strong> <?php echo $hours;?></p>
                                        <?php } ?>


                             
                                        <p>
                                            <a href="<?php echo $store_link;?>" data-title="<?php the_title();?>" class="btn btn-store btn-loc-list-shop btn-shop-store btn-hidden-<?php the_ID();?>" style="font-size:14px;font-family:Roboto; font-weight:700;color:#fff;background:#0163ce;border: none;border-radius: 5px;height:35px;line-height:35px; padding:0 10; margin-bottom:20px;">Go to Online Store</a>
                                        </p>
                                    </li>


                                <?php endwhile;

                                endif;

                                wp_reset_query();

                                ?>







                            </ul>
                        </div>

                    </div>


                <?php endforeach; ?>

                <?php wp_reset_query(); ?>



            </div>

        </div>
    </div>
</section>






<section class="section blog clearfix">
    <div class="container">
        <div class="row">


            <div class="col-md-12 col-sm-12 post-content m-left">

                <div class="clearfix">

                    <?php
                    global $post;
                    $current_page = $post->ID;
                    $args = array(
                        'post_type' => 'locations',
                        'posts_per_page' => 100,
                        'post_status' => 'publish',
                        'meta_key'		=> 'location_directory',
                        'meta_value'	=> 'No',
                    );
                    $query = new WP_Query( $args ); // $query is the WP_Query Object
                    $posts = $query->get_posts();   // $posts contains the post objects

                    $output = array();
                    foreach( $posts as $post ) {
                        $id = get_the_ID();
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
						$store = get_field('store_link');
                        $hours = get_field('store_hours');
                        $output[] = array(  'hours' => $hours, 'place' => $place, 'street' => $street, 'city' => $city, 'id' =>$post->ID, 'name' =>$post->post_title, 'lat' =>$location['lat'], 'lng' =>$location['lng'],'address' =>$location['address'], 'email' =>$email, 'phone' =>$phone, 'fax' =>$fax, 'category' =>'page','link'=>$link,'web'=>$google, 'id'=>$id, 'store'=>$store);
                    }
                    ?>

                    <?php  //echo do_shortcode('[Modal-Window id="1"]');?>

                    <script id="listTemplate" type="text/x-handlebars-template">
                        {{#location}}

                        <li data-markerid="{{markerid}}" class="clearfix">
                            <h2><a href="{{link}}" style="font-size:21px;" class="title">Sky King Of {{name}} <i
                                            class="fa fa-external-link-square" aria-hidden="true"></i></a></h2>
                            <p>{{place}} <br> {{street}} {{city}}{{#if city}},{{/if}} {{state}} {{postal}}</p>
                            <p style="margin:0;" class="phone"><i class="fa fa-phone-square" aria-hidden="true"></i>
                                <a class="" href="tel:{{phone}}">{{phone}}</a></p>
                            <div class="loc-directions" id="list-direction-{{id}}" style="display: inline;">
                                <p class="direction"
                                   style="display: inline;"><i
                                            class="fa fa-share-square" aria-hidden="true"></i> <a
                                            href="https://maps.google.com/maps?saddr=&amp;daddr={{address}} {{address2}} {{city}}, {{state}} {{postal}}"
                                            target="_blank" class="direction">Get Directions</a> <strong
                                            class="d-none" style="font-size:13px;">({{distance}}
                                        {{length}})</strong>
                                </p>

                            </div>
                            {{#if distance}}
                            <div class="loc-dist hidden" style="display:none;margin:0;"><p
                                        style="color:#000 !important;margin:0;"></p></div>

                            {{/if}}
                            <p class="wow-modal-button-container">
                                <a href="{{store}}" class="btn btn-store btn-loc-modal btn-hidden-{{id}} btn-shop-store" style="font-size:14px;font-family:Roboto; font-weight:700;color:#fff;background:#0163ce;border: none;border-radius: 5px;height:35px;line-height:35px; padding:0 10; margin-bottom:20px;">Go to Online Store</a>
                            </p>

                        </li>




                        <option value="{{email}}" style="display:none;">{{name}} {{distance}}</option>
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
                                {{#if distance}}
                                <div class="loc-dist d-none">Distance: {{distance}} {{length}}</div>

                                {{/if}}
                                <div class="loc-link d-none">Details: <a href="{{link}}">View this location</a></div>
                            </div>
                            {{/location}}
                    </script>




                </div>

            </div>




        </div>
    </div>
</section>






<?php get_footer();?>




<script>
    jQuery(function($) {
        $(document).ready(function() {

            $('ul.tabs li.tab-view-link').click(function(){
                var tab_id = $(this).attr('data-tab');

                $('ul.tabs li.tab-view-link').removeClass('current');
                $('.tab-view-content').removeClass('current');

                $(this).addClass('current');
                $("#"+tab_id).addClass('current');
            })


            function explode(){




                if($('#bh-sl-address').val() == ''){
                    $('.location-distance').hide();
                    $('.loc-dist').hide();
                    $('.loc-directions').show();

                    <?php
                    $child = new WP_Query( array(
                        'posts_per_page' => 100,
                        'post_type'=> 'locations',
                        'post_status' => 'publish',
                        'meta_key' => 'location_directory',
                        'meta_value' => 'No'
                    ) );

                    if ($child->have_posts()) : while ($child->have_posts()) : $child->the_post(); ?>



                    $('#individual-direction-<?php the_ID();?>').empty()
                    $('#list-direction-<?php the_ID();?>>p').clone().appendTo('#individual-direction-<?php the_ID();?>');


                    <?php endwhile;

                    endif;

                    wp_reset_query();

                    ?>



                } else {
                    $('.location-distance').show();
                    $('.loc-dist').hide();
                    $('.loc-directions').show();
                    <?php
                    $child = new WP_Query( array(
                        'posts_per_page' => 100,
                        'post_type'=> 'locations',
                        'post_status' => 'publish',
                        'meta_key' => 'location_directory',
                        'meta_value' => 'No'
                    ) );

                    if ($child->have_posts()) : while ($child->have_posts()) : $child->the_post(); ?>



                    $('#individual-direction-<?php the_ID();?>').empty()
                    $('#list-direction-<?php the_ID();?>>p').clone().appendTo('#individual-direction-<?php the_ID();?>');


                    <?php endwhile;

                    endif;

                    wp_reset_query();

                    ?>

                }
            }
            $(function() {

                $('#bh-sl-map-container').storeLocator(
                    {
                        callbackSuccess: function () {
                            setTimeout(explode, 100);
                        },
                        callbackAutoGeoSuccess: function () {
                            setTimeout(explode, 100);
                        },
                        callbackMarkerClick: function () {
                            setTimeout(explode, 1);
                        },
                        'mapSettings': {
                            zoom: $(window).width() > 1000 ? 8 : 6,
                            mapTypeId: google.maps.MapTypeId.ROADMAP,
                            zoomControl: true,
                            disableDoubleClickZoom: false,
                            scaleControl: true,
                            gestureHandling: 'cooperative',
                            navigationControl: false,
                            draggable: true
                        },
                        'defaultLat'                : 38.9072,
                        'defaultLng'                : -77.0369,
                        'defaultLoc'				: true,
                        distanceAlert: -1,
                        callbackListClick: function () {
                            //$('html, body').animate({scrollTop:$("#bh-sl-map-container").offset().top - 120}, 800);
                            //setTimeout(explode,800);

                            // $('.bh-sl-loc-list').animate({scrollTop:$(".list-focus").offset().top - 120}, 800);
                            //setTimeout(explode,800);
                        },
                        callbackMarkerClick: function () {
                            //$('html, body').animate({scrollTop:$("#bh-sl-map-container").offset().top - 120}, 800);
                            //setTimeout(explode,800);

                            $('.location-map-list-wrapper').animate({scrollTop: $(".list-focus").offset().top - 120}, 800);
                            setTimeout(explode, 800);
                        },
                        'inlineDirections': false,
                        'dataType': 'json',
                        'dataRaw': <?php echo json_encode($output); ?>,
                        'querystringParams': true,
                        //'infowindowTemplatePath': 'http://localhost/review/wp-content/themes/twentyseventeen/store/assets/js/plugins/storeLocator/templates/infowindow-description.html',
                        //'listTemplatePath': 'http://localhost/review/wp-content/themes/twentyseventeen/store/assets/js/plugins/storeLocator/templates/location-list-description.html',
                        // 'dataLocation': 'data/locations.json'
                        listTemplateID: 'listTemplate',
                        infowindowTemplateID: 'infowindowTemplate',
                        'slideMap': false,
                        'modal': false,
                        'maxDistance': false,
                        'defaultLoc': true,
                        'nameSearch':  true,
                        'defaultLat': '44.9207462',
                        'defaultLng': '-93.3935366',
                        //autoGeocode:true,
                        geocodeID: 'bh-geo-submit',
                        'fullMapStart': true,
                        'fullMapStartListLimit' : 20,
                        catMarkers: {
                            'page': ['<?php echo the_field('map_crown', 'option');?>', 69, 86],
                        }
                    }
                );
            });


        });
    }(jQuery));
</script>
      
<script>
    jQuery(function($) {
        $(".btn-loc-list-shop").map(function() {
           // $(this).attr("href", 'http://shop.skykingfireworks.com/' + $(this).data('title').replace(/\s/g, '').split('.').join("").split('/')[0])
        });
    }(jQuery));
</script>
