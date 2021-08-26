<?php
	$video_home  =	get_field('video_home');
	$video_image =	get_field('video_image');
?>

<div id="video-container" class="video-container">

	<div class="video-container__content">
		<div class="video-container__content--heading">WHY RUM?</div>
		<a class="video-container__content--button" href="#popup">WATCH VIDEO</a>
	</div>

	<a href="#popup">
		<?php if( !empty($video_home) ) : ?>
                
		<img src="<?php echo $video_home['url']; ?>" alt="<?php echo $video_home['alt']; ?>">
	</a>
                
    	<?php endif; ?>
</div>

<div class="popup" id="popup">		
	<div class="popup__content">
		<a href="#video-container" class="popup__close">&times;</a>

		<p><iframe width="840" height="473" <?php the_field('oembed'); ?> frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></p>
	</div>
</div>