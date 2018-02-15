<?php
/**
 * Template part for displaying the CTA Sidebar Widgets
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package inspire-spine
 */
?> 

<div class="span12">
	<button class="BG"><?php the_field('cta_form_title', $acfw); ?></button>
	<div class="form-area">
		<?php 
			$myvalue = the_field('cta_form_shortcode', $acfw); 

			echo do_shortcode("$myvalue");
		?>
	</div>
	<!-- <div class="BG">Get Your Free Review</div> -->
</div>