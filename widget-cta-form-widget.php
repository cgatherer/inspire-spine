<?php
/**
 * Template part for displaying the CTA Form in header.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package inspire-spine
 */
?> 

<div class="span12">
	<button class="BG"><?php the_field('cta_form_title', $acfw); ?></button>
	<div class="form-area" style="display:none;">	
		<?php 
		  	$shortcode = get_field( 'cta_form_shortcode', $acfw); 
		  	echo do_shortcode($shortcode);
		?>
	</div>
	<!-- Button <div class="BG">Get Your Free Review</div> -->
</div>