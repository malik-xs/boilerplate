<?php
   $boilerplate_class = '';

   if( defined('DEVM') ){
      $header_nav_search_section = boilerplate_option('header_nav_search_section');
   
   }else{
      $header_nav_search_section = 'no';
   }
?>

<header id="header" class="header header-classic header-main">
   <div class="container">
      <nav class="navbar navbar-expand-lg">

      <?php

      if( function_exists( 'the_custom_logo' ) ) { 
         if(has_custom_logo()) {
            ?>
            <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
               <?php
                  the_custom_logo();
               ?> 
            </a>
            <?php }else{ ?>  
               <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
                  <img src="<?php echo esc_url(boilerplate_src('custom_logo',BOILERPLATE_IMG . '/logo.png')); ?>" alt="<?php esc_attr(bloginfo('name')); ?>"> 
               </a>
            <?php } ?> 
      <?php } ?>  
   
         <button class="navbar-toggler p-0 border-0" type="button" data-toggle="collapse" data-target="#primary-nav" aria-controls="primary-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="header-navbar-toggler-icon"></span>
            <span class="header-navbar-toggler-icon"></span>
            <span class="header-navbar-toggler-icon"></span>
         </button>

         <?php get_template_part( 'template-parts/navigations/nav', 'primary' ); ?>

         <?php if( $header_nav_search_section == 'yes'){ ?>
         <div class="nav-search-area">
            <div class="header-search-icon">
               <span class="nav-search-button"><i class="xts-icon xts-search"></i></span>
            </div>
            <?php get_search_form(); ?>
         </div>
         <?php }; ?>
      </nav>
   </div><!-- container end-->
</header>