
<?php
/**
 * the template for displaying 404 pages (Not Found)
 */

get_header();
get_template_part( 'template-parts/banner/content', 'banner-blog' );
?>
<section id="main-container" class="blog main-container">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 mx-auto">
                  <div class="error-page text-center">
                     <div class="error-code">
                        <strong><?php esc_html_e('404', 'boilerplate'); ?></strong>
                     </div>
                     <div class="error-message">
                        <h3><?php esc_html_e('Oops... Page Not Found!', 'boilerplate'); ?></h3>
                     </div>
                     <div class="error-body">
                        <?php esc_html_e('Try using the button below to go to main page of the site', 'boilerplate'); ?> <br>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary solid blank"><i class="xts-icon xts-chevron-left"> </i> <?php esc_html_e('Back to Home Page', 'boilerplate'); ?></a>
                     </div>
                  </div>
               </div>
            </div><!-- Content row -->
         </div><!-- Container end -->
      </section><!-- Main container end -->

<?php get_footer(); ?>