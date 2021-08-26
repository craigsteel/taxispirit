<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package taxispirit
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php
		if ( has_post_thumbnail() ) { ?>

		<div class="featured-image featured-image__single featured-image__full-bleed">
	
			<?php the_post_thumbnail('taxispirit-full-bleed');?>

		</div><!-- .featured-image full-bleed -->

	<?php } ?>

		<div class="col-md-12">
			<header class="entry-header">
			<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

				if ( is_active_sidebar( 'sidebar-1' ) ) : 
			?>

				<div class="entry-meta">
			<?php taxispirit_posted_on(); ?>
				</div><!-- .entry-meta -->
			<?php 
				endif; 
			?>

			<?php taxispirit_the_category_list(); ?>

		</header><!-- .entry-header -->

		<section class="post-content no-sidebar">
		
			<?php
			if ( !is_active_sidebar( 'sidebar-1' ) ) : ?>
			<div class="post-content__wrap">
				<div class="entry-meta">
					<?php taxispirit_posted_on(); ?>
				</div><!-- .entry-meta -->
				<div class="post-content__body">
			<?php
			endif; ?>
			
			<div class="entry-content">
				<?php
					the_content( sprintf(
						/* translators: %s: Name of current post. */
						wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'taxispirit' ), array( 'span' => array( 'class' => array() ) ) ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					) );

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'taxispirit' ),
						'after'  => '</div>',
					) );
				?>

			</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php taxispirit_entry_footer(); ?>
		</footer><!-- .entry-footer -->

	</div><!-- .entry-content -->

				<?php
				if ( !is_active_sidebar( 'sidebar-1' ) ) : ?>
					
		</div><!-- .post-content__body -->
			</div><!-- .post-content__wrap -->

				<?php endif; ?>
				
	</div><!-- col-md-12 -->

</article><!-- #post-## -->