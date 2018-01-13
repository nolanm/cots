<?php
/**
 * The template for displaying posts in the Video post format
 */

$video_type = (function_exists('fw_get_db_post_option') ? fw_get_db_post_option($post->ID, 'data_video_type') : '');
$video_url = (function_exists('fw_get_db_post_option') ? fw_get_db_post_option($post->ID, 'data_video') : '');

?>
<div class="flw padding-right">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="flw flex-parent sc-blog-item">
			<?php if(!is_single()): ?>
				<?php if(!empty($video_url)){ ?>
					<div class="blog-post-cover blog-post-video">
						<div data-type="<?php echo esc_attr($video_type); ?>" data-video-id="<?php echo esc_attr($video_url); ?>" class="blog-post-video-atc"></div>
						
					</div>
				<?php } ?>
			<?php endif; ?>

			<div class="blog-post-content">
				<!-- check if is blog masonry page-->
				<?php if(is_page_template('page-templates/blog-masonry.php')): ?>
					<div class="post-cat">
						<span class="cate"><?php echo domica_blog_categories();/*post categories*/ ?></span>
						<span class="ion-calendar"></span>
							<span class="blog-post-date" itemprop="datePublished" content="<?php echo get_the_time('c'); ?>"><?php echo domica_post_date();/*post date*/ ?></span>
					</div>
					<h1 class="post-tit" itemprop="headline">
						<a itemprop="url" href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a>
					</h1>
					<div class="blog-post-sumary" itemprop="description"><?php the_excerpt(); ?></div>
					<?php if(!is_single()) : ?>
                      <a href="<?php esc_url(the_permalink()); ?>" class="blog-btn-more"><?php esc_html_e('READ MORE', 'domica'); ?></a>
                    <?php endif; ?>
				<!--check if is blog grid page-->
				<?php elseif(is_page_template('page-templates/blog-grid.php')): ?>
					<div class="blog-post-info">
                        <div class="post-cat">
                            <span class="cate"><?php echo domica_blog_categories();/*post categories*/ ?></span>
                            <span class="ion-calendar"></span>
                                <span class="blog-post-date" itemprop="datePublished" content="<?php echo get_the_time('c'); ?>"><?php echo domica_post_date();/*post date*/ ?></span>
                        </div>
                        <div class="blog-post-name">
                            <h3 class="post-tit" itemprop="headline"><a itemprop="url" href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h3>
                        </div>
                        <div class="blog-post-sumary" itemprop="description"><?php the_excerpt(); ?></div>
                        <?php if(!is_single()) : ?>
                            <a href="<?php esc_url(the_permalink()); ?>" class="blog-btn-more"><?php esc_html_e('Continue', 'domica'); ?></a>
                        <?php endif; ?>
                    </div>
				<!-- is not single page -->
				<?php elseif(!is_single()): ?>
					<div class="post-cat"><?php echo domica_blog_categories();/*post categories*/ ?></div>
					<h1 class="post-tit" itemprop="headline">
						<a itemprop="url" href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a>
					</h1>
					<div class="blog-post-sumary" itemprop="description"><?php the_excerpt(); ?></div>
					<ul class="blog-post-info">
						<li itemprop="author">
							<span class="ion-android-person"></span>
							<?php esc_html_e('By', 'domica'); ?> <?php the_author_posts_link(); ?>
						</li>
						<li itemprop="commentCount">
							<span class="ion-chatbubble"></span>
							<?php
								if(get_comments_number() > 1){
									?>
									<a href="<?php comments_link(); ?>">
				                        <?php
											echo get_comments_number();
											esc_html_e(' Comments', 'domica');?>
				                    </a>  
				                    <?php	
									
								}elseif (get_comments_number() == 0) {
									?>
									<a href="<?php comments_link(); ?>">
				                        <?php
											esc_html_e(' Leave a comment', 'domica');?>
				                    </a>  
				                    <?php	
								}
								else{
									
									?>
									<a href="<?php comments_link(); ?>">
				                        <?php
											echo get_comments_number();
											esc_html_e(' Comment', 'domica');	
										?>
				                    </a>  
				                    <?php	
								}
							?>
						</li>
						<li>
							<span class="ion-calendar"></span>
							<?php echo get_the_date(); ?>
						</li>
					</ul>
					<a href="<?php esc_url(the_permalink()); ?>" class="blog-btn-more"><?php esc_html_e('READ MORE', 'domica'); ?></a>
				<?php else: ?>
					<h2 class="post-tit" itemprop="headline">
						<?php the_title(); ?>
						<?php /*sticky post*/
							if(is_sticky()){
								echo '<span class="theme-sticky">'.esc_html('STICKY', 'domica').'</span>';
							}
						?>
					</h2>
					<div class="blog-post-single" itemprop="articleBody"><?php the_content(); wp_link_pages(); ?></div>
					<!-- <div class="theme-tags" itemprop="keywords"><?php echo the_tags($before = '', $sep = '', $after = ''); ?></div> -->
					
					<?php domica_author_card();/*author card*/ ?>
					<div class="consult-comment-related flw">
						<?php /*comment*/
							if ( comments_open() || get_comments_number() ) {
							comments_template();
						} ?>
					</div>
					<div class="related-post">
						<div class="flex-it">
							<?php domica_related_post(); ?>
						</div>
					</div>
				</div>
					
				<?php endif; ?>
			</div>
		</div>
	</article>
</div>