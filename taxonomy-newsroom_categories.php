<?php

get_header(); 

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>

<div id="main-content">
	<div style="width:100%">
			
			<div class="page-title span12 group">
				<div>
					<h1 class="page-title--heading">Newsroom</h1>
				</div>
			</div>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="entry-content">
					
					<!-- <div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#"><a href="<?php echo home_url('/');?>" rel="v:url" property="v:title">Home</a> <span class="delimiter">|</span> <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="<?php echo home_url('/about');?>">About Us</a></span> <span class="delimiter">|</span> <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="<?php echo home_url('/about/newsroom');?>">Newsroom</a></span> <span class="delimiter">|</span><?php $classes = get_body_class(); if (in_array('term-82',$classes)) { ?><span class="current">In The News</span><?php } ?><?php $classes = get_body_class(); if (in_array('term-80',$classes)) { ?><span class="current">Events</span><?php } ?><?php $classes = get_body_class(); if (in_array('term-81',$classes)) { ?><span class="current">Press Releases</span><?php } ?></div> -->
					<?php if ( function_exists('my_breadcrumbs') ) my_breadcrumbs(); ?>

					<div class="results"><p>Newsroom Results in Category: "<?php $classes = get_body_class(); if (in_array('term-82',$classes)) { ?>In The News<?php } ?><?php $classes = get_body_class(); if (in_array('term-80',$classes)) { ?>Events<?php } ?><?php $classes = get_body_class(); if (in_array('term-81',$classes)) { ?>Press Releases<?php } ?>"</p></div>

					<div class="et_pb_section" style="background-color: rgba(255, 255, 255, 0);">
						<div class="basic-page-section group et_pb_row et_pb_row_0">
							<div class="et_pb_column et_pb_column_2_3  et_pb_column_0 et_pb_css_mix_blend_mode_passthrough">

								<?php $classes = get_body_class();
										if (in_array('term-82',$classes)) { ?>
												
											<?php  
												$args_two = array( 
													'posts_per_page' => 10, 
													'post_type' => 'newsroom',  
													'order'   => 'DESC',
													'paged' => $paged
												);

												$query = new WP_Query($args_two);
													if ( $query->have_posts() ) {
														while ( $query->have_posts () ): $query->the_post(); 
															echo get_template_part( 'content', 'newsroom' );
														endwhile; 
													} else {
														echo "<h6 style='text-align:center;'>something went wrong!</h6>";
													}
												wp_reset_postdata();
											?>
										
								<?php } ?>

								<?php $classes = get_body_class();
										if (in_array('term-80',$classes)) { ?>
												
											<?php 
												$args_two = array( 
													'posts_per_page' => 10, 
													'post_type' => 'newsroom',  
													'order'   => 'DESC',
													'paged' => $paged
												);

												$query = new WP_Query($args_two);
													if ( $query->have_posts() ) {
														while ( $query->have_posts () ): $query->the_post(); 
															echo get_template_part( 'content', 'newsroom' );
														endwhile; 
													} else {
														echo "<h6 style='text-align:center;'>something went wrong!</h6>";
													}
												wp_reset_postdata();
											?>
										
								<?php } ?>

								<?php $classes = get_body_class();
										if (in_array('term-81',$classes)) { ?>
												
											<?php 
												$args_two = array( 
													'posts_per_page' => 10, 
													'post_type' => 'newsroom',  
													'order'   => 'DESC',
													'paged' => $paged
												);

												$query = new WP_Query($args_two);
													if ( $query->have_posts() ) {
														while ( $query->have_posts () ): $query->the_post(); 
															echo get_template_part( 'content', 'newsroom' );
														endwhile; 
													} else {
														echo "<h6 style='text-align:center;'>something went wrong!</h6>";
													}
												wp_reset_postdata();
											?>
										
								<?php } ?>

								<div class="block-pagination">
									<?php
										echo paginate_links( array(
										    'base' => preg_replace('/\?.*/', '/', get_pagenum_link()) . '%_%',
										    'total'        => $query->max_num_pages,
										    'current'      => max( 1, get_query_var( 'paged' )),
										    'format'       => '?paged=%#%',
										    'show_all'     => false,
										    'prev_next'    => true,
										    'prev_text'    => __('<i class="fas fa-angle-left"></i>'),
										    'next_text'    => __('<i class="fas fa-angle-right"></i>'),
										    'add_args'     => false,
										    'add_fragment' => '',
										)); 
									?>
								</div>
							</div>

							<div class="et_pb_column et_pb_column_1_3  et_pb_column_1 et_pb_css_mix_blend_mode_passthrough et-last-child">
								<div class="et_pb_widget_area"><?php dynamic_sidebar( 'newsroom-sidebar' );?></div>
							</div>
						</div>
					</div>

				</div> <!-- .entry-content -->
			</article> <!-- .et_pb_post -->

	</div> <!-- .container -->	
</div><!-- #main-content -->

<?php get_footer(); ?>