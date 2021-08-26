<?php
	$extra_heading      = get_field('extra_heading');
	$extra_intro        = get_field('extra_intro');

	$extra_l_column_t   = get_field('extra_copy_left_column_top');
	$image_left			= get_field('image_left');
	$extra_l_column_b   = get_field('extra_copy_left_column_top');

	$extra_r_column_t 	= get_field('extra_copy_right_column_top');
	$image_right		= get_field('image_right');
	$extra_r_column_b	= get_field('extra_copy_right_column_bottom');
?>

<!-- extra-copy-block -->
<div class="row justify-center" style="display: none;">
	<div class="col-md-8">

		<h2 class="text-center">	
			<?php echo $extra_heading ?>
		</h2>
				
		<span class="our-story--intro">			
			<?php echo $extra_intro ?>
		</span>

	</div>
</div>

	<div class="row justify-center" style="display: none;">
		
		<div class="col-md-4">
			<div class="our-story--col">

				<?php echo $extra_l_column_t ?>

					<div class="image-insert p-2">
						<?php if( !empty($image_left) ) : ?>
							
							<img src="<?php echo $image_left['url']; ?>" alt="<?php echo $image_left['alt']; ?>">
						
						<?php endif; ?>
					</div><!-- .image-insert p-2 -->

				<?php echo $extra_l_column_b ?>

			</div><!-- .our-story--col -->
		</div><!-- .col-md-4 col-sm-12 pr-2 -->
						
		<div class="col-md-4">
			<div class="our-story--col">

				<?php echo $extra_r_column_t ?>

					<div class="image-insert p-2">
						<?php if( !empty($image_right) ) : ?>
                
                			<img src="<?php echo $image_right['url']; ?>" alt="<?php echo $image_right['alt']; ?>">
                
                		<?php endif; ?>
					</div><!-- .image-insert p-2 -->

				<?php echo $extra_r_column_b ?>

			</div><!-- .our-story--col -->
		</div><!-- .col-md-4 col-sm-12 pr-2 -->

	</div><!-- .row -->