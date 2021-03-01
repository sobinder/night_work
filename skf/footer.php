<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ecns
 */
?>
      <section class="footer">
      <div class="footer-middle">
         <div class="container">
            <div class="row">
         <div class="col-md-6">
        <div class="title star text-left m-center"><h2>Join The <strong>Kings Court</strong></h2></div>
         <?php echo do_shortcode('[mc4wp_form id="39"]');?>
         <?php
          //echo do_shortcode('[zip_store_locations zipid="ftzip" storeid= "ftziplocation"]');
         ?>
         <p style="max-width:480px; text-align:center; color:#fff;">FOR EXCLUSIVE COUPONS AND DISCOUNTS</p>
         </div>
         <div class="col-md-6 text-right">
              <div class="clearfix social">
              <div class="title star text-right m-center">
                <h2>Stay <strong>Connected</strong></h2>
              </div>
              <ul class="social list-inline m-center">
                         <li><a href="<?php the_field('facebook','option'); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
                         <li><a href="<?php the_field('twitter','option'); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="<?php the_field('youtube','option'); ?>" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                          <li><a href="<?php the_field('instagram','option'); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <!-- <li><a href="mailto:<?php the_field('email'); ?>" target="_blank"><i class="fa fa-envelope"></i></a></li> -->
              </ul>
              </div>
         </div>
         </div>
         </div>
         </div>
      <div class="footer-top d-none">
      <div class="container" style="max-width:1450px;">
      <div class="row">
      <div class="column middle-column order-md-2">
      <a href="<?php bloginfo('url'); ?>" class="footer-logo"><img class="lazy" data-src="<?php the_field('footer_logo','option'); ?>" alt="" style="max-width:180px;"></a>
      </div>
      <div class="column left-column order-md-1">
        <?php
                  wp_nav_menu( array(
                    'menu'              => 'footer-menu-left',
                    'theme_location'    => 'footer-menu-left',
                    'depth'             => 2,
                    'container'         => '',
                    'menu_class'        => 'list-inline footer-menu d-block d-md-flex',
                    'menu_id'        => '',
                    )
                  );
                ?>
                                <?php
                  wp_nav_menu( array(
                    'menu'              => 'footer-menu-right',
                    'theme_location'    => 'footer-menu-right',
                    'depth'             => 2,
                    'container'         => '',
                    'menu_class'        => 'list-inline footer-menu d-block d-md-none',
                    'menu_id'        => '',
                    )
                  );
                ?>
                                </div>
      <div class="column right-column order-md-3">
      <?php
                  wp_nav_menu( array(
                    'menu'              => 'footer-menu-right',
                    'theme_location'    => 'footer-menu-right',
                    'depth'             => 2,
                    'container'         => '',
                    'menu_class'        => 'list-inline footer-menu d-none d-md-flex',
                    'menu_id'        => '',
                    )
                  );
                ?>
                                </div>
      </div>
      </div>
      </div>
      </section>
<div class="footer-copyright">
<div class="container" style="max-width:1300px;">
            <div class="row">
              <div class="col-md-4">
  <a href="<?php bloginfo('url'); ?>" class="footer-logo"><img class="lazy" data-src="<?php the_field('footer_logo','option'); ?>" alt="" style=""></a>
         </div>
         <div class="col-md-8 text-right">
 <?php
                  wp_nav_menu( array(
                    'menu'              => 'footer-menu',
                    'theme_location'    => 'footer-menu',
                    'depth'             => 2,
                    'container'         => '',
                    'menu_class'        => 'list-inline justify-content-end footer-menu d-none d-md-flex',
                    'menu_id'        => '',
                    )
                  );
                ?>
         </div>
         </div>
         </div>
         <div class="container">
            <div class="row">
              <div class="col-md-12">
               <div class="clearfix text-center copyright">
                  <p>&copy; Copyright <script>document.write(new Date().getFullYear())</script> Sky King Fireworks. All Rights Reserved. Designed by:<a class="pherona" href="http://pherona.com/" target="_blank"> Pherona</a><br />
                  </p>
               </div>
         </div>
         </div>
         </div>
         </div>
      <!-- subscribe-modal -->
      <div class="modal fade" id="subscribe-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <!-- modal-body -->
               <div class="modal-body text-center">
               <h2>You're all set! Thank you for signing up.</h2>
                <button type="button" class="btn btn-black" data-dismiss="modal">Close</button>
               </div>
               <!-- modal-body -->
            </div>
            <!-- modal-content -->
         </div>
         <!-- modal-dialog -->
      </div>
<?php wp_footer(); ?>
<img height="1" width="1" style="border-style:none;visibility:hidden;display:none;" alt="" src="//insight.adsrvr.org/track/conv/?adv=fwffh3t&ct=0:r2mif03&fmt=3" />
<script>
  var lazyLoadInstance = new LazyLoad({
    elements_selector: ".lazy"
  });
</script>
</body>
</html>
