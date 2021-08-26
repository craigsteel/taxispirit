<?php
	$our_page_heading       	= get_field('our_story_page_heading');
	$our_intro             		= get_field('our_story_introduction');
	$large_image_top_our_story 	= get_field('large_image_top_our_story');

	$our_column_one     		= get_field('our_story_copy_left_column');
	$our_column_one_image     	= get_field('our_story_image_left_column');
	$our_column_one_bottom     	= get_field('our_story_copy_left_column_bottom');

	$our_column_two	    		= get_field('our_story_copy_right_column');
	$our_column_two_image    	= get_field('our_story_image_right_column');
	$our_column_two_bottom     	= get_field('our_story_copy_right_column_bottom');
?>

<div class="our-story">

	<div class="row justify-center">
		<div class="col-md-8">
			<h2><?php echo $our_page_heading ?></h2>
			<div class="our-story--intro">
				<?php echo $our_intro  ?>
			</div>

			<div class="image-insert p-2">
				<?php if( !empty($large_image_top_our_story) ) : ?>
                <img src="<?php echo $large_image_top_our_story['url']; ?>" alt="<?php echo $large_image_top_our_story['alt']; ?>">
               <?php endif; ?>
            </div>

		</div>
	</div>

			<div class="row justify-center">

				<div class="col-md-4">
					<div class="our-story--col">

						<?php echo $our_column_one ?>

						<div class="image-insert p-2">
						
						<?php if( !empty($our_column_one_image) ) : ?>
                
                		<img src="<?php echo $our_column_one_image['url']; ?>" alt="<?php echo $our_column_one_image['alt']; ?>">                
               			<?php endif; ?>

						</div>

						<?php echo $our_column_one_bottom ?>
						
					</div>
				</div><!-- .col-md-4-->
							
				<div class="col-md-4">
					<div class="our-story--col">					
						
						<?php echo $our_column_two ?>

							<div class="image-insert p-2">
								
								<?php if( !empty($our_column_two_image) ) : ?>
                
                				<img src="<?php echo $our_column_two_image['url']; ?>" alt="<?php echo $our_column_two_image['alt']; ?>">                
               					<?php endif; ?>
               			
							</div>

						<?php echo $our_column_two_bottom ?>

					</div>
				</div><!-- .col-md-4-->

				</div><!-- our-story__col -->

			</div><!-- .row -->

</div><!-- our-story-->
