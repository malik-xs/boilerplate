<?php

if ( defined( 'DEVM' ) ) {
   // Body Bg
   $style_body_bg     = boilerplate_option('style_body_bg', '#FFF');

   // Primary color
   $style_primary     = boilerplate_option('style_primary', '#f94743');

   // Secondary color
   $style_secondary     = boilerplate_option('style_secondary', '#ff7c49');

   // Title color
   $title_color     = boilerplate_option('title_color', '#101010');

   // details banner title color
   $details_banner_title_color     = boilerplate_option('details_banner_title_color');
   $details_banner_overlay_color     = boilerplate_option('details_banner_overlay_color');

   // blog banner 
   $banner_title_color     = boilerplate_option('banner_title_color');
   $banner_overlay_color     = boilerplate_option('banner_overlay_color');

   // page banner 
   $page_banner_title_color     = boilerplate_option('page_banner_title_color');
   $page_banner_overlay_color     = boilerplate_option('page_banner_overlay_color');




   // Footer color
   $footer_bg_color     = boilerplate_option('footer_bg_color');
   $footer_text_color          = boilerplate_option('footer_text_color');
   $footer_link_color          = boilerplate_option('footer_link_color');
   $footer_widget_title_color  = boilerplate_option('footer_widget_title_color');
   $copyright_bg_color         = boilerplate_option('copyright_bg_color');
   $footer_copyright_color     = boilerplate_option('footer_copyright_color');
   $footer_padding_top         = boilerplate_option('footer_padding_top');
   $footer_padding_bottom      = boilerplate_option('footer_padding_bottom');


   // all typography
   $global_body_font = boilerplate_option( 'body_font' );

   Boilerplate_DEVM_Google_Fonts::add_typography_v2( $global_body_font );
   $body_font = boilerplate_advanced_font_styles( $global_body_font );

   $heading_font_one = boilerplate_option( 'heading_font_one' );
   Boilerplate_DEVM_Google_Fonts::add_typography_v2( $heading_font_one );
   $heading_font_one = boilerplate_advanced_font_styles( $heading_font_one );

   $heading_font_two = boilerplate_option( 'heading_font_two' );
   Boilerplate_DEVM_Google_Fonts::add_typography_v2( $heading_font_two );
   $heading_font_two = boilerplate_advanced_font_styles( $heading_font_two );

   $heading_font_three = boilerplate_option( 'heading_font_three' );
   Boilerplate_DEVM_Google_Fonts::add_typography_v2( $heading_font_three );
   $heading_font_three = boilerplate_advanced_font_styles( $heading_font_three );

   $heading_font_four = boilerplate_option( 'heading_font_four' );
   Boilerplate_DEVM_Google_Fonts::add_typography_v2( $heading_font_four );
   $heading_font_four = boilerplate_advanced_font_styles( $heading_font_four );

   $heading_font_five = boilerplate_option( 'heading_font_five' );
   Boilerplate_DEVM_Google_Fonts::add_typography_v2( $heading_font_five );
   $heading_font_five = boilerplate_advanced_font_styles( $heading_font_five );

   $heading_font_six = boilerplate_option( 'heading_font_six' );
   Boilerplate_DEVM_Google_Fonts::add_typography_v2( $heading_font_six );
   $heading_font_six = boilerplate_advanced_font_styles( $heading_font_six );


   $custom_css = "
      h1{
         $heading_font_one
      }
      h2{
            $heading_font_two
      }
      h3{
            $heading_font_three
      }
      h4{
            $heading_font_four
      }
      h5{
            $heading_font_five
      }
      h6{
            $heading_font_six
      }
      body{
         background:{$style_body_bg };
         $body_font
      }
      .logo-area .site-title a , .logo-area .site-desc{
         color:$style_primary;
      }

      .post .entry-header .entry-title a:hover,
      .sidebar ul li a:hover, .xs-footer-section ul li a:hover,
      .post-meta a:hover,
      .header .navbar-light .navbar-nav li a:hover {
         color:  {$style_primary};
      }
      .tag-lists a:hover, .tagcloud a:hover,
      .sticky.post .meta-featured-post,
      .widget-title:before,
      .xs-custom-widget > h5:before,
      .block-title.title-border .title-bg,
      .block-title.title-border .title-bg::before ,
      .owl-next, .owl-prev,
      .header .navbar-light .navbar-nav>li.active>a:before,
      .main-slider .owl-prev.disabled,
      .owl-dots:before,
      .featured-tab-item .nav-tabs .nav-link.active:before,
      .owl-theme .owl-dots .owl-dot.active span,
      .ts-footer .widget-title:before,
      .main-slider .owl-next:hover, .main-slider .owl-prev:hover,
      .sidebar .widget.widget_search .input-group-btn, .xs-footer-section .widget.widget_search .input-group-btn,
      .xs-search-group .search-button,
      .banner-solid,
      .pagination li.active a,
      .wp-block-button:not(.is-style-outline) .wp-block-button__link,
      .wp-block-button .wp-block-button__link:not(.has-background),
      .wp-block-file .wp-block-file__button,
      .back_to_top > a,
      .post .meta-featured-post::after {
         background:{$style_primary};
      }
      .post .meta-featured-post::before {
         border-top-color: $style_primary;
         border-left-color: $style_primary;
         border-right-color: $style_primary;
      }
      .xs-search-group .search-button:hover,
      .pagination li.active a:hover,
      .wp-block-button:not(.is-style-outline) .wp-block-button__link:hover,
      .wp-block-file .wp-block-file__button:hover {
         background:{$style_secondary};
      }
      .header-btn {
         background: linear-gradient(90deg,$style_primary 0,$style_secondary 100%);
      }
      .header-btn::before {
         box-shadow: 0 15px 25px 0 $style_primary;
      }
      .is-style-outline .wp-block-button__link:hover,
      .wp-block-button.is-style-outline .wp-block-button__link:active:not(.has-text-color):hover,
      .wp-block-button.is-style-outline .wp-block-button__link:focus:not(.has-text-color):hover,
      .wp-block-button.is-style-outline .wp-block-button__link:not(.has-text-color):hover,
      .breadcrumb>li a:hover {
         color: {$style_secondary};
      }
      .wp-block-button.is-style-outline .wp-block-button__link:active:not(.has-text-color),
      .wp-block-button.is-style-outline .wp-block-button__link:focus:not(.has-text-color),
      .wp-block-button.is-style-outline .wp-block-button__link:not(.has-text-color),
      .navbar-nav .nav-link:hover,
      .dropdown-item.active,
      .dropdown-item:active,
      .navbar-nav .dropdown-menu li:hover>a,
      .xs-recent-post-widget .widget-post .entry-title>a:hover {
         color: {$style_primary};
      }
      .tag-lists a:hover, .tagcloud a:hover,
      .owl-theme .owl-dots .owl-dot.active span{
         border-color: {$style_primary};
      }
      .block-title.title-border .title-bg::after{
         border-left-color: {$style_primary};
      }
      .block-title.title-border{
         border-bottom-color: {$style_primary};
      }
      .banner-title, .xs-jumbotron-title{
         color: {$banner_title_color};
      }
      .xs-banner:before{
         background-color: {$banner_overlay_color};
      }

      .details-banner .banner-title{
         color: {$details_banner_title_color};
      }
      .details-banner:before{
         background-color: {$details_banner_overlay_color};
      }

      .page-banner .banner-title{
         color: {$page_banner_title_color};
      }
      .page-banner:before{
         background-color: {$page_banner_overlay_color};
      }

      .comments-list .comment-author a:hover,
      .comments-list .comment-reply-link:hover,
      .post-title a:hover,
      .copyright-area a:hover,
      .featured-tab-item .nav-tabs .nav-link.active .tab-head>span.tab-text-title,
      .social-links li a:hover,
      .comment-author cite a:hover {
         color:{$style_primary};
      }
      .btn-primary,
      .xs-btn {
         background:  $style_primary;
      }
      .sidebar .widget .widget-title:before {
         background: $style_primary;
      }


      .xs-footer{
         background-color:   $footer_bg_color;
         padding-top: $footer_padding_top;
         padding-bottom: $footer_padding_bottom;
      }
      .xs-footer .footer-widget,
      .xs-footer .footer-widget li,
      .xs-footer .footer-widget p{
         color: $footer_text_color;
      }

      .xs-footer .footer-widget a{
         color: $footer_link_color;
      }
      .xs-footer .widget-title{
         color: $footer_widget_title_color;
      }
      .copy-right{
         background-color:   $copyright_bg_color;
      }
      .copyright-text{
         color: $footer_copyright_color;
      }

   
      ";
   wp_add_inline_style( 'boilerplate-master', $custom_css );
}
