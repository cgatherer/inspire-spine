<?php 
	$args = array( 'public' => true, '_builtin' => false, 'name' => 'newsroom_categories' );
	$output = 'names';
	$operator = 'and';
	$taxonomies = get_taxonomies($args,$output,$operator); 
													
	if  ($taxonomies) {
		foreach ($taxonomies  as $taxonomy ) {
			$terms = get_terms($taxonomy);
			$count = count($terms);
													    
			if ( $count > 0 ){
				foreach ( $terms as $term ) {
					echo '<p class="post-content--cat">';
						echo '<a href="' . $termlinks . '">' . $term->name . '</a>';  
					echo '</p>';              
				}
			}
		}
	}
?>