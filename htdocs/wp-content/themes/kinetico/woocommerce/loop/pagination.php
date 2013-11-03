<?php
/**
 * Pagination
 */

global $wp_query;
?>

<?php if ( $wp_query->max_num_pages > 1 ) : ?>

<!--
<div class="navigation">
	<div class="nav-next"><?php next_posts_link( __( 'Next <span class="meta-nav">&rarr;</span>', 'kinetico' ) ); ?></div>
	<div class="nav-previous"><?php previous_posts_link( __( '<span class="meta-nav">&larr;</span> Previous', 'kinetico' ) ); ?></div>
</div>
-->

<?php nav_pagination(5, $posts->max_num_pages); ?>

<?php endif; ?>