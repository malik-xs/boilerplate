<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * enqueue all theme scripts and styles
 */


// stylesheets
// ----------------------------------------------------------------------------------------
if ( !is_admin() ) {
	// wp_enqueue_style() $handle, $src, $deps, $version
	wp_enqueue_style( 'fonts', boilerplate_google_fonts_url(['Roboto:400,500,700&display=swap']), null,  BOILERPLATE_VERSION );

	// theme css
	if(is_home() || is_archive() || is_single() || is_404()){
		wp_enqueue_style( 'boilerplate-blog', BOILERPLATE_CSS . '/blog.css', null, BOILERPLATE_VERSION );
	}
	wp_enqueue_style( 'boilerplate-master', BOILERPLATE_CSS . '/master.css', null, BOILERPLATE_VERSION );

}

// javascripts
// ----------------------------------------------------------------------------------------
if ( !is_admin() ) {


	// theme scripts
	wp_enqueue_script( 'boilerplate-script', BOILERPLATE_JS . '/script.js', array( 'jquery' ), BOILERPLATE_VERSION, true );

	// Load WordPress Comment js
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
	}
}
