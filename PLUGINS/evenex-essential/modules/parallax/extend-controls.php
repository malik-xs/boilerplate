<?php

namespace Elementor;

class ElementsKit_Extend_Parallax{
    public function __construct()
    {
        add_action('elementor/element/section/section_effects/after_section_end', array( $this, 'after_section_end' ), 10, 2);
        add_action('elementor/frontend/section/after_render', array($this, 'after_section_render'), 10, 2);
    }

    

    public function after_section_end($control, $args)
    {
        $control->start_controls_section(
            'ekit_section_parallax',
            array(
                'label' => esc_html__('Parallax Effects', 'boilerplate'),
                'tab' => Controls_Manager::TAB_ADVANCED,
            )
        );
        $control->add_control(
            'ekit_section_parallax_bg',
            [
                'label' => esc_html__('Background Image Parallax', 'boilerplate'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'boilerplate'),
                'label_off' => esc_html__('Hide', 'boilerplate'),
                'render_type' => 'none',
				'frontend_available' => true,
            ]
        );
        $control->add_control(
            'ekit_section_parallax_bg_speed', [
                'label' => esc_html__('Speed', 'boilerplate'),
                'type' => Controls_Manager::NUMBER,
                'max' => .9,
                'min' => .1,
                'step' => .1,
                'default' => 0.5,
                'condition' => [
                    'ekit_section_parallax_bg' => 'yes',
                ]
            ]
        );

        $control->add_control(
            'ekit_section_parallax_multi',
            array(
                'label' => esc_html__('Multi Item Parallax', 'boilerplate'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'boilerplate'),
                'label_off' => esc_html__('Hide', 'boilerplate'),
            )
        );
        $repeater = new Repeater();
        $repeater->add_control(
            'parallax_style',  [
            'label' => esc_html__('Effect Type', 'boilerplate'),
            'type' => Controls_Manager::SELECT,
            'default' => 'animation',
            'options' => [
                'animation' => esc_html__('Css Animation', 'boilerplate'),
                'mousemove' => esc_html__('Mouse Move', 'boilerplate'),
                'onscroll' => esc_html__('On Scroll', 'boilerplate'),
                'tilt' => esc_html__('Parallax Tilt', 'boilerplate'),
            ],
        ]
        );
        $repeater->add_control(
            'item_source',
            [
                'label' => esc_html__( 'Item source', 'boilerplate' ),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'toggle' => false,
                'default' => 'image',
                'options' => [
                    'image' => [
                        'title' => 'Image',
                        'icon' => 'eicon-image',
                    ],
                    'shape' => [
                        'title' => 'Shape',
                        'icon' => 'eicon-divider-shape',
                    ],
                ],
                'classes' => 'elementor-control-start-end',
                'render_type' => 'ui',

            ]
        );
        $repeater->add_control(
            'image',[
                'label' => esc_html__('Choose Image', 'boilerplate'),
                'type' => Controls_Manager::MEDIA,
                'condition' => [
                    'item_source' => 'image',
                ],
            ]
        );

        $repeater->add_control(
            'shape',  [
                'label' => esc_html__('Choose Shape', 'boilerplate'),
                'type' => Controls_Manager::SELECT,
                'default' => 'angle',
                'options' => [
                    'angle' => esc_html__('Shape 1', 'boilerplate'),
                    'double_stroke' => esc_html__('Shape 2', 'boilerplate'),
                    'fat_stroke' => esc_html__('Shape 3', 'boilerplate'),
                    'fill_circle' => esc_html__('Shape 4', 'boilerplate'),
                    'round_triangle' => esc_html__('Shape 5', 'boilerplate'),
                    'single_stroke' => esc_html__('Shape 6', 'boilerplate'),
                    'stroke_circle' => esc_html__('Shape 7', 'boilerplate'),
                    'triangle' => esc_html__('Shape 8', 'boilerplate'),
                    'zigzag' => esc_html__('Shape 9', 'boilerplate'),
                    'zigzag_2' => esc_html__('Shape 10', 'boilerplate'),
                    'shape_1' => esc_html__('Shape 11', 'boilerplate'),
                    'shape_2' => esc_html__('Shape 12', 'boilerplate'),
                    'shape_3' => esc_html__('Shape 13', 'boilerplate'),
                    'shape_4' => esc_html__('Shape 14', 'boilerplate'),
                ],
                'condition' => [
                    'item_source' => 'shape',
                ]
            ]
        );

        $repeater->add_control(
             'shape_color',
            [
                'label' => esc_html__( 'Color', 'boilerplate' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                    'item_source' => 'shape',
                ],
                'selectors' => [
                    "{{WRAPPER}} {{CURRENT_ITEM}} .elementskit-parallax-graphic" => 'fill: {{VALUE}}; stroke: {{VALUE}};',
                ],
            ]
        );

        $repeater->add_responsive_control(
            'width_type',
            [
                'label' => esc_html__( 'Width', 'boilerplate' ),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__( 'Auto', 'boilerplate' ),
                    'custom' => esc_html__( 'Custom', 'boilerplate' ),
                ],

            ]
        );

        $repeater->add_responsive_control(
            'custom_width',
            [
                'label' => esc_html__( 'Custom Width', 'boilerplate' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'max' => 100,
                        'step' => 1,
                    ],
                ],
                'condition' => [
                    'width_type' => 'custom',
                ],
                'device_args' => [
                    Controls_Stack::RESPONSIVE_TABLET => [
                        'condition' => [
                            'ekit_prlx_width_tablet' => [ 'custom' ],
                        ],
                    ],
                    Controls_Stack::RESPONSIVE_MOBILE => [
                        'condition' => [
                            'ekit_prlx_width_mobile' => [ 'custom' ],
                        ],
                    ],
                ],
                'size_units' => [ 'px', '%', 'vw' ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .elementskit-parallax-graphic' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $repeater->add_responsive_control(
            'source_rotate', [
                'label' => esc_html__('Rotate', 'boilerplate'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['deg'],
                'range' => [
                    'deg' => [
                        'min' => -180,
                        'max' => 180,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'deg',
                    'size' => 0,
                ],
                'selectors' => [
                    "{{WRAPPER}} {{CURRENT_ITEM}} .elementskit-parallax-graphic" => 'transform: rotate({{SIZE}}{{UNIT}})',
                ],

            ]
        );

        $repeater->add_responsive_control(
            'pos_x', [
                'label' => esc_html__('Position X (%)', 'boilerplate'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['%','px'],
                'range' => [
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 10,
                ],
                'selectors' => [
                    "{{WRAPPER}} {{CURRENT_ITEM}}.ekit-section-parallax-layer" => 'left: {{SIZE}}{{UNIT}}',
                ],

            ]
        );

        $repeater->add_responsive_control(
            'pos_y',[
                'label' => esc_html__('Position Y (%)', 'boilerplate'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['%','px'],
                'range' => [
                    '%' => [
                        'min' => -100,
                        'max' => 200,
                    ],
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 10,
                ],
                'selectors' => [
                    "{{WRAPPER}} {{CURRENT_ITEM}}.ekit-section-parallax-layer" => 'top: {{SIZE}}{{UNIT}}',

                ],

            ]
        );
        $repeater->add_responsive_control(
            'animation',
            [
                'label' => esc_html__( 'Animation', 'boilerplate' ),
                'type' => Controls_Manager::SELECT2,
                'frontend_available' => true,
                'default' => 'ekit-fade',
                'options' => [
                    'ekit-fade'=> 'Fade',
                    'ekit-rotate'=> 'Rotate',
                    'ekit-bounce'=> 'Bounce',
                    'ekit-zoom'=> 'Zoom',
                    'ekit-rotate-box'=> 'RotateBox',
                    'ekit-left-right'=> 'Left Right',
                    'bounce'=> 'Bounce 2',
                    'flash'=> 'Flash',
                    'pulse'=> 'Pulse',
                    'shake'=> 'Shake',
                    'headShake'=> 'HeadShake',
                    'swing'=> 'Swing',
                    'tada'=> 'Tada',
                    'wobble'=> 'Wobble',
                    'jello'=> 'Jello',
                ],
                'condition' => [
                    'parallax_style' => 'animation',
                ],
                'selectors' => [
                    "{{WRAPPER}} {{CURRENT_ITEM}}" => '-webkit-animation-name:{{UNIT}}',
                    "{{WRAPPER}} {{CURRENT_ITEM}}" => 'animation-name:{{UNIT}}',
                ],
            ]
        );
        $repeater->add_control(
            'item_opacity',
            [
                'label' => esc_html__( 'Opacity', 'boilerplate' ),
                'description' => esc_html__( 'Opacity will be (0-1), default value 1', 'boilerplate' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '1',
                'min' => 0,
                'step' => 1,
                'render_type' => 'none',
                'frontend_available' => true,
                'selectors' => [
                    "{{WRAPPER}} {{CURRENT_ITEM}}" => 'opacity:{{UNIT}}'
                ],
            ]
        );

        $repeater->add_control(
            'animation_speed',
            [
                'label' => esc_html__( 'Animation speed', 'boilerplate' ) . ' (s)',
                'type' => Controls_Manager::NUMBER,
                'default' => '5',
                'min' => 1,
                'step' => 100,
                'render_type' => 'none',
                'frontend_available' => true,
                'condition' => [
                    'parallax_style' => 'animation',
                ],
                'selectors' => [
                    "{{WRAPPER}} {{CURRENT_ITEM}}" => '-webkit-animation-duration:{{UNIT}}s',
                    "{{WRAPPER}} {{CURRENT_ITEM}}" => 'animation-duration:{{UNIT}}s'
                ],
            ]
        );
        $repeater->add_control(
            'animation_iteration_count',
            [
                'label' => esc_html__( 'Animation Iteration Count', 'boilerplate' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'unset',
                'options' => [
                    'infinite' => esc_html__( 'Infinite', 'boilerplate' ),
                    'unset' => esc_html__( 'Unset', 'boilerplate' ),
                ],
                'condition' => [
                    'parallax_style' => 'animation',
                ],
                'selectors' => [
                    "{{WRAPPER}} {{CURRENT_ITEM}}" => 'animation-iteration-count:{{UNIT}}'
                ],
            ]
        );
        $repeater->add_control(
            'animation_direction',
            [
                'label' => esc_html__( 'Animation Direction', 'boilerplate' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'normal',
                'options' => [
                    'normal' => esc_html__( 'Normal', 'boilerplate' ),
                    'reverse' => esc_html__( 'Reverse', 'boilerplate' ),
                    'alternate' => esc_html__( 'Alternate', 'boilerplate' ),
                ],
                'condition' => [
                    'parallax_style' => 'animation',
                ],
                'selectors' => [
                    "{{WRAPPER}} {{CURRENT_ITEM}}" => 'animation-direction:{{UNIT}}'
                ],
            ]
        );

        $repeater->add_control(
            'parallax_speed', [
                'label' => esc_html__('Speed', 'boilerplate'),
                'type' => Controls_Manager::NUMBER,
                'default' => esc_html__('100', 'boilerplate'),
                'condition' => [
                    'parallax_style' => 'mousemove',
                ]
            ]
        );

        $repeater->add_control(
            'parallax_transform', [
                'label' => esc_html__( 'Parallax style', 'boilerplate' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'translateY',
                'options' => [
                    'translateX' => esc_html__( 'X axis', 'boilerplate' ),
                    'translateY' => esc_html__( 'Y axis', 'boilerplate' ),
                    'rotate' => esc_html__( 'rotate', 'boilerplate' ),
                    'rotateX' => esc_html__( 'rotateX', 'boilerplate' ),
                    'rotateY' => esc_html__( 'rotateY', 'boilerplate' ),
                    'scale' => esc_html__( 'scale', 'boilerplate' ),
                    'scaleX' => esc_html__( 'scaleX', 'boilerplate' ),
                    'scaleY' => esc_html__( 'scaleY', 'boilerplate' ),
                ],
                'condition' => [
                    'parallax_style' => 'onscroll'
                ],
            ]
        );
        $repeater->add_control(
            'parallax_transform_value', [
                'label' => esc_html__( 'Parallax Transition ', 'boilerplate' ),
                'description' => esc_html__( 'X, Y and Z Axis will be pixels, Rotate will be degrees (0-180), scale will be ratio', 'boilerplate' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '250',
                'condition' => [
                    'parallax_style' => 'onscroll'
                ]
            ]
        );
        $repeater->add_control(
            'smoothness', [
                'label' => esc_html__( 'Smoothness', 'boilerplate' ),
                'description' => esc_html__( 'factor that slowdown the animation, the more the smoothier (default: 700)', 'boilerplate' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '700',
                'min' => 0,
                'max' => 1000,
                'step' => 100,
                'condition' => [
                    'parallax_style' => 'onscroll'
                ]
            ]
        );
        $repeater->add_control(
            'offsettop',[
                'label' => esc_html__( 'Offset Top', 'boilerplate' ),
                'description' => esc_html__( 'default: 0; when the element is visible', 'boilerplate' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '0',
                'condition' => [
                    'parallax_style' => 'onscroll'
                ]
            ]
        );
        $repeater->add_control(
            'offsetbottom', [
                'label' => esc_html__( 'Offset Bottom', 'boilerplate' ),
                'description' => esc_html__( 'default: 0; when the element is visible', 'boilerplate' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '0',
                'condition' => [
                    'parallax_style' => 'onscroll'
                ]
            ]
        );
        $repeater->add_control(
            'maxtilt',[
                'label' => esc_html__( 'MaxTilt', 'boilerplate' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '20',
                'condition' => [
                    'parallax_style' => 'tilt',
                ]
            ]
        );
        $repeater->add_control(
            'scale',[
                'label' => esc_html__( 'Image Scale', 'boilerplate' ),
                'description' => esc_html__( '2 = 200%, 1.5 = 150%, etc.. Default 1', 'boilerplate' ),
                'type' => Controls_Manager::NUMBER,
                'default' => '1',
                'condition' => [
                    'parallax_style' => 'tilt',
                ]
            ]
        );
        $repeater->add_control(
            'disableaxis', [
                'label' => esc_html__( 'Disable Axis', 'boilerplate' ),
                'description' => esc_html__( 'What axis should be disabled. Can be X or Y.', 'boilerplate' ),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__( 'None', 'boilerplate' ),
                    'x' => esc_html__( 'X axis', 'boilerplate' ),
                    'y' => esc_html__( 'Y axis', 'boilerplate' ),
                ],

                'condition' => [
                    'parallax_style' => 'tilt',
                ]
            ]
        );
        $repeater->add_control(
            'zindex',   [
                'label' => esc_html__('Z-index', 'boilerplate'),
                'type' => Controls_Manager::NUMBER,
                'default' => esc_html__('2', 'boilerplate'),
                'selectors' => [
                    "{{WRAPPER}} {{CURRENT_ITEM}}" => 'z-index: {{UNIT}}',
                ],
            ]
        );
        $control->add_control(
            'ekit_section_parallax_multi_items',
            [
                'label' => esc_html__( 'Parallax', 'boilerplate' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ parallax_style }}}',
                'condition' => [
                    'ekit_section_parallax_multi' => 'yes'
                ],

            ]
        );

        $control->end_controls_section();
    }

    public function after_section_render(Element_Base $element)
    {
        $data     = $element->get_data();
        $settings = $data['settings'];
        // d($settings);
        
        if  (
                (isset($settings['ekit_section_parallax_multi']) && $settings['ekit_section_parallax_multi'] == 'yes') || 
                (isset($settings['ekit_section_parallax_bg']) && $settings['ekit_section_parallax_bg'] == 'yes')
            ){

            echo "
            <script>
                window.elementskit_section_parallax_data.section".$data['id']." = JSON.parse('".json_encode($settings)."');
            </script>
            ";
        }
    }

}