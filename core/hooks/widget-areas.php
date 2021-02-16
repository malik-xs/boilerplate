<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * register widget area
 */

function boilerplate_widget_init()
{
    if (function_exists('register_sidebar')) {
        register_sidebar(
            array(
                'name' => esc_html__('Blog widget area', 'boilerplate'),
                'id' => 'sidebar-1',
                'description' => esc_html__('Appears on posts.', 'boilerplate'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h5 class="widget-title">',
                'after_title' => '</h5>',
            )
        );
    }
}

add_action('widgets_init', 'boilerplate_widget_init');

if(defined('DEVM')) {


	function footer_right_widgets_init(){
	if ( function_exists('register_sidebar') ){
		//  Left sidebar
		register_sidebar(array(
			'name' => 'Footer Left',
			'id' => 'footer-left',
			'before_widget' => '<div class="footer-widget widget %2$s footer-left-widget">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="widget-title">',
			'after_title' => '</h5>',
		));
		// center sidebar
		register_sidebar(array(
			'name' => 'Footer Center',
			'id' => 'footer-center',
			'before_widget' => '<div class="footer-widget widget %2$s footer-center-widget">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="widget-title">',
			'after_title' => '</h5>',
		));
		//  Footer right
		register_sidebar(array(
			'name' => 'Footer right',
			'id' => 'footer-right',
			'before_widget' => '<div class="footer-widget widget %2$s footer-right-widget">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="widget-title">',
			'after_title' => '</h5>',
		));
	}}
	add_action( 'widgets_init', 'footer_right_widgets_init' );

}
