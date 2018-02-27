<?php
/**
 * Template part for displaying the CTA Sidebar Widgets
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package inspire-spine
 */
?> 

<div class="span12 cta-widget-block" style="background-color: <?php the_field('cta_background_color', $acfw);?>;">
	
	<?php if( get_field('cta_image', $acfw) ): ?>

		<img class="cta-widget-img" src="<?php the_field('cta_image', $acfw); ?>" />

	<?php endif; ?>

	<h3 class="cta-widget-title"><?php the_field('cta_title', $acfw); ?></h3>
	
	<p class="cta-widget-desc"><?php the_field('cta_description', $acfw); ?></p>
	
	<div align="left"><button onclick="<?php the_field('cta_button', $acfw); ?>" class="cta-widget-button"><?php the_field('cta_button_title', $acfw); ?></button></div>
		
	<?php if( have_rows('cta_resources', $acfw) ): ?>

		<?php while( have_rows('cta_resources', $acfw) ): the_row(); 

			// vars
			$title = get_sub_field('cta_resource_title', $acfw);
			$button = get_sub_field('cta_resource_button', $acfw);
			$text = get_sub_field('cta_resource_button_text', $acfw);

			?>

			<div class="cta-resource">

				<?php if( $title ): ?>
					<h5 class="cta-resource-title"><?php echo $title; ?></h5>
				<?php endif; ?>

				<?php if( $button ): ?>
					<div align="left"><button onclick="<?php echo $button; ?>" class="cta-widget-button"><?php echo $text; ?></button></div>
				<?php endif; ?>

			</div>

		<?php endwhile; ?>

	<?php endif; ?>
</div>