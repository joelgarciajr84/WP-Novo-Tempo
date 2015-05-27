<?php

class wp_tv_nt extends WP_Widget {

    function __construct() {
        parent::__construct(
            'wp_tv_nt',
            __('TV Novo Tempo - Ao Vivo', 'wp_nt_text'),
            array(
                'description' => __( 'TV Novo Tempo', 'wp_nt_text' ),
            )
        );
    }

    public function widget( $args, $instance ) {

        $title = apply_filters( 'widget_title', $instance['title'] );

        echo $args['before_widget'];
        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];?>
        <div>

            <div class="nt-player">
                <div class="station">
                    </div>
                   <iframe width="100%" height="300" src="http://www.ustream.tv/embed/16248871?ub=85a901&amp;lc=85a901&amp;oc=ffffff&amp;uc=ffffff&amp;v=3&amp;wmode=direct" scrolling="no" frameborder="0" style="border: 0px none transparent;">    </iframe>
<br /><a href="http://www.ustream.tv" style="font-size: 12px; line-height: 20px; font-weight: normal; text-align: left;" target="_blank"></a>

            </div>

        </div>
        <?php
        echo $args['after_widget'];
    }

    // Widget Backend
    public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
        $title = $instance[ 'title' ];
    }
    else {
        $title = __( 'TV Novo Tempo - Ao Vivo', 'wp_nt_text' );
    }?>

    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php }


    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
}

function wp_load_wp_tv_nt() {
    register_widget( 'wp_tv_nt' );
}