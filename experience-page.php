<?php
/**
 * Template Name: Taxi Experience
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package taxispirit
 */

get_header();
?>

<div class="featured-image">
	
	<?php if ( has_post_thumbnail() ) { ?>
	<?php the_post_thumbnail(); ?>
			
	<div class="featured-image__overlay"></div>

		<div class="page-banner__content container container">
			<h1 class="page-banner__title"><?php the_title(); ?></h1>
				
			<div class="page-banner__intro"> 
			</div>
		</div>
</div>
	<?php } ?>

	<div class="experience">
		<div class="container">

			<div class="row justify-center">
				<div class="col-md-8 col-sm-12">
			         <div class="experience__main-content">

			            <?php while ( have_posts() ) : the_post(); ?>
			              
			              <?php the_content(); ?>
			              
			            <?php endwhile; // end of the loop ?>    
	        		</div><!-- .main-content -->

	        	</div><!--.col -->
      		</div><!-- .row -->
    
    	</div><!-- end container -->
	</div> <!-- .contact -->


<?php get_template_part('template-parts/content','stayintouch'); ?>

<?php
get_footer();