<?php

get_header();

$show_default_title = get_post_meta( get_the_ID(), '_et_pb_show_title', true );

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>

<div id="main-content">
	<div style="width:100%">
		<div class="page-title span12 group">
			<div>
				<h1 class="page-title--heading">Newsroom</h1>  
			</div>
		</div>

		<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
			<a href="<?php echo home_url('/');?>" rel="v:url" property="v:title">Home</a> <span class="delimiter">|</span> <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="<?php echo home_url('/about');?>">About Us</a></span> <span class="delimiter">|</span> <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="<?php echo home_url('/about/newsroom');?>">Newsroom</a></span> <span class="delimiter">|</span> <span class="current"><?php echo the_title(); ?></span>
		</div>

		<?php 
			if ( have_posts() ) : 
				while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'et_pb_post' ); ?>>
						<div class="entry-content">
							<div class="et_pb_section" style="background-color: rgba(255, 255, 255, 0);">
								<div class="basic-page-section group et_pb_row et_pb_row_0">
									<div class="et_pb_column et_pb_column_2_3  et_pb_column_0 et_pb_css_mix_blend_mode_passthrough">

										<!-- Post Content -->
										<div class="post-content--container">
											<?php $link = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large', false );?>
											<h3 class="post-content--heading"><?php echo the_title();?></h3>
											<p class="post-content--date"><?php echo get_the_date('d M Y'); ?></p>
											<div class="sharethis-inline-share-buttons"></div>

											<?php $terms = get_the_terms( $post->ID, 'newsroom_post_category' ); 
									    			foreach($terms as $term) {
									    				$termlinks = get_term_link($term);
															echo '<a href="' . $termlinks . '"><p class="post-content--btn">' . $term->name . '</p></a>';}?>
										</div>

										<!-- Featured Image -->
										<?php if (has_post_thumbnail($post->ID)){ ?>
 											<div class="post-content--featured-image">
 												<img src="<?php echo $link[0]; ?>">
 											</div>
 										<?php }?>
												
										<!-- Main Content -->
										<?php
											do_action( 'et_before_content' ); the_content(); wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'Divi' ), 'after' => '</div>' ) );
										?>
									</div>

									<div class="et_pb_column et_pb_column_1_3  et_pb_column_1 et_pb_css_mix_blend_mode_passthrough et-last-child">
										<div class="et_pb_widget_area"><?php dynamic_sidebar( 'newsroom-sidebar' );?></div>
									</div>
								</div>
							</div>
						</div> <!-- .entry-content -->
					</article> <!-- .et_pb_post -->

				<?php endwhile; ?>
		<?php endif; ?>
	</div>
</div> <!-- #main-content -->

<?php

get_footer();
