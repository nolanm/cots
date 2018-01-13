<?php
/**
 * @var string $before_widget
 * @var string $after_widget
 * @var string $title
 * @var string $number
 */

echo wp_kses_post($before_widget );
echo wp_kses_post($title);
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>" >
    <input type="text" class="search-field" placeholder="<?php esc_attr__('Enter keyword...', 'domica') ?>" value="<?php get_search_query() ?>" name="s" id="s" />
    <input type="hidden" name='post_type' value="campaign">
    <button type="submit" class="search-submit ion-android-search"></button>
</form>
<?php
echo wp_kses_post($after_widget);