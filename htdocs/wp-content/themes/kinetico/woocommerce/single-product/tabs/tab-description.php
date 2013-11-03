<?php global $post;

if ( $post->post_content ) : ?>
	<li class="description_tab"><a href="#tab-description"><?php _e('Description', 'kinetico'); ?></a></li>
<?php endif; ?>