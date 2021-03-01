<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ecns
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="entry-content">
                    
                    <div class="single-post">
                    
                   
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
                        <i class="fa fa-user">&nbsp;&nbsp;<?php the_author(); ?>&nbsp;&nbsp;</i>
                        <i class="fa fa-calendar">&nbsp;&nbsp;<?php the_time('d M Y');?>&nbsp;&nbsp;</i>
                        <i class="fa fa-comment">&nbsp;&nbsp;<a href="<?php comments_link(); ?>"><?php comments_number( 'No Comment', '1 Comment', '% Comments' ); ?></a>&nbsp;</i>
                    </div>
                     </div>

        
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

</div></div>


</article><!-- #post-## -->
