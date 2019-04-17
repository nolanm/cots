<?php 
/**
 * @package 	WordPress
 * @subpackage 	Salvation
 * @version 	1.0.0
 * 
 * Custom Single Comment Template
 * Created by CMSMasters
 * 
 */


function salvation_mytheme_comment($comment, $args, $depth) {
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
        <div id="comment-<?php comment_ID(); ?>" class="comment-body cmsmasters_comment_item">
			<div class="cmsmasters_comment_item_avatar">
				<?php 
					echo get_avatar($comment->comment_author_email, 56, get_option('avatar_default')) . "\n"; 
					
					edit_comment_link(esc_attr__('Edit', 'salvation'), '', ''); 
				?>
			</div>
			<div class="comment-content cmsmasters_comment_item_cont">
				<div class="cmsmasters_comment_item_cont_info">
					<h5 class="fn cmsmasters_comment_item_title"><?php echo get_comment_author_link(); ?></h5>
					<?php 
					comment_reply_link(array_merge($args, array( 
						'depth' => $depth, 
						'max_depth' => $args['max_depth'], 
						'reply_text' => esc_attr__('Reply', 'salvation') 
					)));
					
					echo '<abbr class="published cmsmasters_comment_item_date" title="' . get_comment_date() . '">' . 
						get_comment_date() . 
					'</abbr>';
					?>
				</div>
				<div class="cmsmasters_comment_item_content">
					<?php 
					comment_text();
					
					if ($comment->comment_approved == '0') {
						echo '<p>' . 
							'<em>' . esc_html__('Your comment is awaiting moderation.', 'salvation') . '</em>' . 
						'</p>';
					}
					?>
				</div>
			</div>
        </div>
    <?php 
}

