<?php
/**
 * Template Name: Faqs
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package geoklix
 */

get_header(); ?>


<?php while ( have_posts() ) : the_post(); ?>


  <section class="page-content">
    <div class="container">
        
    
     <div class="row">



 <?php
			global $post;
			$args = array( 'posts_per_page' => 100, 'post_type'=> 'faqs');
			$myposts = get_posts( $args );
			foreach( $myposts as $post ) : setup_postdata($post); ?>
            
<div class="col-md-6">

<div class="accordion-section">

        <h2 class="section-title"><?php the_title();?></h2>

        <div class="accordion" id="accordion<?php the_ID();?>" role="tablist" aria-multiselectable="true">
          
          <?php $num = 0;?>
          <?php $gum = 0;?>
          
           <?php if(get_field('faq')): ?>
			    <?php while(the_repeater_field('faq')):;?>

                    <div class="card">
            <div class="card-header" id="headingThree<?php the_ID();?>" role="tab">
              <button class="collapsed fs-20" aria-expanded="false" href="#collapseThree-<?php the_ID();?>-<?php echo $num++; ?>" data-toggle="collapse"> <i class="fa fa-angle-down"></i> <?php the_sub_field('question');?></button>
            </div>
            <div class="collapse visible-edit" id="collapseThree-<?php the_ID();?>-<?php echo $gum++; ?>" role="tabpanel"  data-parent="#accordion<?php the_ID();?>">
              <div class="card-body">
               <?php the_sub_field('answer');?>
              </div>
            </div>
          </div>
         
 	 	   <?php endwhile;?>
		   <?php endif; ?>   
           
           
           </div>
           </div> 
           </div>
           

           
                            
			<?php endforeach; wp_reset_query();?>


    </div>
    </section>

		
         <section class="page-content">
    <div class="container">
        
    
     <div class="row">


<div class="col-md-12 text-center">
<div class="content">
<?php the_content();?>
</div>
</div>
</div>

</div>

</section>	

<?php endwhile; // End of the loop. ?>


<?php get_footer();