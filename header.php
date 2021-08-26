<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package taxispirit
 */

 // No direct access, please
 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<!DOCTYPE html>
	<html <?php language_attributes(); ?> class="no-svg">
		<head>
			<meta charset="<?php bloginfo( 'charset' ); ?>"/>
			<title><?php bloginfo( 'name' ); wp_title(); ?></title>
			<meta name="description" content="<?php bloginfo( 'description' ); ?>">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="preload" href="http://localhost:8888/wp-content/themes/taxispirit/dist/assets/fonts/csd-icon.ttf" as="font" crossorigin="anonymous">
			<link rel="manifest" href="http://localhost:8888/taxispirit-icon/manifest.json">
			<link rel="profile" href="http://gmpg.org/xfn/11">
			<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
			<?php endif; ?>
			<?php wp_head(); ?>
		</head>

	<body <?php body_class(); ?>>
			
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'taxispirit' ); ?></a>

			<header id="masthead" class="site-header">
				<div class="site-branding">

					<?php the_custom_logo(); ?>
						<div class="site-branding__text">
						
							<?php
							if (is_front_page() && is_home()) : ?>
								<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
		
							<?php
							else : ?>
									<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
							<?php
							endif;
								$taxispirit_description = get_bloginfo('description', 'display');
							if ($taxispirit_description || is_customize_preview()) :
							?>
									<p class="site-description"><?php echo $taxispirit_description; /* WPCS: xss ok. */ ?></p>
							<?php 
							endif; ?>
					
						</div><!-- .site-branding__text -->
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation">

					<button class="menu-toggle hamburger hamburger--collapse" aria-controls="top-menu primary-menu" aria-expanded="false">    
						<span class="hamburger-box">
      						<span class="hamburger-inner"></span>
   						</span>
   					</button>
					
					<?php wp_nav_menu( array( 
						'theme_location' => 'top', 
						'menu_id'	 	 => 'top-menu',
						'menu_class'	 => 'secondary',
						) );
					?>

					<?php wp_nav_menu( array( 
						'theme_location' => 'primary', 
						'menu_id'	 	 => 'primary-menu',
						) ); 
					?>
					
				</nav><!-- #site-navigation -->
				
			</header><!-- #masthead -->
		</div>

