<?php
/**
 * Template Name: Kings Classroom Subpage State Laws
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

<div class="shop-banner" style=" background:url(<?php if( has_post_thumbnail() ) { ?><?php echo the_post_thumbnail_url('full');?>);"><?php } else { ?><?php echo get_template_directory_uri();?>/images/king-class-room.jpg) no-repeat center center;"><?php } ?>
<div class="container">
<div class="row">
<div class="col-sm-12">
<h1><?php
echo empty( $post->post_parent ) ? get_the_title( $post->ID ) : get_the_title( $post->post_parent );
?></h1>
</div>
</div>
</div>
</div>


<div class="shop-breadcrumb woocommerce">
<div class="container">
<div class="row">
<div class="col-sm-12 clearfix">
<nav class="woocommerce-breadcrumb">
<?php custom_breadcrumbs(); ?>
</nav>
</div>
</div>
</div>
</div>


<div class="section blog clearfix">
<div class="container">
<div class="row">


<div class="col-md-9 col-sm-8 post-content pull-right m-left">
<?php while ( have_posts() ) : the_post(); ?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</div><!-- .entry-header -->

	<div class="entry-content">
    
    
    
    <table class="pdf-table" style="width: 100%;">
<tbody>
<tr>
<td align="left" valign="top" width="25%">
<?php if(get_field('box_one')): ?>
<?php while(the_repeater_field('box_one')): ?>
<a href="<?php the_sub_field('state_law_pdf');?>" target="_blank" rel="noopener noreferrer"><?php the_sub_field('state_name');?></a><br>
<?php endwhile; ?>
 <?php endif; ?>
</td>
<td align="left" valign="top" width="25%">
<?php if(get_field('box_two')): ?>
<?php while(the_repeater_field('box_two')): ?>
<a href="<?php the_sub_field('state_law_pdf');?>" target="_blank" rel="noopener noreferrer"><?php the_sub_field('state_name');?></a><br>
<?php endwhile; ?>
 <?php endif; ?>
</td>
<td align="left" valign="top" width="25%">
<?php if(get_field('box_three')): ?>
<?php while(the_repeater_field('box_three')): ?>
<a href="<?php the_sub_field('state_law_pdf');?>" target="_blank" rel="noopener noreferrer"><?php the_sub_field('state_name');?></a><br>
<?php endwhile; ?>
 <?php endif; ?>
</td>
<td align="left" valign="top" width="25%">
<?php if(get_field('box_four')): ?>
<?php while(the_repeater_field('box_four')): ?>
<a href="<?php the_sub_field('state_law_pdf');?>" target="_blank" rel="noopener noreferrer"><?php the_sub_field('state_name');?></a><br>
<?php endwhile; ?>
 <?php endif; ?>
</td>
</tr>
</tbody>
</table>



		
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'ecns' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->



<?php endwhile; // End of the loop. ?>
</div>

<div class="col-md-3 col-sm-4 left-sidebar">

<div class="post clearfix">
  <ul class="king-class-room-list">
    <?php the_field('sidebar_menu');?>
  </ul>
</div> </div>


</div>
</div>
</div>

<?php get_footer();