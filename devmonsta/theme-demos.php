<?php

function boilerplate_import_files_theme() {
    return [
        [
            'id'                       => '1',
            'import_title'             => 'Default',
            'import_file_url'          => BOILERPLATE_REMOTE_CONTENT . '/default/f.xml',
            'import_preview_image_url' => BOILERPLATE_REMOTE_CONTENT . '/default/screenshot.jpg',
            'required_plugin'          => [
                [
                    "slug"  => "elementor"
                ],
                [
                    "slug" => "elementskit-lite",
                ],
                [
                    "slug" => "metform",
                ],
                [
                    "slug" => "advanced-custom-fields",
                ],
                [
                    'slug'   => 'advanced-custom-fields-pro',
                    'source' => esc_url( BOILERPLATE_REMOTE_CONTENT . '/plugins/advanced-custom-fields-pro.zip' ),
                ],
                [
                    'slug'   => 'devmonsta',
                ],
                [
                    'slug'   => 'boilerplate-essential',
                    'source' => esc_url( BOILERPLATE_REMOTE_CONTENT . '/plugins/boilerplate-essential.zip' ),
                ],
            ],
        ],
        
    ];
}
// add_filter( 'devm_import_demo_files', 'boilerplate_import_files_theme' );