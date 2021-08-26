<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package taxispirit
 */

get_header();
?>

<div class="container">

	<header class="page-header pt-5">
		<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
		?>
	</header><!-- .page-header -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="projects-page">
				<div class="row justify-center">


		<?php if ( have_posts() ) : ?>



			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile ?>

			<div class="row justify-center">
				<div class="col-md-10">

			<?php
				the_posts_pagination();
			?>
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