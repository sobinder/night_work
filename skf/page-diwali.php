<?php
/**
 * Template Name: Page Diwali
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
		        <link rel="shortcut icon" href="<?php echo cs_get_option('favicon'); ?>">

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
	</head>	
	<body <?php body_class(); ?>>


<?php the_field('content');?>

		
    
		<?php wp_footer(); ?>
	</body>
</html>