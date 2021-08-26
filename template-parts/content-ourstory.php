<?php
	$page_heading      = get_field('page_heading');
	$intro             = get_field('introduction');
	$large_image_top   = get_field('large_image_top');

	$copy_left_column_top    	= get_field('copy_left_column_top');
	$image_left_column     		= get_field('image_left_column');
	$copy_left_column_bottom	= get_field('copy_left_column_bottom');


	$copy_right_column_top	    = get_field('copy_right_column_top');
	$image_right_column     	= get_field('image_right_column');
	$copy_right_column_bottom	= get_field('copy_right_column_bottom');
?>

<div class="our-story">

	<div class="row justify-center">
		<div class="col-md-8">
			<h2><?php echo $page_heading ?></h2>
			<span class="our-story--intro">
				<?php echo $intro ?>
			</span>

			<div class="image-insert p-2">
				<?php if( !empty($large_image_top) ) : ?>
                <img src="<?php echo $large_image_top['url']; ?>" alt="<?php echo $large_image_top['alt']; ?>">
               <?php endif; ?>
            </div>
               			
		</div>
	</div>

		<div class="row justify-center">
			<?php get_template_part('template-parts/content', 'popup'); ?>
		</div>

			<div class="row justify-center">

				<div class="col-md-4">
					<div class="our-story--col">

						<?php echo $copy_left_column_top ?>

							<div class="image-insert p-2">
								
								<?php if( !empty($image_left_column) ) : ?>
                
                				<img src="<?php echo $image_left_column['url']; ?>" alt="<?php echo $image_left_column['alt']; ?>">                
               					<?php endif; ?>
               			
							</div>

						<?php echo $copy_left_column_bottom ?>

					</div>
				</div><!-- .col-md-4-->
							
				<div class="col-md-4">
					<div class="our-story--col">

						<?php echo $copy_right_column_top ?>
                
							<div class="image-insert p-2">
								
								<?php if( !empty($image_right_column) ) : ?>
                
                				<img src="<?php echo $image_right_column['url']; ?>" alt="<?php echo $image_right_column['alt']; ?>">                
               					<?php endif; ?>
               			
							</div>

						<?php echo $copy_right_column_bottom ?>

					</div><!-- .col-md-4-->
				</div><!-- our-story__col -->

			</div><!-- .row -->

</div><!-- our-story-->
