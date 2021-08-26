 <?php
 /**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 *
 * @package taxispirit
 */

function taxispirit_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'taxispirit' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'taxispirit' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar(array(
		'name' 			=> esc_html__('Page Sidebar', 'taxispirit'),
		'id' 			=> 'sidebar-2',
		'description' 	=> esc_html__('Add page sidebar widgets here.', 'taxispirit'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</section>',
		'before_title' 	=> '<h2 class="widget-title">',
		'after_title' 	=> '</h2>',
	));

	register_sidebar(array(
		'name' 			=> esc_html__('Footer Widgets', 'taxispirit'),
		'id' 			=> 'footer-1',
		'description' 	=> esc_html__('Add footer widgets here.', 'taxispirit'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</section>',
		'before_title' 	=> '<h2 class="widget-title">',
		'after_title' 	=> '</h2>',
	));
}
add_action( 'widgets_init', 'taxispirit_widgets_init' );