<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package taxispirit
 */

?>

	</div><!-- #content -->

		<footer id="colophon" class="site-footer">

			<nav class="menu-footer">
				<?php wp_nav_menu( array( 
					'theme_location' => 'footer',
					'container' => false
					) );
				?>
			</nav><!-- .social-menu -->

			<div class="site-footer__contact">
				<p><b>CONTACT</b>   •   Taxi Spirit Co Ltd.   •   Arch 412, Haven Mews, London, UK, E3 4AG   •   Telephone: +44(0)20-8981-4444   •   </p>
			</div>

			<div class="site-footer__info">
					&copy; <?php echo date("Y"); echo " "; echo bloginfo('name'); ?>
					<br> <?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'taxispirit' ), 'taxispirit', '<a href="https://craigsteel-design.com/">craig steel design</a>' );
					?>
			</div><!-- .site-info -->

		</footer><!-- #colophon -->

	<?php wp_footer(); ?>

	</body>
</html>
