<?php
/**
 * Template Name: About Page
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

<?php if ( has_post_thumbnail() ) { ?>
	<figure class="featured-image">
			
		<?php the_post_thumbnail(); ?>
				
		<div class="featured-image__overlay"></div>

	    	<div class="page-banner__content container container--narrow">
      
      			<h1 class="page-banner__title"><?php the_title(); ?></h1>
      		
      				<div class="page-banner__intro"> 
        		
        			<p>DISTILLED IN THE HEART OF LONDON</p>
      				
      				</div>
   		 	</div>  
 		</div>

 	</figure>

<?php } ?>

	<div id="content" class="site-content">

	<?php get_template_part('template-parts/content','ourstory-2'); ?>

	<?php get_template_part('template-parts/content','experience-block'); ?>

	<?php get_template_part('template-parts/content','extra-copy-block'); ?>

	<?php get_template_part('template-parts/content','logo-shop-btn'); ?>

	<?php get_template_part('template-parts/content','stayintouch'); ?>

	</div>

<?php get_footer(); 
?>

