<div class="container">
	<h4>Categories</h4>
		<ul class="categories">

			<?php
				$taxonomy = 'category';
				// Get the term IDs assigned to post.
				$post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );

				if ( ! empty( $post_terms ) && ! is_wp_error( $post_terms ) ) {

				$term_ids = implode( ',' , $post_terms );

				$terms = wp_list_categories( array(
				'title_li' => '',
				'echo' => false,
				'taxonomy' => $taxonomy,
				// 'include'  => $term_ids
				) );
				// Display post categories.
				echo  $terms;}
			?>

		</ul>
</div>

</div><!--.row.categories -->