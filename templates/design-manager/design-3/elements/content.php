<div class="amp-wp-article-content">

	<!--Post Content here-->
	<div class="amp-wp-content the_content">
		<?php amp_content(); ?>
	</div>
	<!--Post Content Ends here-->

	<!--Post Next-Previous Links-->
	<?php global $redux_builder_amp;
		if($redux_builder_amp['enable-single-next-prev'] && !is_page() ) { ?>
			<div class="amp-wp-content post-pagination-meta">
				<div id="pagination">
                <?php $next_post = get_next_post();
                    if (!empty( $next_post )) {
                    $next_link = ampforwp_url_controller( get_permalink( $next_post->ID ));
					 if(true == ampforwp_get_setting('single-next-prev-to-nonamp')){
						$next_link = get_permalink( $next_post->ID );
					 } ?>
                    <span><?php echo ampforwp_translation(ampforwp_get_setting('amp-translator-next-read-text'), 'Next Read' ); ?></span> <a href="<?php echo esc_url($next_link); ?>"><?php echo esc_html($next_post->post_title); ?> &raquo;</a> <?php } ?>
				</div>
			</div>
		<?php } ?>
	<!--Post Next-Previous Links End here-->

</div>