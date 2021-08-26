<?php
	$experience_heading    = get_field('experience_heading');
	$experience_text       = get_field('experience_text');
	$experience_bg_image   = get_field('experience_bg_image');
?>

<div class="row justify-center">
	<div class="col-md-10">
		<div class="the-experience-block">

			<div class="the-experience-block__content">
				<h2 class="the-experience-block__title text-center">
					<?php echo $experience_heading ?>
				</h2>
					<div class="the-experience-block__intro">
						<p><?php echo $experience_text ?></p>
							
						<a href="<?php echo get_page_link(1926); ?>" class="btn-sm btn">The Rum Taxi Experience</a>
					</div>
				
			<div class="the-experience-block__overlay"></div>

			</div><!-- .the-experience__content -->

			<?php if( !empty($experience_bg_image) ) : ?>    
            <img src="<?php echo $experience_bg_image['url']; ?>" alt="<?php echo $experience_bg_image['alt']; ?>">
         	<?php endif; ?>
	
		</div><!-- .the-experience -->
	</div><!-- .col-md-10 col-sm-12-->
</div><!-- .row -->