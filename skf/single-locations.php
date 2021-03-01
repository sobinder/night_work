<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ecns
 */

get_header(); ?>



<div class="shop-breadcrumb woocommerce">
<div class="container">
<div class="row">
<div class="col-sm-12 clearfix">
<nav class="woocommerce-breadcrumb">
<ul id="breadcrumbs" class="breadcrumbs">
<li class="item-home"><a class="bread-link bread-home" href="<?php bloginfo('url'); ?>" title="Home">Home</a></li>
<li class="item-cat item-custom-post-type-locations"><a class="bread-cat bread-custom-post-type-locations" href="<?php bloginfo('url'); ?>/locations/" title="Locations">Locations</a></li>
<?php if($post->post_parent) {
    $parent_link = get_permalink($post->post_parent);
	$parent_title = get_the_title($post->post_parent); ?>
    <li class="item-cat"><a href="<?php echo $parent_link; ?>"><?php echo $parent_title; ?></a></li>
    
<?php } ?>
<li class="item-current"><strong class="bread-current" title="<?php the_title();?>"><?php the_title();?></strong></li></ul>
</nav>
</div>
</div>
</div>
</div>


<?php if ( is_single() && $post->post_parent ) {
       get_template_part('directory','single');
} else {
    get_template_part('directory','listing');
}?>
	

<?php get_footer();?>