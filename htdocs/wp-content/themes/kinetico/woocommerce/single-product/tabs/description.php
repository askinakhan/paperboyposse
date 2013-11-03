<?php
/**
 * Description Tab
 */
 
global $woocommerce, $post;

if ( $post->post_content ) : ?>
	<div class="panel entry-content" id="tab-description">
		
		<?php the_content(); ?>
	
	</div>
<?php endif; ?>