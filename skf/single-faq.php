<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ecns
 */

get_header(); ?>

<div class="section blog">

<div class="col-sm-3 left-sidebar hidden-xs">
<div class="fixed-sidebar-left">
<div class="widget widget_search">
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
        <input type="search" class="search-field"
            placeholder="<?php echo esc_attr_x( 'Search', 'placeholder' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
</form>
<a href="#" class="sidebar-toggle"><i class="fa fa-bars"></i></a>
</div>
<?php dynamic_sidebar( 'sidebar-fixed' ); ?>
</div>
</div>

<div class="col-md-6 col-sm-8 post-content">
<div class="post-header" style="background:url(<?php echo get_the_post_thumbnail_url('151', 'full');?>)">
<h1 class="entry-title">Q: <?php the_title();?></h1></div>

  <div class="post entry-faq entry-content clearfix" style="padding:50px;">
  <strong>A:</strong><?php while ( have_posts() ) : the_post();
			the_content();
			endwhile; // End of the loop.
		?>

        <h2 class="">More FAQ'S</h2>
   <ul class="faq-nav">
 <?php
			global $post;
			$args = array( 'posts_per_page' => 500, 'post_type'=> 'faq', 'orderby' => 'date', 'order' => 'ASC');
			$myposts = get_posts( $args );


			foreach( $myposts as $post ) : setup_postdata($post); ?>


                     <li><a href="#faq-<?php the_ID();?>"><?php the_title();?></a></li>



			<?php endforeach; wp_reset_query(); ?>
                 </ul>

                        <hr />

<?php
			global $post;
			$args = array( 'posts_per_page' => 500, 'post_type'=> 'faq', 'orderby' => 'date', 'order' => 'ASC');
			$myposts = get_posts( $args );


			foreach( $myposts as $post ) : setup_postdata($post); ?>


                     <h3 id="faq-<?php the_ID();?>"><span>Q</span>:&nbsp;<?php the_title();?></h3>

                     <span class="pull-left"><strong>A</strong>:&nbsp;</span> <?php the_content();?>

<hr />
			<?php endforeach; wp_reset_query(); ?>


</div>

</div>


<div class="col-sm-3 left-sidebar visible-xs">
<div class="fixed-sidebar-left">
<div class="widget widget_search">
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
        <input type="search" class="search-field"
            placeholder="<?php echo esc_attr_x( 'Search', 'placeholder' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
</form>
<a href="#" class="sidebar-toggle"><i class="fa fa-bars"></i></a>
</div>
<?php dynamic_sidebar( 'sidebar-fixed' ); ?>
</div>
</div>


<div class="col-md-3 col-sm-4 right-sidebar">
<div class="sidebar">
<?php get_sidebar();?>
</div>
</div>
</div>

<?php get_footer();?>
