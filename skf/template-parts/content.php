<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ecns
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
    
    	<div class="entry-content">
        
        
        <?php if ( is_single() ) : ?>

        <div class="post-header" style="background:url(<?php if ( has_post_thumbnail() ) {
    				the_post_thumbnail_url('full');
				}
				else {
					echo '' . get_bloginfo( 'template_url' ) 
						. '/images/post-featured-single.jpg';
				}
				?>)">

                
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

<?php echo get_the_category_list(); ?>


 					<div class="post-info">
                        <i class="fa fa-users"></i>&nbsp;Sky King&nbsp;&nbsp;
                        <i class="fa fa-calendar"></i> &nbsp;&nbsp;<?php the_time('d M Y');?>&nbsp;&nbsp;
                        <i class="fa fa-comment d-none">&nbsp;&nbsp;<a href="<?php comments_link(); ?>"><?php comments_number( 'No Comment', '1 Comment', '% Comments' ); ?></a>&nbsp;</i>
                   
                    </div>
                     </div>
                    
                    <div class="single-post">
                    
                    <?php else : ?>
                    
                    <div class="post-header">
    
        
    			<a href="<?php the_permalink();?>" class="featured-image">
				<?php if ( has_post_thumbnail() ) {
    				the_post_thumbnail();
				}
				else {
					
				}
				?>
                </a>
                
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<?php if ( 'post' === get_post_type() ) : ?>

<?php echo get_the_category_list(); ?>

<?php endif; ?>

 					<div class="post-info">
                        <i class="fa fa-users"></i>&nbsp;Sky King&nbsp;&nbsp;
                        <i class="fa fa-calendar"></i> &nbsp;&nbsp;<?php the_time('d M Y');?>&nbsp;&nbsp;
                        <i class="fa fa-comment d-none">&nbsp;&nbsp;<a href="<?php comments_link(); ?>"><?php comments_number( 'No Comment', '1 Comment', '% Comments' ); ?></a>&nbsp;</i>
                   
                    </div>
                     </div>
                    
<?php endif; ?>


		<?php if ( is_single() ) : ?>
        			<?php the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'ecns' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ecns' ),
				'after'  => '</div>',
			) );
		?>
        
        <?php else : ?>
        
        			<?php the_excerpt( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'ecns' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ecns' ),
				'after'  => '</div>',
			) );
		?>
        
        <?php endif; ?>



<?php if ( is_single() ) : ?>
</div>
<?php else : ?>
<footer class="entry-footer clearfix">
		<a href="<?php the_permalink();?>" class="read-more">read more</a>
	</footer><!-- .entry-footer -->
<?php endif; ?>

    </div><!-- .entry-content -->
    
</article><!-- #post-## -->
