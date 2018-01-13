<?php
/**
 * The template for displaying the footer.
 * Contains the closing of the #content div and all content after
 * @package domica
 */

/*page option*/
$pid = get_queried_object_id();
$cr_display = (function_exists('fw_get_db_post_option')) ? fw_get_db_post_option($pid, 'p_copyright') : 'default';
/*customizer*/
$copyright = get_theme_mod('c_copyright', '&copy; 2017 Bridge Church. All Rights Reserved.');
?>
	
	<footer class="theme-footer flw">
		<?php domica_footer_edit_location('footer');/*footer edit location*/ ?>
		<?php domica_footer_sidebar();?>
		<?php if($cr_display != 'disable'):/*page disable copyright*/ ?>
			
			<?php if(!empty($copyright)): ?>
			<div class="copy-right flw">
				<div class="container footer-flex">
					<span><?php echo wp_kses($copyright, array('a'=>array('href'=>array(), 'target'=>array()))); ?></span>
					<div class="footer-menu-2">
						<?php wp_nav_menu( array( 'theme_location' => 'Footer Menu 2' ) ); ?> 
					</div>
				</div>
			</div>
		<?php endif; ?>
		<?php endif;/*end page disable copyright*/ ?>
		<span class="scroll-to-top ion-ios-arrow-up" title="<?php esc_attr_e('Scroll To Top', 'domica'); ?>"></span>

	</footer>
	<?php wp_footer(); ?>
</body>
</html>



