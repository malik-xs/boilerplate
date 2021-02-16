<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * recent post widget
 */
class Boilerplate_Recent_Event extends WP_Widget {

    function __construct() {

        $widget_opt = array(
            'classname'		 => 'Boilerplate-widget-event',
            'description'	 => esc_html__('Boilerplate recent event','boilerplate')
        );

        parent::__construct( 'xs-recent-event', esc_html__( 'Boilerplate recent event', 'boilerplate' ), $widget_opt );
    }

    function widget( $args, $instance ) {

        global $wp_query;

        echo wp_kses_post($args[ 'before_widget' ]);

        if ( !empty( $instance[ 'title' ] ) ) {

            echo wp_kses_post($args[ 'before_title' ]) . apply_filters( 'widget_title', $instance[ 'title' ] ) . wp_kses_post($args[ 'after_title' ]);
        }

        if ( !empty( $instance[ 'number_of_posts' ] ) ) {
            $no_of_post = $instance[ 'number_of_posts' ];
        } else {
            $no_of_post = 3;
        }


        $query = array(
            'post_type'		 => array( 'event' ),
            'post_status'	 => array( 'publish' ),
            'orderby'		 => 'date',
            'order'			 => 'DESC',
            'posts_per_page' => $no_of_post
        );

        $loop = new WP_Query( $query );
        ?>
        <div class="widget-posts">
            <?php
            if ( $loop->have_posts() ):
                while ( $loop->have_posts() ):
                    $loop->the_post();
                    ?>
                    <div class="widget-post">
                        <div class="media">
                            <div class="event-time">
                                 <span><?php echo get_the_time( 'd' ); ?></span>
                                 <span><?php echo get_the_time( 'M' ); ?></span>
                            </div>
                            <div class="post-content media-body">
                                <h4 class="entry-title">
                                    <a href="<?php echo get_the_permalink(); ?>" ><?php echo get_the_title();?></a>
                                </h4>
                                <div class="address">
                                    <?php echo esc_html(boilerplate_meta_option( get_the_ID(), 'cpt_event_address' )); ?>
                                </div>
                            </div>

                        </div>
                    </div>

                <?php endwhile; ?>
            <?php else: ?>
                <div class="nopost_message">
                    <p><?php echo esc_html__( 'No post avainable', 'boilerplate' ) ?></p>';
                </div>
            <?php endif; ?>
        </div>
        <?php
        wp_reset_postdata();
        echo wp_kses_post($args[ 'after_widget' ]);
    }

    function update( $new_instance, $old_instance ) {

        $old_instance[ 'title' ]			 = strip_tags( $new_instance[ 'title' ] );
        $old_instance[ 'number_of_posts' ] = $new_instance[ 'number_of_posts' ];

        return $old_instance;
    }

    function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        } else {
            $title = esc_html__( 'Latest Updates', 'boilerplate' );
        }
        if ( isset( $instance[ 'number_of_posts' ] ) ) {
            $no_of_post = $instance[ 'number_of_posts' ];
        } else {
            $no_of_post = 4;
        }
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'boilerplate' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'number_of_posts' ) ); ?>"><?php esc_html_e( 'Number of posts:', 'boilerplate' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number_of_posts' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number_of_posts' ) ); ?>" type="text" value="<?php echo esc_attr( $no_of_post ); ?>" />
        </p>
        <?php
    }

}
