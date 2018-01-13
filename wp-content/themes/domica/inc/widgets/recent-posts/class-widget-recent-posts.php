<?php

class Widget_Recent_Posts extends WP_Widget {

    /**
     * @internal
     */
    function __construct() {
        $widget_ops = array(
            'description' => esc_html__('List recent posts with thubmnail', 'domica'),
            'classname' => 'widget_recent_post_thumbnail'
        );
        parent::__construct( false, esc_html__( 'Recent Posts with Thumbnail', 'domica'), $widget_ops );
    }

    /**
     * @param array $args
     * @param array $instance
     */
    function widget( $args, $instance ) {
        extract( $args );
        $title     = esc_attr( $instance['title'] );
        $title = $before_title.$title.$after_title;
        $number     = esc_attr( $instance['number'] );

        $filepath = get_template_directory().'/inc/widgets/recent-posts/views/widget.php';
        if ( file_exists( $filepath ) ) {
            include( $filepath );
        }
    }

    function update( $new_instance, $old_instance ) {
        return $new_instance;
    }

    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'number' => 5, 'title' => esc_html__('Recent Posts', 'domica') ) );
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title', 'domica'); ?> </label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>"
                   value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat"
                   id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"/>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php esc_html_e( 'Number of posts', 'domica'); ?></label>
            <input type="number" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>"
                   value="<?php echo esc_attr( $instance['number'] ); ?>" class="widefat"
                   id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"/>
        </p>
    <?php
    }
}
