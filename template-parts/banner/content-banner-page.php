<?php
$banner_image             = '';
$banner_title             = '';
$page_show_breadcrumb     = "";
$page_meta_show_breadcumb = "";
$show_breadcrumb          = "";

if ( defined( 'DEVM' ) ) {
    // Banner controls
    $page_show_banner      = boilerplate_option('page_show_banner');
    $page_meta_show_banner = boilerplate_meta_option( get_the_ID(), 'page_meta_show_banner', 'yes' );

    // banner disable enable facility
    if( $page_meta_show_banner != 'yes' ){
        return;
    } elseif ( $page_show_banner != 'yes' ){
        return;
    }

    $page_show_breadcrumb    = boilerplate_option('page_show_breadcrumb');
    $page_banner_title       = boilerplate_option('page_banner_title');
    $banner_page_image       = boilerplate_option('banner_page_image');

    // Meta options
    $banner_image             = boilerplate_meta_option( get_the_ID(), 'header_image' );
    $page_meta_show_breadcumb = boilerplate_meta_option( get_the_ID(), 'page_meta_show_breadcumb' );

    // Customizer Settings
    $boilerplate_page_banner_settings          = boilerplate_option('page_banner_setting');

    //title
    if( boilerplate_meta_option( get_the_ID(), 'header_title' ) !== '' ){
        $banner_title = boilerplate_meta_option( get_the_ID(), 'header_title' );
    } elseif ( $page_banner_title !== '' ){
        $banner_title = $page_banner_title;
    } else {
        $banner_title   = get_the_title();
    }

    //image
    if( $banner_image != '' ){
        $banner_image = wp_get_attachment_image_url($banner_image, "full");
    } elseif ( $banner_page_image != '' ){
        $banner_image = wp_get_attachment_image_url($banner_page_image, "full");
    } else {
        $banner_image = BOILERPLATE_IMG.'/bg_banner.png';
    }

    // Breacumb
    if( $page_meta_show_breadcumb === 'yes' ){
        $show_breadcrumb = "yes";
    } elseif ( $page_show_breadcrumb === 'yes' ){
        $show_breadcrumb = 'yes';
    } else {
        $show_breadcrumb = "";
    }

 }else{
     //default
     $banner_image            = "";
     $banner_title            = get_the_title();
     $show_breadcrumb         = "yes";
 }


 $class_name = 'page-banner';
    
 get_template_part('template-parts/banner/banner', 'content', [
     'banner-image' => $banner_image,
     'banner-title' => $banner_title,
     'show-breadcrumb' => $show_breadcrumb,
     'class-name' => $class_name,
 ]);
?>