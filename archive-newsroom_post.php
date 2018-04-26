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
					
					<?php if ( function_exists('my_breadcrumbs') ) my_breadcrumbs(); ?>

					<?php 
						$classes = get_body_class(); 
						$terms = get_the_terms( $post->ID, 'newsroom_post_category' );

						foreach($terms as $term) {
							$termlinks = get_term_link($term);

							if (in_array('date',$classes) && in_array($term->slug,$classes)){
								echo "<div class='results'><p>Newsroom Archive Results: “";
									 echo get_the_date('F Y');
								echo "”</p></div>";
							} else {
								// echo "<div class='results'><p>Newsroom Archive Results: “";
								//  	echo $term->name;
								// echo "”</p></div>";
							}
						}

						// if (in_array('term-press-releases',$classes)){
						// 	$terms = get_the_terms( $post->ID, 'newsroom_post_category' );
						// 	foreach($terms as $term) {
						// 		$termlinks = get_term_link($term);
						// 		echo "<div class='results'><p>Newsroom Archive Results: “";
						// 	 		echo $term->name;
						// 		echo "”</p></div>";
						// 	}
						// }

						// if (in_array('term-events',$classes)){
						// 	$terms = get_the_terms( $post->ID, 'newsroom_post_category' );
						// 	foreach($terms as $term) {
						// 		$termlinks = get_term_link($term);
						// 		echo "<div class='results'><p>Newsroom Archive Results: “";
						// 	 		echo $term->name;
						// 		echo "”</p></div>";
						// 	}
						// }

						// if (in_array('term-in-the-news',$classes)){
						// 	$terms = get_the_terms( $post->ID, 'newsroom_post_category' );
						// 	foreach($terms as $term) {
						// 		$termlinks = get_term_link($term);
						// 		echo "<div class='results'><p>Newsroom Archive Results: “";
						// 	 		echo $term->name;
						// 		echo "”</p></div>";
						// 	}
						// }
					?>

					<div class="et_pb_section" style="background-color: rgba(255, 255, 255, 0);">
						<div class="basic-page-section group et_pb_row et_pb_row_0">
							<div class="et_pb_column et_pb_column_2_3  et_pb_column_0 et_pb_css_mix_blend_mode_passthrough">
												
								<?php
									$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
									$month = get_the_date('m');
									$year = get_the_date('Y');

									if(is_month($month)){

										$args = array(
											'post_type' => 'newsroom_post',
										    'date_query' => array(
										        array(
										            'year'  =>  $year,
										            'month' => $month
										        )
										    ),
										    'posts_per_page'=> -1,
										    'order' => 'DESC',
										    'paged' => $paged
										);
										
										$query = new WP_Query($args);
											if ( $query->have_posts() ) {
												while ( $query->have_posts () ): $query->the_post(); 
													echo get_template_part( 'content', 'newsroom' );
												endwhile; 
											} else {
												echo "<h6 style='text-align:center;'>something went wrong!</h6>";
											}
										wp_reset_postdata();

									} else {
										
										$args = array(
											'post_type' => 'newsroom_post',
										    'posts_per_page'=> 10,
										    'order' => 'DESC',
										    'paged' => $paged
										);
										
										$query = new WP_Query($args);
											if ( $query->have_posts() ) {
												while ( $query->have_posts () ): $query->the_post(); 
													echo get_template_part( 'content', 'newsroom' );
												endwhile; 
											} else {
												echo "<h6 style='text-align:center;'>something went wrong!</h6>";
											}
										wp_reset_postdata();
									}
								?>

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