<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ecns
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
get_header(); ?>

<?php
if ( is_search()) {    
    get_template_part( 'product', 'search' );
} elseif ( is_shop()) {   
 	get_template_part( 'product', 'shop' );
} elseif ( is_product_category()) {   
 	get_template_part( 'product', 'archive' );
} elseif ( is_product_tag()) { 
     get_template_part( 'product', 'archive' );
} elseif ( is_product()) { 
     get_template_part( 'product', 'single' );
}  else { 
   get_template_part( 'product', 'archive' );
}   
?>

<?php get_footer();