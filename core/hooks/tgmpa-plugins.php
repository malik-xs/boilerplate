<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * register required plugins
 */

function boilerplate_register_required_plugins() {
	$plugins	 = array(
		array(
			'name'		 => esc_html__( 'Elementor', 'boilerplate' ),
			'slug'		 => 'elementor',
			'required'	 => true,
        ),
		array(
			'name'		 => esc_html__( 'Elementskit Lite', 'boilerplate' ),
			'slug'		 => 'elementskit-lite',
			'required'	 => true,
        ),
		array(
			'name'		 => esc_html__( 'Metform', 'boilerplate' ),
			'slug'		 => 'metform',
			'required'	 => true,
        ),
		array(
			'name'		 => esc_html__( 'Advanced Custom Fields', 'boilerplate' ),
			'slug'		 => 'advanced-custom-fields',
			'required'	 => true,
        ),
		array(
			'name'		 => esc_html__( 'Advanced Custom Fields Pro', 'boilerplate' ),
			'slug'		 => 'advanced-custom-fields-pro',
			'required'	 => true,
			'version'	 => '5.9.4',
			'source'	 =>  esc_url(BOILERPLATE_REMOTE_CONTENT . '/plugins/advanced-custom-fields-pro.zip')
        ),
		array(
			'name'		 => esc_html__( 'Devmonsta', 'boilerplate' ),
			'slug'		 => 'devmonsta',
			'required'	 => true,
		),
		// array(
		// 	'name'		 => esc_html__( 'WP WooCommerce Events Manager', 'boilerplate' ),
		// 	'slug'		 => 'wp-event-solution',
		// 	'required'	 => true,
		// ),
		array(
			'name'		 => esc_html__( 'One Click Demo Import', 'boilerplate' ),
			'slug'		 => 'one-click-demo-import',
			'required'	 => true,
		),
		array(
			'name'		 => esc_html__( 'Boilerplate Essential', 'boilerplate' ),
			'slug'		 => 'boilerplate-essential',
			'required'	 => true,
			'version'	 => '1.1',
            'source'	 =>  esc_url(BOILERPLATE_REMOTE_CONTENT . '/plugins/boilerplate-essential.zip')
		),
	);


	$config = array(
		'id'			 => 'boilerplate', // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path'	 => '', // Default absolute path to bundled plugins.
		'menu'			 => 'boilerplate-install-plugins', // Menu slug.
		'parent_slug'	 => 'themes.php', // Parent menu slug.
		'capability'	 => 'edit_theme_options', // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'	 => true, // Show admin notices or not.
		'dismissable'	 => true, // If false, a user cannot dismiss the nag message.
		'dismiss_msg'	 => '', // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic'	 => false, // Automatically activate plugins after installation or not.
		'message'		 => '', // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'boilerplate_register_required_plugins' );