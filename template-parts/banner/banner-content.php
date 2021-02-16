<?php
$banner_image = $args['banner-image'];
$banner_title = $args['banner-title'];
$show_breadcrumb = $args['show-breadcrumb'];
$class_name = $args['class-name'];
?>

<section class="xs-banner banner-single <?php echo esc_attr($class_name); ?> <?php echo esc_attr($banner_image == ''?'banner-solid':'banner-bg'); ?>" style="background-image: url(<?php echo esc_attr( $banner_image ); ?>)">
    <div class="container">
        <div class="d-flex align-items-center banner-area">
            <div class="row">
                <div class="col-12">
                    <h1 class="banner-title">
                        <?php
                           if(is_archive()){
                              the_archive_title();
                            } elseif(is_single()){
                                the_title();
                            } else {
                                echo esc_html( $banner_title );
                           }
                        ?>
                     </h1>
                </div>
            </div>
        </div>
        <?php
        if( $show_breadcrumb == 'yes' ){
            boilerplate_get_breadcrumbs();
        }
        ?>
    </div>
</section>