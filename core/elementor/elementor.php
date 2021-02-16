<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Boilerplate_Shortcode{

	/**
     * Holds the class object.
     *
     * @since 1.0
     *
     */
    public static $_instance;


    /**
     * Localize data array
     *
     * @var array
     */
    public $localize_data = array();

	/**
     * Load Construct
     *
     * @since 1.0
     */

	public function __construct(){
        add_action('elementskit/loaded', [$this, 'init']);
    }


	public function init(){
        add_action('elementor/init', array($this, 'boilerplate_elementor_init'));
        add_action('elementor/controls/controls_registered', array( $this, 'boilerplate_elementor_init' ), 11 );
        add_action('elementor/widgets/widgets_registered', array($this, 'boilerplate_shortcode_elements'));
        add_action( 'elementor/frontend/before_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}


    /**
     * Enqueue Scripts
     *
     * @return void
     */

     public function enqueue_scripts() {
       wp_enqueue_script( 'boilerplate-main-elementor', BOILERPLATE_JS  . '/elementor.js',array( 'jquery', 'elementor-frontend' ), BOILERPLATE_VERSION, true );
    }


	/**
     * Elementor Initialization
     *
     * @since 1.0
     *
     */

    public function boilerplate_elementor_init(){
        \Elementor\Plugin::$instance->elements_manager->add_category(
            'boilerplate-elements',
            [
                'title' =>esc_html__( 'Boilerplate', 'boilerplate' ),
                'icon' => 'fas fa-plug',
            ],
            1
        );
    }

    public function boilerplate_shortcode_elements($widgets_manager){
        require_once BOILERPLATE_CORE.'/elementor/widgets/back-to-top/back-to-top.php';
        $widgets_manager->register_widget_type(new Elementor\Boilerplate_BackTo());
    }

	public static function boilerplate_get_instance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new Boilerplate_Shortcode();
        }
        return self::$_instance;
    }
}
Boilerplate_Shortcode::boilerplate_get_instance();