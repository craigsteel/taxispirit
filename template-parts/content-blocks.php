<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php if ( is_single() ) { ?>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		</div>
	</div>

	<?php } else { ?>

    <div class="col-md-4">
	    <div class="post-module"> <!-- Post-->
          	<div class="thumbnail"><!-- Thumbnail-->

            <div class="overlay"></div>

			<?php the_post_thumbnail(); ?>
		</div><!-- Thumbnail-->
	<?php } ?>


		<header class="entry-header mt-0">
			<?php taxispirit_the_category_list(); ?>
			<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

				if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<?php
						taxispirit_posted_by();
						taxispirit_posted_on();

						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
				
		</div>
	</header><!-- .entry-header -->

	<div id="content" class="site-content">
		<div class="entry-content">
			<?php
				the_content( sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'taxispirit' ),
						array(
						'span' => array(
						'class' => array(),
						),
					)),
				get_the_title()
				));

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'taxispirit' ),
					'after'  => '</div>',
				));
			?>
		</div><!-- .entry-content -->

	</div><!-- .post__content -->

</article><!-- #post-## -->