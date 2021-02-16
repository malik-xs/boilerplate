<?php

class Customizer extends \Devmonsta\Libs\Customizer
{

    public function register_controls()
    {

        /**
         * Add parent panels
         */

        $this->add_panel([
            'id'             => 'xs_theme_option_panel',
            'priority'       => 0,
            'theme_supports' => '',
            'title'          => esc_html__('Theme settings', 'boilerplate'),
            'description'    => esc_html__('Theme options panel', 'boilerplate'),
        ]);


        /*******************************************
         * Header settings here
         ******************************************/
        $this->add_section([
            'id'       => 'xs_header_settings_section',
            'title'    => esc_html__('Header Settings', 'boilerplate'),
            'panel'    => 'xs_theme_option_panel',
            'priority' => 1,
        ]);

        /**
         * Header builder switch here
         */
        $this->add_control([
            'id'      => 'header_builder_enable',
            'type'    => 'switcher',
            'default' => 'no',
            'label'   => esc_html__('Header builder Enable ?', 'boilerplate'),
            'desc'    => esc_html__('Do you want to enable n in header ?', 'boilerplate'),
            'section' => 'xs_header_settings_section',
            'attr'    => ['class' => 'xs_header_builder_switch'],
            'left-choice'  => [
                'no' => esc_html__('No', 'boilerplate'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'boilerplate'),
            ],
        ]);
        
        $this->add_control([
            'id'      => 'header_builder_select_html',
            'section' => 'xs_header_settings_section',
            'type'    => 'html',
            'value'   => '<h2 class="header_builder_edit"><a class="xs_builder_edit_link" style="text-transform: uppercase; color:green; margin: 0 0 10px;"  target="_blank" href="'.esc_url(admin_url('edit.php?post_type=elementskit_template')).'">'. esc_html('Go to Header Builder.'). '</a><h2><h3><a style="text-transform: uppercase; color:#17a2b8" target="_blank" href="https://support.xpeedstudio.com/knowledgebase/customize-carrental-header-and-footer-builder/">'. esc_html__('How to edit header', 'boilerplate'). '</a><h3>',
            'attr'    => ['class' => 'xs_header_builder_html'],
            // 'conditions' => [
            //     [
            //         'control_name'  => 'header_builder_enable',
            //         'operator' => '==',
            //         'value'    => "yes",
            //     ]
            // ],
        ]);
        $this->add_control([
            'id'      => 'header_nav_search_section',
            'type'    => 'switcher',
            'default' => 'right-choice',
            'label'   => esc_html__('Search button show', 'boilerplate'),
            'desc'    => esc_html__('Do you want to show search button in header?', 'boilerplate'),
            'section' => 'xs_header_settings_section',
            'left-choice'  => [
                'no' => esc_html__('No', 'boilerplate'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'boilerplate'),
            ],
        ]);


      
        /*********************************************************
         * banner settings
         *********************************************************/

        $this->add_panel([
            'id'             => 'banner_settings_section',
            'title'          => esc_html__( 'Banner settings', "boilerplate" ),
            'panel'          => 'xs_theme_option_panel',
            'priority'       => 5,

        ]);


        $this->add_section([
            'id'       => 'banner_page_settings',
            'title'    => esc_html__( 'Page banner', "boilerplate" ),
            'panel'    => 'banner_settings_section',

        ]);


        /**
         * page banner control start here
         */

        $this->add_control([
            'id'      => 'page_show_banner',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Show banner?', 'boilerplate'),
            'desc'    => esc_html__('Show or hide the banner', 'boilerplate'),
            'section' => 'banner_page_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'boilerplate'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'boilerplate'),
            ],
        ]);

        $this->add_control([
            'id'      => 'page_show_breadcrumb',
            'type'    => 'switcher',
            'default' => 'right-choice',
            'label'   => esc_html__('Show Breadcrumb?', 'boilerplate'),
            'desc'    => esc_html__('Show or hide the Breadcrumb', 'boilerplate'),
            'section' => 'banner_page_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'boilerplate'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'boilerplate'),
            ],
        ]);

        $this->add_control([
            'id'    => 'page_banner_title',
            'type'  => 'text',
            'label' => esc_html__('Banner Title', 'boilerplate'),
            'section' => 'banner_page_settings',
        ]);

        $this->add_control([
            'id'      => 'banner_page_image',
            'type'    => 'media',
            'section' => 'banner_page_settings',
            'label'   => esc_html__('Banner Background', 'boilerplate'),
        ]);
        $this->add_control([
            'id'       => 'page_banner_title_color',
            'section'  => 'banner_page_settings',
            'type'     => 'color-picker',
            'default' => '#fff',

            'label'    => esc_html__('Title Color', 'boilerplate'),
        ]);
        
        $this->add_control([
            'id'       => 'page_banner_overlay_color',
            'section'  => 'banner_page_settings',
            'type'     => 'rgba-color-picker',
            'label'    => esc_html__('Overlay Color', 'boilerplate'),
        ]);


        /**
         * blog banner panel
         */

        $this->add_section([
            'id'       => 'banner_blog_settings',
            'title'    => esc_html__( 'Blog banner', "boilerplate" ),
            'panel'    => 'banner_settings_section',
        ]);

        /**
         * blog banner control start here
         */

        $this->add_control([
            'id'      => 'blog_show_banner',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Show banner?', 'boilerplate'),
            'desc'    => esc_html__('Show or hide the banner', 'boilerplate'),
            'section' => 'banner_blog_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'boilerplate'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'boilerplate'),
            ],
        ]);

        $this->add_control([
            'id'      => 'blog_show_breadcrumb',
            'type'    => 'switcher',
            'default' => 'right-choice',
            'label'   => esc_html__('Show Breadcrumb?', 'boilerplate'),
            'desc'    => esc_html__('Show or hide the Breadcrumb', 'boilerplate'),
            'section' => 'banner_blog_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'boilerplate'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'boilerplate'),
            ],
        ]);

        $this->add_control([
            'id'    => 'blog_banner_title',
            'type'  => 'text',
            'default' => esc_html__( 'Blog', 'boilerplate' ),
            'label' => esc_html__('Banner Title', 'boilerplate'),
            'section' => 'banner_blog_settings',
        ]);
        
        $this->add_control([
            'id'      => 'banner_blog_image',
            'type'    => 'media',
            'section' => 'banner_blog_settings',
            'label'   => esc_html__('Banner Background', 'boilerplate'),
        ]);


        $this->add_control([
            'id'       => 'banner_title_color',
            'section'  => 'banner_blog_settings',
            'type'     => 'color-picker',
            'default' => '#fff',

            'label'    => esc_html__('Title Color', 'boilerplate'),
        ]);
        
        $this->add_control([
            'id'       => 'banner_overlay_color',
            'section'  => 'banner_blog_settings',
            'type'     => 'rgba-color-picker',
            'label'    => esc_html__('Overlay Color', 'boilerplate'),
        ]);



        /**
         * blog single banner panel
         */

        $this->add_section([
            'id'       => 'banner_blog_single_settings',
            'title'    => esc_html__( 'Blog single banner', "boilerplate" ),
            'panel'    => 'banner_settings_section',
        ]);

        /**
         * blog banner single control start here
         */

        $this->add_control([
            'id'      => 'blog_single_show_banner',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Show banner?', 'boilerplate'),
            'desc'    => esc_html__('Show or hide the banner', 'boilerplate'),
            'section' => 'banner_blog_single_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'boilerplate'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'boilerplate'),
            ],
        ]);

        $this->add_control([
            'id'      => 'blog_single_show_breadcrumb',
            'type'    => 'switcher',
            'default' => 'right-choice',
            'label'   => esc_html__('Show Breadcrumb?', 'boilerplate'),
            'desc'    => esc_html__('Show or hide the Breadcrumb', 'boilerplate'),
            'section' => 'banner_blog_single_settings',
            'left-choice'  => [
                'no' => esc_html__('No', 'boilerplate'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'boilerplate'),
            ],
        ]);

        $this->add_control([
            'id'      => 'banner_blog_single_image',
            'type'    => 'media',
            'section' => 'banner_blog_single_settings',
            'label'   => esc_html__('Banner Background', 'boilerplate'),
        ]);

        $this->add_control([
            'id'       => 'details_banner_title_color',
            'section'  => 'banner_blog_single_settings',
            'type'     => 'color-picker',
            'default' => '#fff',
            'label'    => esc_html__('Title Color', 'boilerplate'),
        ]);
        
        $this->add_control([
            'id'       => 'details_banner_overlay_color',
            'section'  => 'banner_blog_single_settings',
            'type'     => 'rgba-color-picker',
            'label'    => esc_html__('Overlay Color', 'boilerplate'),
        ]);
        

        /***********************************
         * Typography settings here
         ************************************/
        $this->add_section([
            'id'       => 'typography_settings_section',
            'title'    => esc_html__('Style settings', 'boilerplate'),
            'panel'    => 'xs_theme_option_panel',
            'priority' => 0,

        ]);

        /**
         * body background control
         */
        $this->add_control([
            'id'      => 'style_body_bg',
            'label'   => esc_html__('Body background', 'boilerplate'),
            'type'    => 'color-picker',
            'section' => 'typography_settings_section',
            'default' => '#FFFFFF',
        ]);

        /**
         * primary color control
         */
        $this->add_control([
            'id'      => 'style_primary',
            'label'      => esc_html__('Primary color', 'boilerplate'),
            'type'    => 'color-picker',
            'section' => 'typography_settings_section',
            'default' => '#E54220',
        ]);

        /**
         * secondary color control
         */
        $this->add_control([
            'id'      => 'secondary_color',
            'label'      => esc_html__('Secondary color', 'boilerplate'),
            'type'    => 'color-picker',
            'section' => 'typography_settings_section',
            'default' => '#041A57',
        ]);

        /**
         * Control for body Typography Input
         */
        $this->add_control([
            'id'         => 'body_font',
            'section'    => 'typography_settings_section',
            'type'       => 'typography',
            'value'      => [
                'family'         => 'Archivo',
                'weight'         => 400,
                'size'           => 16,
                'line_height'    => 26,
                'color'          => '#404040',
                'letter_spacing' => 0
            ],
            'components' => [
                'family'         => true,
                'size'           => true,
                'line-height'    => true,
                'letter-spacing' => true,
                'weight'         => true,
                'color'          => true,
            ],
            'label'      => esc_html__('Body Typhography', 'boilerplate'),
        ]);

        /**
         * Control for H1 Typography Input
         */
        $this->add_control([
            'id'         => 'heading_font_one',
            'section'    => 'typography_settings_section',
            'type'       => 'typography',
            'value'      => [
                'family'         => 'Poppins',
                'weight'         => 700,
                'size'           => 36,
            ],
            'components' => [
                'family'         => true,
                'size'           => true,
                'line-height'    => true,
                'letter-spacing' => true,
                'weight'         => true,
                'color'          => true,
            ],
            'label'      => esc_html__('Heading H1 Typhography', 'boilerplate'),
        ]);

        /**
         * Control for H2 Typography Input
         */
        $this->add_control([
            'id'         => 'heading_font_two',
            'section'    => 'typography_settings_section',
            'type'       => 'typography',
            'value'      => [
                'family'         => 'Poppins',
                'weight'         => 700,
                'size'           => 30,
            ],
            'components' => [
                'family'         => true,
                'size'           => true,
                'line-height'    => true,
                'letter-spacing' => true,
                'weight'         => true,
                'color'          => true,
            ],
            'label'      => esc_html__('Heading H2 Typhography', 'boilerplate'),
        ]);

        /**
         * Control for H3 Typography Input
         */
        $this->add_control([
            'id'         => 'heading_font_three',
            'section'    => 'typography_settings_section',
            'type'       => 'typography',
            'value'      => [
                'family'         => 'Poppins',
                'weight'         => 700,
                'size'           => 24,
            ],
            'components' => [
                'family'         => true,
                'size'           => true,
                'line-height'    => true,
                'letter-spacing' => true,
                'weight'         => true,
                'color'          => true,
            ],
            'label'      => esc_html__('Heading H3 Typhography', 'boilerplate'),
        ]);

        /**
         * Control for H4 Typography Input
         */
        $this->add_control([
            'id'         => 'heading_font_four',
            'section'    => 'typography_settings_section',
            'type'       => 'typography',
            'value'      => [
                'family'         => 'Poppins',
                'weight'         => 700,
                'size'           => 18,
            ],
            'components' => [
                'family'         => true,
                'size'           => true,
                'line-height'    => true,
                'letter-spacing' => true,
                'weight'         => true,
                'color'          => true,
            ],
            'label'      => esc_html__('Heading H4 Typhography', 'boilerplate'),
        ]);

        /**
         * Control for H5 Typography Input
         */
        $this->add_control([
            'id'         => 'heading_font_five',
            'section'    => 'typography_settings_section',
            'type'       => 'typography',
            'value'      => [
                'family'         => 'Poppins',
                'weight'         => 700,
                'size'           => 16,
            ],
            'components' => [
                'family'         => true,
                'size'           => true,
                'line-height'    => true,
                'letter-spacing' => true,
                'weight'         => true,
                'color'          => true,
            ],
            'label'      => esc_html__('Heading H5 Typhography', 'boilerplate'),
        ]);

        /**
         * Control for H6 Typography Input
         */
        $this->add_control([
            'id'         => 'heading_font_six',
            'section'    => 'typography_settings_section',
            'type'       => 'typography',
            'value'      => [
                'family'         => 'Poppins',
                'weight'         => 700,
                'size'           => 14,
            ],
            'components' => [
                'family'         => true,
                'size'           => true,
                'line-height'    => true,
                'letter-spacing' => true,
                'weight'         => true,
                'color'          => true,
            ],
            'label'      => esc_html__('Heading H6 Typhography', 'boilerplate'),
        ]);


        /**
         * Blog settings here
         */
        $this->add_section([
            'id'       => 'blog_settings_section',
            'title'    => esc_html__('Blog settings', 'boilerplate'),
            'panel'    => 'xs_theme_option_panel',
            'priority' => 10,
        ]);

        /**
         * Blog settings body controls here
         */
        $this->add_control([
            'id'      => 'blog_sidebar',
            'type'    => 'select',
            'value'   => 'right-sidebar',
            'label' => esc_html__('Sidebar', 'boilerplate'),
            'section' => 'blog_settings_section',
            'choices' => [
                'no-sidebar' => esc_html__('No sidebar', 'boilerplate'),
                'left-sidebar' => esc_html__('Left Sidebar', 'boilerplate'),
                'right-sidebar' => esc_html__('Right Sidebar', 'boilerplate'),
            ],
        ]);

        $this->add_control([
            'id'      => 'blog_author_show',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Blog author', 'boilerplate'),
            'desc'    => esc_html__('Do you want to show blog author?', 'boilerplate'),
            'section' => 'blog_settings_section',
            'left-choice'  => [
                'no' => esc_html__('No', 'boilerplate'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'boilerplate'),
            ],
        ]);

        $this->add_control([
            'id'      => 'blog_date_show',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Blog Date Show', 'boilerplate'),
            'desc'    => esc_html__('Do you want to show blog Date?', 'boilerplate'),
            'section' => 'blog_settings_section',
            'left-choice'  => [
                'no' => esc_html__('No', 'boilerplate'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'boilerplate'),
            ],
        ]);

        $this->add_control([
            'id'      => 'blog_category_show',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Category Show', 'boilerplate'),
            'desc'    => esc_html__('Do you want to show blog Category?', 'boilerplate'),
            'section' => 'blog_settings_section',
            'left-choice'  => [
                'no' => esc_html__('No', 'boilerplate'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'boilerplate'),
            ],
        ]);



        /**
         * Blog settings here
         */
        $this->add_section([
            'id'       => 'blog_details_settings_section',
            'title'    => esc_html__('Blog Details settings', 'boilerplate'),
            'panel'    => 'xs_theme_option_panel',
            'priority' => 10,
        ]);

        /**
         * Blog settings body controls here
         */
        $this->add_control([
            'id'      => 'blog_details_sidebar',
            'type'    => 'select',
            'value'   => 'no-sidebar',
            'label' => esc_html__('Sidebar', 'boilerplate'),
            'section' => 'blog_details_settings_section',
            'choices' => [
                'no-sidebar' => esc_html__('No sidebar', 'boilerplate'),
                'left-sidebar' => esc_html__('Left Sidebar', 'boilerplate'),
                'right-sidebar' => esc_html__('Right Sidebar', 'boilerplate'),
            ],
        ]);

        $this->add_control([
            'id'      => 'blog_details_author_show',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Blog author', 'boilerplate'),
            'desc'    => esc_html__('Do you want to show blog author?', 'boilerplate'),
            'section' => 'blog_details_settings_section',
            'left-choice'  => [
                'no' => esc_html__('No', 'boilerplate'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'boilerplate'),
            ],
        ]);

        $this->add_control([
            'id'      => 'blog_details_date_show',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Blog Date Show', 'boilerplate'),
            'desc'    => esc_html__('Do you want to show blog Date?', 'boilerplate'),
            'section' => 'blog_details_settings_section',
            'left-choice'  => [
                'no' => esc_html__('No', 'boilerplate'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'boilerplate'),
            ],
        ]);

        $this->add_control([
            'id'      => 'blog_details_category_show',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Category Show', 'boilerplate'),
            'desc'    => esc_html__('Do you want to show blog Category?', 'boilerplate'),
            'section' => 'blog_details_settings_section',
            'left-choice'  => [
                'no' => esc_html__('No', 'boilerplate'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'boilerplate'),
            ],
        ]);
        $this->add_control([
            'id'      => 'blog_details_Comments_show',
            'type'    => 'switcher',
            'default' => 'yes',
            'label'   => esc_html__('Comments Show', 'boilerplate'),
            'desc'    => esc_html__('Do you want to show blog Comments?', 'boilerplate'),
            'section' => 'blog_details_settings_section',
            'left-choice'  => [
                'no' => esc_html__('No', 'boilerplate'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'boilerplate'),
            ],
        ]);

        $this->add_control([
            'id'      => 'blog_related_post',
            'type'    => 'switcher',
            'default' => 'no',
            'label'      => esc_html__('Blog related post', 'boilerplate'),
            'desc'      => esc_html__('Do you want to show single blog related post?', 'boilerplate'),
            'section' => 'blog_details_settings_section',
            'left-choice'  => [
                'no' => esc_html__('No', 'boilerplate'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'boilerplate'),
            ],
        ]);

        $this->add_control([
            'id'      => 'blog_related_post_number',
            'type'    => 'text',
            'label'   => esc_html__('Related post count', 'boilerplate'),
            'default' => '3',
            'section' => 'blog_details_settings_section',
        ]);


        /**
         * Footer Settings here
         */
        $this->add_section([
            'id'       => 'footer_settings_section',
            'title'    => esc_html__('Footer settings', 'boilerplate'),
            'panel'    => 'xs_theme_option_panel',
            'priority' => 10,
        ]);

        /**
         * Header builder switch here
         */
        $this->add_control([
            'id'      => 'footer_builder_control_enable',
            'type'    => 'switcher',
            'default' => 'no',
            'label'   => esc_html__('Footer builder Enable ?', 'boilerplate'),
            'desc'    => esc_html__('Do you want to enable footer builder ?', 'boilerplate'),
            'section' => 'footer_settings_section',
            'attr'    => ['class' => 'xs_footer_builder_switch'],
            'left-choice'  => [
                'no' => esc_html__('No', 'boilerplate'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'boilerplate'),
            ],
        ]);

        $this->add_control([
            'id'      => 'footer_builder_select_html',
            'section' => 'footer_settings_section',
            'type'    => 'html',
            'value'   => '<h2 class="header_builder_edit"><a class="xs_builder_edit_link" style="text-transform: uppercase; color:green; margin: 0 0 10px;"  target="_blank" href="'.esc_url(admin_url('edit.php?post_type=elementskit_template')).'">'. esc_html('Go to Footer Builder.'). '</a><h2><h3><a style="text-transform: uppercase; color:#17a2b8" target="_blank" href="https://support.xpeedstudio.com/knowledgebase/customize-carrental-header-and-footer-builder/">'. esc_html__('How to edit footer', 'boilerplate'). '</a><h3>',
            'attr'    => ['class' => 'xs_footer_builder_html'],
            // 'conditions' => [
            //     [
            //         'control_name'  => 'footer_builder_control_enable',
            //         'operator' => '==',
            //         'value'    => "yes",
            //     ]
            // ],
        ]);

        /**
         * Footer bg control
         * */
        $this->add_control([
            'id'       => 'footer_bg_color',
            'label'    => esc_html__('Background color', 'boilerplate'),
            'type'     => 'color-picker',
            'section'  => 'footer_settings_section',
            'default'  => '#f8f8fc',
            'desc'     => esc_html__('Footer background color of rgba-color-picker goes here', 'boilerplate'),
        ]);

        /**
         * Footer text control
         * */
        $this->add_control([
            'id'      => 'footer_text_color',
            'label'   => esc_html__('Text color', 'boilerplate'),
            'type'    => 'color-picker',
            'section' => 'footer_settings_section',
            'default' => '#666',
            'desc'    => esc_html__('You can change the text color with rgba color or solid color', 'boilerplate'),
        ]);

        /**
         * Footer link control
         * */
        $this->add_control([
            'id'         => 'footer_link_color',
            'label'      => esc_html__('Link Color', 'boilerplate'),
            'type'       => 'color-picker',
            'section'    => 'footer_settings_section',
            'default'    => '#666',
            'desc'       => esc_html__('You can change the link color with rgba color or solid color', 'boilerplate'),
        ]);

        /**
         * Footer widget title control
         * */
        $this->add_control([
            'id'        => 'footer_widget_title_color',
            'label'     => esc_html__('Widget Title Color', 'boilerplate'),
            'type'      => 'color-picker',
            'section'   => 'footer_settings_section',
            'default'   => '#142355',
            'desc'      => esc_html__('You can change the widget title color with rgba color or solid color', 'boilerplate'),
        ]);

        /**
         * Footer copyright bg control
         * */
        $this->add_control([
            'id'        => 'copyright_bg_color',
            'label'     => esc_html__('Copyright Background Color', 'boilerplate'),
            'type'      => 'color-picker',
            'section'   => 'footer_settings_section',
            'default'   => '#09090a',
            'desc'      => esc_html__('You can change the copyright background color with rgba color or solid color', 'boilerplate'),

        ]);

        /**
         * Footer copyright color control
         * */
        $this->add_control([
            'id'        => 'footer_copyright_color',
            'label'     => esc_html__('Copyright Text Color', 'boilerplate'),
            'type'      => 'color-picker',
            'default'   => '#FFFFFF',
            'section'   => 'footer_settings_section',
            'desc'      => esc_html__('You can change the copyright tet color with rgba color or solid color', 'boilerplate'),
        ]);

        /**
         * Footer copyright text control
         * */
        $this->add_control([
            'id'          => 'footer_copyright',
            'type'        => 'textarea',
            'section'     => 'footer_settings_section',
            'label'       => esc_html__('Copyright text', 'boilerplate'),
            'description' => esc_html__('This text will be shown at the footer of all pages.', 'boilerplate'),
        ]);

        /**
         * Footer spacing top control
         * */
        $this->add_control([
            'id'          => 'footer_padding_top',
            'label'       => esc_html__('Footer Padding Top', 'boilerplate'),
            'description' => esc_html__('Use Footer Padding Top', 'boilerplate'),
            'type'        => 'text',
            'section'     => 'footer_settings_section',
            'default'     => '100px',
        ]);

        /**
         * Footer spaceing bottom control
         * */
        $this->add_control([
            'id'          => 'footer_padding_bottom',
            'label'	      => esc_html__( 'Footer Padding Bottom', 'boilerplate' ),
            'description' => esc_html__( 'Use Footer Padding Bottom', 'boilerplate' ),
            'type'        => 'text',
            'section'     => 'footer_settings_section',
            'default'     => '100px',
        ]);


    }
}
