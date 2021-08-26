<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package taxispirit
 */
?>

<div class="col-sm-6 col-md-4">
	<div class="post-module">
	     <!-- <div class="post-content"> Post Content     -->

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
       		
          	<div class="thumbnail"><!-- Thumbnail-->

				<?php the_post_thumbnail('thumbnail'); ?>
				
			</div><!-- Thumbnail-->
		 
				<header class="entry-header">
						
					<?php
						if ( is_single() ) :
							the_title( '<h1 class="entry-title">', '</h1>' );
						else :
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						endif;

						if ( 'post' === get_post_type() ) : 
					?>
							
					<div class="post-content__wrap">
						<div class="entry-meta">
							<?php taxispirit_posted_on(); ?>
						</div><!-- .entry-meta -->
					
					<div class="post-content__body">
							
						<?php endif; ?>
				
				</header><!-- .entry-header -->

				<div class="entry-content">

					<?php	
						if ( is_single() ) :
							the_content();
						else :
							the_excerpt('taxispirit_custom_excerpt_length');
						
						endif;
					?>

				</div><!-- .entry-content -->

				<div class="continue-reading">		
					<?php
						$read_more_link = sprintf(
							/* translators: %s: Name of current post. */
							wp_kses( __( 'Continue reading %s', 'taxispirit' ), array( 'span' => array( 'class' => array() ) ) ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						);
					?>
								
						<a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark">
							<?php echo $read_more_link; ?>
						</a>
				</div><!-- .continue-reading -->


		</article><!-- #post-## -->
		
	</div> <!-- .Post-module -->
</div><!-- .col-md-4 -->
