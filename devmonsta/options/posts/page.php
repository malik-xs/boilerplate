<?php

use Devmonsta\Libs\Posts;

class Page extends Posts
{

    public function register_controls()
    {
        $this->add_box([
            'id' => 'page_post_meta',
            'post_type' => 'page',
            'title' => esc_html__('Page Settings', 'boilerplate'),
        ]);
        /**
         * control for text input
         */

        $this->add_control( [
            'box_id' => 'page_post_meta',
            'type'   => 'switcher',
            'name'   => 'page_meta_show_banner',
            'value'  => 'yes',
            'label'  => esc_html__('Show banner?', 'boilerplate'),
            'desc'   => esc_html__('Show or hide the banner', 'boilerplate'),
            'left-choice'  => [
                'no' => esc_html__('No', 'boilerplate'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'boilerplate'),
            ],
        ]);

        $this->add_control( [
            'box_id' => 'page_post_meta',
            'type'   => 'switcher',
            'name'   => 'page_meta_show_breadcumb',
            'value'  => 'yes',
            'label'  => esc_html__('Show Breadcumb?', 'boilerplate'),
            'desc'   => esc_html__('Show or hide the breadcumb', 'boilerplate'),
            'left-choice'  => [
                'no' => esc_html__('No', 'boilerplate'),
            ],
            'right-choice' => [
                'yes' => esc_html__('Yes', 'boilerplate'),
            ],
        ]);

        $this->add_control([
            'box_id' => 'page_post_meta',
            'type'   => 'text',
            'name'   => 'header_title',
            'desc'   => esc_html__('Add your Page hero title', 'boilerplate'),
            'label'  => esc_html__('Banner Title', 'boilerplate'),
        ]);

        $this->add_control([
            'box_id' => 'page_post_meta',
            'type'   => 'upload',
            'name'   => 'header_image',
            'desc'   => esc_html__('Upload a page header image', 'boilerplate'),
            'label'  => esc_html__('Banner image', 'boilerplate'),
        ]);
    }
}
