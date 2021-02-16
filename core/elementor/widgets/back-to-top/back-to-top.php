<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Boilerplate_BackTo extends Widget_Base {


  public $base;

    public function get_name() {
        return 'boilerplate-back-to-top';
    }

    public function get_title() {

        return esc_html__( 'Boilerplate Back To Top', 'boilerplate' );

    }

    public function get_icon() {
        return 'eicon-spacer';
    }

    public function get_categories() {
        return [ 'boilerplate-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('back to top settings', 'boilerplate'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


		$this->add_control(
			'backto_button_icon',
			[
				'label' => esc_html__( 'Select Icon', 'boilerplate' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-sort-up',
				]
			]
        );


    $this->start_controls_tabs( 'boilerplate_tabs_styled' );

    $this->start_controls_tab(
        'tab_style_normal',
        [
            'label' => esc_html__( 'Button Normal', 'boilerplate' ),
        ]
    );

    $this->add_control(
        'backto_button_color',
        [
            'label' => esc_html__('Button color', 'boilerplate'),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .xs-scroll-box .BackTo' => 'color: {{VALUE}};',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Background::get_type(),
        [
            'name' => 'backto_button_bg_color',
            'label' => esc_html__('Backto BG color', 'boilerplate'),
            'types' => [ 'classic', 'gradient' ],
            'selector' => '{{WRAPPER}} .xs-scroll-box .BackTo',
        ]
    );

    $this->add_responsive_control(
        'backto_border_radius',
        [
            'label' => esc_html__( 'Border Radius', 'boilerplate' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}} .xs-scroll-box .BackTo' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
      );

      $this->add_control(
        'backto_width_height',
        [
            'label' => esc_html__( 'Size', 'boilerplate' ),
            'type' => Controls_Manager::SLIDER,
            'selectors' => [
                '{{WRAPPER}} .xs-scroll-box .BackTo' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

      $this->add_control(
        'backto_line_height',
        [
            'label' => esc_html__( 'Line Height', 'boilerplate' ),
            'type' => Controls_Manager::SLIDER,
            'selectors' => [
                '{{WRAPPER}} .xs-scroll-box .BackTo' => 'line-height: {{SIZE}}{{UNIT}};',
            ],
        ]
    );

    $this->add_group_control(
    Group_Control_Border::get_type(),
        [
            'name' => 'backto_border_normal',
            'label' => esc_html__( 'Border', 'boilerplate' ),
            'selector' => '{{WRAPPER}} .xs-scroll-box .BackTo',
        ]
    );

    $this->add_responsive_control(
        'backto_border_padding',
        [
            'label' => esc_html__( 'Button Padding', 'boilerplate' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}} .xs-scroll-box .BackTo' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->end_controls_tab();

    $this->start_controls_tab(
        'tab_style_active',
            [
                'label' =>esc_html__( 'Button Hover', 'boilerplate' ),
            ]
    );

    $this->add_control(
        'backto_button_hov_color',
        [
            'label' => esc_html__('Backto Hover color', 'boilerplate'),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .xs-scroll-box .BackTo:hover' => 'color: {{VALUE}};',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Background::get_type(),
        [
            'name' => 'backto_button_hov_bg_color',
            'label' => esc_html__('Backto Button Hover BG color', 'boilerplate'),
            'types' => [ 'classic', 'gradient' ],
            'selector' => '{{WRAPPER}} .xs-scroll-box .BackTo:hover',
        ]
    );

    $this->add_responsive_control(
        'backto_hov_border_radius',
        [
            'label' => esc_html__( 'Border Radius', 'boilerplate' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', '%', 'em' ],
            'selectors' => [
                '{{WRAPPER}} .xs-scroll-box .BackTo:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_group_control(
        Group_Control_Border::get_type(),
        [
            'name' => 'backto_border_hover',
            'label' => esc_html__( 'Border', 'boilerplate' ),
            'selector' => '{{WRAPPER}} .xs-scroll-box .BackTo:hover',
        ]
    );


    $this->end_controls_tab();
    $this->end_controls_tabs();

    $this->end_controls_section();
    }

    protected function render( ) {
        $settings = $this->get_settings();

        $back_to_top = $settings['backto_button_icon'];
    ?>

    <div class="xs-scroll-box">
        <a href="#" class="BackTo">
            <?php if ("svg" == $back_to_top['library']) { ?>
            <img src="<?php echo esc_attr( $back_to_top['value']['url'] ); ?>" alt="back to top">
            <?php } else { ?>
            <i class="<?php echo esc_attr( $back_to_top['value'] ); ?>"></i>
            <?php } ?>
        </a>
    </div>

    <?php
    }
    protected function _content_template() { }
}