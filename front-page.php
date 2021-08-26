<?php
/**
 * Template Name: Home Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package taxispirit
 */

$image_desktop       = get_field('image_desktop');
$image_mobile        = get_field('image_mobile');

$main_heading        = get_field('main_heading');
$certificate_heading = get_field('certificate_heading');
$certificates        = get_field('certificates');

// No direct access, please
if (!defined('ABSPATH')) exit; // Exit if accessed directly

get_header(); ?>

	<div class="home-header">

		<div class="home-header__social">
			<?php taxispirit_social_icons_output(); ?>	
		</div> 
						
		<div class="home-header__heading">
			<h1 class="home-header__primary">
				<span><?php echo $main_heading ?></span>
			</h1>

			<a href="<?php echo get_page_link(4); ?>" class="home-btn">Shop</a>

			<div class="home-header__certificate_heading">
				<?php echo $certificate_heading ?>
			</div>

			<div class="home-header__certificates">
	        <?php if( !empty($certificates) ) : ?>                   
                <img src="<?php echo $certificates['url']; ?>" alt="<?php echo $certificates['alt']; ?>">
			<?php endif; ?>
			</div>
		</div><!-- .home-header__heading -->

			<a href="<?php echo get_page_link(4); ?>" class="home-btn-mobile">Shop</a>

			<div class="home-header__desktop">
                <?php if( !empty($image_desktop) ) : ?>              
                	<img src="<?php echo $image_desktop['url']; ?>" alt="<?php echo $image_desktop['alt']; ?>">  
                <?php endif; ?>
            </div><!-- .bg-img -->

            <div class="home-header__mobile">
                <?php if( !empty($image_mobile) ) : ?>           
                    <img src="<?php echo $image_mobile['url']; ?>" alt="<?php echo $image_mobile['alt']; ?>">  
                <?php endif; ?>
            </div><!-- .bg-img -->
	</div><!-- .home-header -->

<div id="content" class="site-content">
	
<?php get_template_part('template-parts/content','ourstory'); ?>

<?php get_template_part('template-parts/content','extra-copy-block'); ?>

<?php get_template_part('template-parts/content','logo-discover-btn'); ?>

<?php get_template_part('template-parts/content','stayintouch'); ?>

</div>

<?php get_footer(); ?>

