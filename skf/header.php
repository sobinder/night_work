<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ecns
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">


		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	    <!--[if lt IE 9]>
	     <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	     <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	   <![endif]-->

    	<!-- favicon -->
        <link rel="shortcut icon" href="<?php the_field('favicon','option'); ?>">

		<?php wp_head(); ?>
        
<!-- GOOGLE ANALYTICS -->
	<script type="text/javascript">

	 var _gaq = _gaq || [];
	 _gaq.push(['_setAccount', 'UA-21119751-2']);
	 _gaq.push(['_trackPageview']);

	 (function() {
	   var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	   ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	   var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	 })();

	</script>
	
	<script async src='https://tag.simpli.fi/sifitag/9b000580-6ad6-0137-5f62-067f653fa718'></script>
<meta name="google-site-verification" content="fLHQelknCFz2c2kgrQW3FURSPk7Q_Ft30LuUpd7FiBY" />

	<?php $ourphpvariable = 'value'; //Get our PHP variable, whatever that may be ?>
    <script> var ourjavascriptvariable = "<?php echo $ourphpvariable; ?>";</script>


</head>
<body <?php body_class(); ?>>

	<!--  Clickcease.com tracking-->
<script type='text/javascript'>var script = document.createElement('script');
script.async = true; script.type = 'text/javascript';
var target = 'https://www.clickcease.com/monitor/stat.js';
script.src = target;var elem = document.head;elem.appendChild(script);
</script>
<noscript>
<a href='https://www.clickcease.com' rel='nofollow'><img src='https://monitor.clickcease.com/stats/stats.aspx' alt='ClickCease'/></a>
</noscript>
<!--  Clickcease.com tracking-->
	
<?php the_field('code');?>

<div class="header-cta">
        <div class="container">
    
					<div class="row">
                    
                    <div class="col-6">
                    
                    <div class="d-none"> <?php the_field('news_heading','option'); ?></div>
                    
   <ol id="sample" class="ticker">
    


<?php if(get_field('news_headlines','option')): ?>

    <?php while(the_repeater_field('news_headlines','option')): ?>
   
 <li class=""><?php the_sub_field('news','option');?></li>
                    

    <?php endwhile; ?>
 <?php endif; ?>
 
 
 <li class="count-down">
<?php 
$today = new DateTime(); // Today
$currentYear = $today->format('Y');
$DateBegin = new DateTime('01-01-'.$currentYear.'');
$DateEnd  = new DateTime('03-07-'.$currentYear.'');
if (
  $today->getTimestamp() > $DateBegin->getTimestamp() && 
  $today->getTimestamp() < $DateEnd->getTimestamp()){
  echo "4TH OF JULY COUNTDOWN: <div id='january_to_july'></div>";
}else{
   echo "1ST OF JANUARY COUNTDOWN: <div id='july_january'></div>";  
}
?></li>

  
</ol>


                    </div>
                    <div class="col-6 text-right">
                    <ul class="cta d-flex align-items-center justify-content-end">

<li><a href="<?php bloginfo('url');?>/locations" class="btn btn-shop">Shop Now</a></li>


                    <li class="search">
              

              
              <div id="sb-search" class="sb-search">
              <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">
            
	<input type="search" id="woocommerce-product-search-field" class="search-field sb-search-input" placeholder="Search here..." value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'woocommerce' ); ?>" />
     <span class="sb-icon-search"><i class="fa fa-search"></i></span>
	<button type="submit" class="sb-search-submit"></button>
   
	<input type="hidden" name="post_type" value="product" />
</form>
</div>
</li>



                    <li class="d-none"><a href="<?php bloginfo('url');?>/my-account"><i class="fa fa-user"></i></a></li>
                    <li class="d-none"><a href="<?php bloginfo('url');?>/wishlist"><i class="fa fa-wishlist"></i></a></li>
                    
                    </ul>
                    </div>
                    
                    </div>
                    </div>
</div>


 <div class="header_top clearfix d-none">
        <div class="container">
    
					<div class="row hidden-xs">
                    <div class="col-md-12 col-12 text-center">
                    <div class="d-none"> <?php the_field('news_heading','option'); ?></div>
                    
   <ol id="sample" class="ticker">
    <li class="count-down">
<?php 
$today = new DateTime(); // Today
$currentYear = $today->format('Y');
$DateBegin = new DateTime('01-01-'.$currentYear.'');
$DateEnd  = new DateTime('03-07-'.$currentYear.'');
if (
  $today->getTimestamp() > $DateBegin->getTimestamp() && 
  $today->getTimestamp() < $DateEnd->getTimestamp()){
  echo "4TH OF JULY COUNTDOWN: <div id='january_to_july'></div>";
}else{
   echo "1ST OF JANUARY COUNTDOWN: <div id='july_january'></div>";  
}
?></li>


<?php if(get_field('news_headlines','option')): ?>

    <?php while(the_repeater_field('news_headlines','option')): ?>
   
 <li class="d-none"><?php the_sub_field('news','option');?></li>
                    

    <?php endwhile; ?>
 <?php endif; ?>
 
 
  
</ol>



<div class="cta-right">
              <ul>
				  
				   <li>  </li>
				  
				  
              <li class="login"><a href="<?php bloginfo('url'); ?>/my-account/">Login</a> </li>
             



              <li class="cart d-none">
              

</li>
              </ul>
              
              </div>
              
              
              
              

                    
                    </div>
                     
        </div>
        
       
                                
                                
         </div>
          </div>
          




<div class="col-md-6 col-12 nlp hidden-xs d-none">
                     <div class="clearfix">
                     
                    
					 <?php
									wp_nav_menu( array(
										'menu'              => 'top-menu',
										'theme_location'    => 'top-menu',
										'depth'             => 2,
										'container'         => '',
										'menu_class'        => 'top-menu m-left',
										'menu_id'        => 'top-menu',
										)
									);
								?> 
                                  
</div>
					
                       </div>
                       
                       
                       
              
              
              
              <div class="header_middle d-none">
              
             

              </div>         
                                 
          
		<!-- header -->
		<header id="header" class="clearfix home d-none d-md-block">
        
        
			<!-- navbar-default -->
			<div class="container">
            <div class="row">
                        
                        
                        <div class="column left-column">
                        
                    
                        
                        
                         <?php
									wp_nav_menu( array(
										'menu'              => 'main-menu-left',
										'theme_location'    => 'main-menu-left',
										'depth'             => 2,
										'container'         => '',
										'menu_class'        => 'main-menu',
										'menu_id'        => '',
										)
									);
								?>
                                
                        </div>
                        
                         <div class="column middle-column">
                         <a href="<?php bloginfo('url'); ?>" class="logo"><img src="<?php the_field('logo','option'); ?>" alt="Logo"></a>
                         </div>
                         
                         
                          <div class="column right-column">
                          
                             <?php
									wp_nav_menu( array(
										'menu'              => 'main-menu-right',
										'theme_location'    => 'main-menu-right',
										'depth'             => 2,
										'container'         => '',
										'menu_class'        => 'main-menu',
										'menu_id'        => '',
										)
									);
								?>   
                          </div>     
						</div><!-- menu -->
</div><!-- navbar-default -->
</header><!-- header -->



<div class="mobile-header d-block d-md-none">
<div class="container">
<div class="row align-items-center">
<div class="col-3"> 
<button class="" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
   <i class="fa fa-bars"></i>
                                <span style="font-size:12px;" class="d-none d-md-block">Menu</span>
  </button>
  
</div>
<div class="col-6 m-center"><a href="<?php bloginfo('url'); ?>" class="logo"><img src="<?php the_field('logo','option'); ?>" style="max-width:100px;"></a></div>
<div class="col-3"><a href="<?php bloginfo('url');?>/locations/" class="btn btn-shop">Shop Now</a></div>
</div>
</div>
</div>



<header id="mobile-header" class="clearfix home d-block d-md-none">
<!-- navbar-default -->
<div class="container">
<div class="row">
<div class="col-12 np">

<div class="collapse" id="collapseExample">
                        
                         <?php
									wp_nav_menu( array(
										'menu'              => 'main-menu-left',
										'theme_location'    => 'main-menu-left',
										'depth'             => 2,
										'container'         => '',
										'menu_class'        => 'main-menu',
										'menu_id'        => '',
										)
									);
								?>

                             <?php
									wp_nav_menu( array(
										'menu'              => 'main-menu-right',
										'theme_location'    => 'main-menu-right',
										'depth'             => 2,
										'container'         => '',
										'menu_class'        => 'main-menu',
										'menu_id'        => '',
										)
									);
								?>
                                
                                </div>
                                
</div>
</div><!-- menu -->
</div><!-- navbar-default -->
</header>




<div class="fixed-sidebar-left d-none">


 
<div class="widget widget_search">
<h2>SIGN UP TO<br />
THE KING'S CORNER.</h2>
<p>Register to our E-Newsletter and receive
exclusive specials, product information,
videos and more.</p>
<div class="clearfix">
<?php echo do_shortcode('[mc4wp_form id="39"]');?>
</div>
<div class="clearfix social">
<h2>CONNECT WITH US.</h2>

</div>
                
<a href="<?php bloginfo('url'); ?>/our-catalog" class="btn">Sign up to Receive Catalog</a>                  
<a href="" class="sidebar-toggle"><i class="fa fa-cog fa-spin"></i></a>
</div>
</div>




<?php if (is_front_page() or is_blog() or is_woocommerce()) { ?>   


                
<?php } else { ?>
<section class="page-banner bg-image" style="background:url(<?php if( get_field('header_image') ) { ?><?php echo the_field('header_image');?>);"><?php } else { ?><?php bloginfo('url');?>/wp-content/uploads/2020/04/Header-Test.jpg) no-repeat center center;"><?php } ?>
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

<?php } ?>

