<?php global $redux_builder_amp;
	if( isset($redux_builder_amp['ampforwp-tags-single']) && $redux_builder_amp['ampforwp-tags-single']) { ?>
<div class="amp-wp-content amp-wp-article-tags amp-wp-article-category ampforwp-meta-taxonomy ">
<?php	
			$ampforwp_tags=  get_the_terms( $this->ID, 'post_tag' );
			if ( $ampforwp_tags && ! is_wp_error( $ampforwp_tags ) ) :?>
		<?php do_action('ampforwp_before_meta_taxonomy_hook',$this); ?>
		<div class="amp-wp-meta amp-wp-content ampforwp-tax-tag">
				<?php foreach ($ampforwp_tags as $tag) {
				if( isset($redux_builder_amp['ampforwp-archive-support']) && $redux_builder_amp['ampforwp-archive-support'] && isset($redux_builder_amp['ampforwp-cats-tags-links-single']) && $redux_builder_amp['ampforwp-cats-tags-links-single'] ) {
             			 echo ('<span class="amp-tag-'.$tag->term_id.'"><a href="'. ampforwp_url_controller( get_tag_link( $tag->term_id ) ) .'" >'. $tag->name  .'</a></span>');//#934 
        		}
        		 else {
		         	 echo '<span>'. $tag->name .'</span>';
		        	}
				} ?>
		</div>
<?php endif;?>
</div> <?php } ?>

<?php
if( array_key_exists( 'amp-author-description' , $redux_builder_amp ) && is_single() ) {
	if( $redux_builder_amp['amp-author-description'] ) { ?>
	<div class="amp-wp-content amp_author_area ampforwp-meta-taxonomy">
	    <div class="amp_author_area_wrapper">
	        <?php $post_author = $this->get( 'post_author' );
	        	$twitter = '';
	            if ( $post_author ) {
	            	// yoast author twitter handle
			        	include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
			            if ( class_exists('WPSEO_Frontend') ) {
				        	global $post;
				        	$twitter = get_the_author_meta( 'twitter', $post->post_author );
				        }
	            	//If Avatar is set up in WP user avatar: grab it
	            	$author_avatar_url = ampforwp_get_wp_user_avatar();
	            	//Else : Get the Gravatar
	            	if($author_avatar_url == null){
	            		$author_avatar_url = get_avatar_url( $post_author->user_email, array( 'size' => 70 ) );
	            	}
	                if ( $author_avatar_url ) { ?>
	                    <amp-img <?php if(ampforwp_get_data_consent()){?>data-block-on-consent <?php } ?> src="<?php echo $author_avatar_url; ?>" width="70" height="70" layout="fixed"></amp-img>
	                    <?php
	                } 
	                echo ampforwp_get_author_details( $post_author , 'meta-taxonomy' );
	                if($twitter){
	             			echo ' <span><a href="https://twitter.com/'.$twitter.'" target="_blank">(@'.$twitter.') - </a></span>';
	             		}
	                echo  $post_author->description ;
        		 } ?>
	    </div>
	</div> <?php
	}
}

do_action('ampforwp_after_meta_taxonomy_hook',$this);
