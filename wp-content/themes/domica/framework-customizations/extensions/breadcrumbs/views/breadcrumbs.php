<?php if ( ! defined( 'FW' ) ) { die( 'Forbidden' );}

/**
 * Breadcrumbs default view
 * Parameters:
 * @var string $separator , the separator symbol
 */
$gadget = '';
$pid = get_queried_object_id();
$p_page_header = (function_exists('fw_get_db_post_option')) ? fw_get_db_post_option($pid, 'p_page_header') : '1';
 /*variables*/
 $gadget = $p_page_header['gadget'];
 /*page header value*/
 if(isset($gadget) && $gadget != 'default'){
     $final_page_header = $gadget;
 }
$final_header_text_color = '';
 /*header text color*/
if(isset($gadget) && $gadget == '1' && $p_page_header['1']['page_header_text_color'] != ''){
    $final_header_text_color = 'style="color: '.$p_page_header['1']['page_header_text_color'].'"';
}
?>

<?php if ( ! empty( $items ) ) : ?>
    <div class="crumbs" itemscope itemtype="http://schema.org/BreadcrumbList" <?php echo wp_kses_post($final_header_text_color); ?>>
        <?php for ( $i = 0; $i < count( $items ); $i ++ ) : ?>
            <?php if ( $i == ( count( $items ) - 1 ) ) : ?>
                <span class="last-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" <?php echo wp_kses_post($final_header_text_color); ?>><i itemprop="name" <?php echo wp_kses_post($final_header_text_color); ?>><?php echo apply_filters( 'the_title', $items[ $i ]['name'] ); ?></i><meta itemprop="position" content="<?php echo count( $items ); ?>" /></span>
            <?php elseif ( $i == 0 ) : ?>
                <span class="first-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem" <?php echo wp_kses_post($final_header_text_color); ?>>
                <?php if( isset( $items[ $i ]['url'] ) ) : ?>
                    <a itemprop="item" href="<?php echo esc_url($items[ $i ]['url']); ?>" <?php echo wp_kses_post($final_header_text_color); ?>><span itemprop="name" <?php echo wp_kses_post($final_header_text_color); ?>><?php echo apply_filters( 'the_title', $items[ $i ]['name'] ); ?></span></a><meta itemprop="position" content="1" /></span>
                <?php else : echo esc_html($items[ $i ]['name']); endif ?>

                <?php
            else : ?>
            <span class="<?php echo( $i - 1 ) ?>-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <?php if( isset( $items[ $i ]['url'] ) ) : ?>
                    <a itemprop="item" href="<?php echo esc_url($items[ $i ]['url']); ?>"><span itemprop="name"><?php echo apply_filters( 'the_title', $items[ $i ]['name'] ); ?></span></a><meta itemprop="position" content="<?php echo esc_attr($i + 1); ?>" /></span>
                <?php else : echo esc_html($items[ $i ]['name']); endif ?>

            <?php endif ?>
        <?php endfor ?>
    </div>
<?php endif ?>
