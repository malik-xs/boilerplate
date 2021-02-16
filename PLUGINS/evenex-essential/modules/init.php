<?php

class Boilerplate_Modules{

    static function module_url(){
        return plugin_dir_url( __FILE__ );
    }

    public function run(){
        // die('foo');
        add_action('elementskit/loaded', function(){
            if (class_exists('ElementsKit_Lite')) {
                if(\ElementsKit_Lite::package_type() == 'free' && !in_array('elementskit/elementskit.php', apply_filters('active_plugins', get_option('active_plugins')))){
                    $this->include_files();
                    $this->load_classes();
                    $this->load_assets();
                    $this->ekit_por_widget_styles();
                    add_action( 'wp_enqueue_scripts', [$this, 'scripts'] );
                    add_action('elementor/frontend/before_enqueue_scripts', [$this, 'ekit_por_widget_scripts'], 99);
                }
            }
        });

    }

    public function scripts(){

    }


    public function load_assets(){

    }

    public function ekit_por_widget_styles(){
        // ekit pro widget style
        wp_enqueue_style( 'boilerplate-widget-styles-pro', self::module_url() . 'elements/assets/css/widget-styles-pro.css', null, \Boilerplate_Essentials_Includes::version() );
    }

    public function ekit_por_widget_scripts(){
        // ekit pro widget script
        wp_enqueue_script( 'boilerplate-widget-scripts-pro', self::module_url() . 'elements/assets/js/widget-scripts-pro.js', array( 'jquery', 'elementor-frontend' ), \Boilerplate_Essentials_Includes::version(), true );
    }

    public function load_classes(){
        // new ElementsKit\Modules\Parallax\Init();
        // new ElementsKit\Modules\Sticky_Content\Init();
    }

    public function include_files(){
        // include 'parallax/init.php';
        // include 'sticky-content/init.php';
        include 'custom-css/init.php';
        // include 'elements/gallery/gallery.php';
    }

    public static $instance = null;

    public static function instance() {
        if ( is_null( self::$instance ) ) {

            // Fire the class instance
            self::$instance = new self();
            self::$instance;
        }

        return self::$instance;
    }

}

Boilerplate_Modules::instance()->run();