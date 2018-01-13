<?php

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = '';
$class_to_filter .= vc_shortcode_custom_css_class( $inline_css, ' ' ) . $this->getExtraClass( $class ) . $this->getCSSAnimation( $css_animation );
$all_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

?>

<div class="theme-tbl theme-col-<?php echo esc_attr($col); ?><?php echo esc_attr( $all_class ); ?>">
	<?php
		if ( ! empty( $content ) ) {
			echo wpb_js_remove_wpautop( $content );
		}
	?>
</div>