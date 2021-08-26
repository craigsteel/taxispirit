<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package taxispirit
 */

 // No direct access, please
 if (!defined( 'ABSPATH' )) exit; // Exit if accessed directly

get_header(); ?>

<?php if (get_option( 'page_for_posts' ) ): ?>
    
    <figure class="featured-image">
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_option( 'page_for_posts' )), 'featured-image' ); ?>

		<div class="featured-image" style="background-image: url('<?php echo $image[0]; ?>')">

			<div class="featured-image__overlay"></div>

			<div class="page-banner__content container container--narrow">
    			<h1 class="page-banner__title"><?php if(get_option( 'page_for_posts' ) ) echo get_the_title( get_option( 'page_for_posts' ) ); ?></h1>

    		
    			<div class="page-banner__intro"> 
        			<p>Read all the news and stories about gin and rum</p>
    			</div>
		</div>
		</div>
			
	</figure>

<?php endif; ?>

<?php if ( have_posts() ) : ?>
<div class="row justify-center">
	<div class="main-category">
		<?php taxispirit_the_category_list(); ?>
	</div>
</div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="projects-page">
				<div class="row justify-center">


		<?php if ( is_home() && ! is_front_page() ) : ?>

			<header>
				<h1 class="page-title screen-reader-text">
				<?php single_post_title(); ?></h1>
			</header>

			<?php endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile; ?>

			<div class="row justify-center">
				<div class="col-md-10">

			<?php the_posts_pagination(); ?>
			
			</div><!-- col-md-10 -->
		</div><!-- .row -->

					</div><!-- .row -->`
				</div><!-- #projects -->
		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer();

	else :
		get_template_part( 'template-parts/content', 'none' );
		return;
	endif;