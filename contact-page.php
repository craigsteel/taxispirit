<?php
/**
 * Template Name: Contact Page
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

$contact_information = get_field('contact_information');

get_header();

$thumbnail_url	= wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );
?>

	<!-- FEATURE IMAGE
	================================================== -->
	<?php if( has_post_thumbnail() ) { // check for feature image ?>
	
	<div class="featured-image" style="background: url('<?php echo $thumbnail_url; ?>') no-repeat; background-size: cover;" data-type="background" data-speed="2">

		<div class="featured-image__overlay"></div>
					
		<div class="page-banner__content container container--narrow">
		 	<h1 class="page-banner__title"><?php the_title(); ?></h1>
				<div class="page-banner__intro"> 					
				</div>
		</div>
	</div>

<?php } else { // fallback image ?>
	
	<div class="featured-image featured-image-default" data-type="background" data-speed="2">
		
		<div class="featured-image__overlay"></div>
		
		<div class="page-banner__content container container--narrow">
		 	<h1 class="page-banner__title"><?php the_title(); ?></h1>
				<div class="page-banner__intro"> 					
				</div>
		</div>
	</div>
	
<?php } ?>

	<div class="contact">
		<div class="container">

			<div class="row justify-center">
				<div class="col-md-6 col-sm-12">
			         <div class="contact__main-content">
			         	<span class="contact__main-content--head">
							<?php echo $contact_information ?>
			         	</span>
					</div>

			            <?php while ( have_posts() ) : the_post(); ?>
			              
			              <?php the_content(); ?>
			              
			            <?php endwhile; // end of the loop ?>    
	        		</div><!-- .main-content -->

	        		<div class="contact__privacy"><a href="<?php echo get_permalink('1756'); ?>">Your personal information will remain confidential. For more information. please see our privacy policy ></a></div>

	        	</div><!--.col -->
      		</div><!-- .row -->
    
    	</div><!-- end container -->
	</div> <!-- .contact -->


<?php get_template_part('template-parts/content','stayintouch'); ?>

<?php
get_footer();