<?php

class Widget_Mailchimp_Subscribe extends WP_Widget {

	/**
	 * @internal
	 */
	function __construct() {
		$widget_ops = array( 'description' => '' );
		parent::__construct( false, esc_html__( 'Mailchimp Subscribe Form', 'domica' ), $widget_ops );
	}

	/**
	 * @param array $args
	 * @param array $instance
	 */
	function widget( $args, $instance ) {
		extract( $args );

		
		$form_action   = esc_attr( $instance['form_action'] );
		$before_widget = str_replace( 'class="', 'class="widget_mailchimp ', $before_widget );
		

		$filepath = get_template_directory() . '/inc/widgets/mailchimp-subscribe/views/widget.php';

		if ( file_exists( $filepath ) ) {
			include( $filepath );
		}
	}

	function update( $new_instance, $old_instance ) {
		return $new_instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'text_content' => '', 'title' => '', 'form_action' => '#' ) );
		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'form_action' )); ?>"><?php esc_html_e( 'Form action', 'domica' ); ?> :</label>
			<input type="text" name="<?php echo esc_attr($this->get_field_name( 'form_action' )); ?>"
			       value="<?php echo esc_attr( $instance['form_action'] ); ?>" class="widefat"
			       id="<?php echo esc_attr($this->get_field_id( 'form_action' )); ?>"/>
		</p>
	<?php
	}
}
