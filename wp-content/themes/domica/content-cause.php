<?php
/**
 * Campaign content block.
 *
 * This template is only used if Charitable is active.
 *
 */
?>
<article id="campaign-<?php echo get_the_ID() ?>" <?php post_class( 'campaign-content' ) ?>>
    <div class="block entry-block">
        <div class="entry">
            <?php the_content() ?>
        </div>
    </div>
</article>
