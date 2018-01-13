<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = '';
$class_to_filter .= vc_shortcode_custom_css_class( $inline_css, ' ' ) . $this->getExtraClass( $class ) . $this->getCSSAnimation( $css_animation );
$all_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );


$values = (array) vc_param_group_parse_atts( $values );



?>
<div class="vc_progress_bar theme-progress-bar<?php echo esc_attr($all_class); ?>">
    <?php
        foreach($values as $key):
        /*if style custom enable*/
        $uid = '';
        if(isset($key['custom_color']) && $key['custom_color'] == 'yes'):
            $uid = uniqid('progress-bar-id-');

            $bg = $cl = array();
            $bg1 = $key['bg1'];
            $bg2 = $key['bg2'];
            $c_txt = $key['c_txt'];

            if(!empty($bg1) && !empty($bg2)){
                $bg[] = 'background-color: ' . $bg1;
                $bg[] = 'background: -webkit-gradient(linear, left top, right top, from(' . $bg1 . '), to(' . $bg2 . '))';
                $bg[] = 'background: -webkit-linear-gradient(left, ' . $bg1 . ', ' . $bg2 . ')';
            }
            if(!empty($c_txt)){
                $cl[] = 'color: ' . $c_txt;
            }
            /*print output css*/
            echo '<style type="text/css">';
            echo '.theme-single-pb.' . esc_attr($uid) . ' .theme-pb-bar{' . implode( ';', $bg ) . '}';
            echo '.theme-single-pb.' . esc_attr($uid) . ' .theme-pb-label{' . implode( ';', $cl ) . '}';
            echo '</style>';
        endif;
        /*end style custom*/
        
        if( 0 <= $key['value'] && $key['value'] <= 100 ):
    ?>
        <div class="theme-single-pb vc_general vc_single_bar <?php echo esc_attr($uid); ?>">
            <span class="theme-pb-label vc_label"><?php echo esc_html($key['label']); ?>
                <?php if(!empty($unit)): ?>
                    <span class="theme-pb-unit vc_label_units"><?php echo esc_html($key['value'] . $unit); ?></span>
                <?php endif; ?>
            </span>
            <span class="theme-pb-bar vc_bar " data-percentage-value="<?php echo esc_attr($key['value']); ?>" data-value="<?php echo esc_attr($key['value']); ?>"></span>
        </div>
    <?php
        endif;
        endforeach;
    ?>
</div>