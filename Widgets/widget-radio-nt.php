<?php

class wp_radio_nt extends WP_Widget {

    function __construct() {
        parent::__construct(
            'wp_radio_nt',
            __('Rádio Novo Tempo - Ao Vivo', 'wp_nt_text'),
            array(
                'description' => __( 'Rádio Novo Tempo', 'wp_nt_text' ),
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
                    <div class="player">
                    <object width="385" height="32"> <param name="movie" value="http://fpdownload.adobe.com/strobe/FlashMediaPlayback_101.swf"></param><param name="flashvars" value="src=http%3A%2F%2Fstream.novotempo.com%3A1935%2Fradio%2Fsmil%3Aradionovotempo.smil%2Fmanifest.f4m&loop=true&autoPlay=true&streamType=live"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://fpdownload.adobe.com/strobe/FlashMediaPlayback_101.swf" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="385" height="32" flashvars="src=http%3A%2F%2Fstream.novotempo.com%3A1935%2Fradio%2Fsmil%3Aradionovotempo.smil%2Fmanifest.f4m&loop=true&autoPlay=true&streamType=live"></embed></object>
                </div>

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
        $title = __( 'Rádio Novo Tempo - Ao Vivo', 'wp_nt_text' );
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

function wp_load_wp_radio_nt() {
    register_widget( 'wp_radio_nt' );
}