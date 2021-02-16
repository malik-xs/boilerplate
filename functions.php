<?php

/*
Theme Name: Boilerplate
Theme URI: https://themeforest.net/user/xpeedstudio/portfolio
Author: Xpeedstudio
Author URI: https://xpeedstudio.com/
Description: Boilerplate - eCommerce Marketplace Woocommerce WordPress Theme..
Version: 1.0
License: GNU General Public License v2 or later
License URI: LICENSE
Text Domain: boilerplate
Tags: theme-options, post-formats, featured-images
*/


// shorthand contants
// ------------------------------------------------------------------------
define('BOILERPLATE_THEME', 'Boilerplate WordPress Theme');
define('BOILERPLATE_VERSION', '1.0');


// shorthand contants for theme assets url
// ------------------------------------------------------------------------
define('BOILERPLATE_THEME_URI', get_template_directory_uri());
define('BOILERPLATE_THEME_DIR_FILE', dirname(__FILE__));
define('BOILERPLATE_IMG', BOILERPLATE_THEME_URI . '/assets/images');
define('BOILERPLATE_CSS', BOILERPLATE_THEME_URI . '/assets/css');
define('BOILERPLATE_JS', BOILERPLATE_THEME_URI . '/assets/js');


// shorthand contants for theme assets directory path
// ----------------------------------------------------------------------------------------
define('BOILERPLATE_THEME_DIR', get_template_directory());
define('BOILERPLATE_IMG_DIR', BOILERPLATE_THEME_DIR . '/assets/images');
define('BOILERPLATE_CSS_DIR', BOILERPLATE_THEME_DIR . '/assets/css');
define('BOILERPLATE_JS_DIR', BOILERPLATE_THEME_DIR . '/assets/js');

define('BOILERPLATE_CORE', BOILERPLATE_THEME_DIR . '/core');
define('BOILERPLATE_REMOTE_CONTENT', esc_url('http://content.xpeedstudio.com/demo-content/boilerplate'));
define('BOILERPLATE_LIVE_URL', esc_url('https://demo.xpeedstudio.com/boilerplate'));


// set up the content width value based on the theme's design
// ----------------------------------------------------------------------------------------
if (!isset($content_width)) {
    $content_width = 800;
}

// set up theme default and register various supported features.
// ----------------------------------------------------------------------------------------

function boilerplate_setup() {

    // make the theme available for translation
    $lang_dir = BOILERPLATE_THEME_DIR . '/languages';
    load_theme_textdomain('boilerplate', $lang_dir);

    // add support for post formats
    add_theme_support('post-formats', [
        'standard', 'image', 'video', 'audio','gallery'
    ]);

    // add support for automatic feed links
    add_theme_support('automatic-feed-links');

    // let WordPress manage the document title
    add_theme_support('title-tag');

    // add support for post thumbnails
    add_theme_support('post-thumbnails');

    // add support for custom logo
    add_theme_support( 'custom-logo' );

    // hard crop center center
    set_post_thumbnail_size(750, 465, ['center', 'center']);
    add_image_size( 'boilerplate-small', 350, 250, ['center', 'center'] );
    add_image_size( 'boilerplate-case-study-box', 320, 200, ['center', 'center'] );

    // register navigation menus
    register_nav_menus(
        [
            'primary' => esc_html__('Primary Menu', 'boilerplate'),
            'footermenu' => esc_html__('Footer Menu', 'boilerplate'),
        ]
    );

    // HTML5 markup support for search form, comment form, and comments
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'wp-block-styles' );
}
add_action('after_setup_theme', 'boilerplate_setup');

function boilerplate_remove_devm_settings() {
    remove_submenu_page( 'themes.php', 'devm-settings' );
}
add_action( 'admin_menu', 'boilerplate_remove_devm_settings', 999 );


// include the init.php
// ----------------------------------------------------------------------------------------
require_once( BOILERPLATE_CORE . '/init.php');
require_once( BOILERPLATE_CORE . '/elementor/elementor.php');

