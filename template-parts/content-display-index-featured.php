<?php
/**
 * The template for displaying featured image on the index page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Taxi_Spirit
 */

 // No direct access, please
 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>


    <?php if (get_option( 'page_for_posts' ) ): ?>
    	<figure class="feature-image">
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_option( 'page_for_posts' )), 'feature-image' ); ?>

	<div class="feature-image" style="background-image: url('<?php echo $image[0]; ?>')">

			<div class="featured-image__overlay"></div>
		</figure>

		<?php endif; ?>


