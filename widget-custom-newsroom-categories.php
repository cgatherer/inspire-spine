<?php
/**
 * Template part for displaying the Custom Search Widget
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package inspire-spine
 */
?> 

<div class="span12 nopad widget widget_categories" style="width: 100%;max-width: 370px;">
	<h2 class="widgettitle"><?php the_field( 'custom_categories_title', $acfw ); ?></h2>
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
			        echo '<ul>';
			            foreach ( $terms as $term ) {
			                $termlinks= get_term_link($term,$taxonomy);?> 
			                <li class='cat-item'>
			                	<a href="<?php echo $termlinks; ?>"><?php echo $term->name;?></a>
			                </li>
			        <?php }
			        echo "</ul>";
			    }
			}
		}
	?>
</div>