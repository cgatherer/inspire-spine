<?php
/*
Template Name: Archives
*/
get_header();  

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>

<div id="main-content">
	<div style="width:100%">
			
			<?php if (is_page( 'Blog' )) : ?>

					<div class="page-title span12 group">
						<div>
							<h1 class="page-title--heading">Blog</h1>
						</div>
					</div>

				<?php else : ?>

					<div class="page-title span12 group">
						<div>
							<h1 class="page-title--heading"><?php the_archive_title(); ?></h1>
						</div>
					</div>

			<?php endif; ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="entry-content">
					
					<?php if ( function_exists('my_breadcrumbs') ) my_breadcrumbs(); ?>

					<div class="et_pb_section" style="background-color: rgba(255, 255, 255, 0);">
						<div class="basic-page-section group et_pb_row et_pb_row_0">
							<div class="et_pb_column et_pb_column_2_3  et_pb_column_0 et_pb_css_mix_blend_mode_passthrough">

								<!-- Mobile Search -->
								<div id="search-2" class="span12 widget widget_search mobile-search" style="width: 100%;max-width: 599px;">
								    <h2 class="widgettitle">Search</h2>
								    <form role="search" method="get" id="searchform" class="searchform" action="http://dev-inspired-spine.pantheonsite.io/">
										<div>
											<label class="screen-reader-text" for="s">Search for:</label>
											<input type="text" value="" name="s" id="s" placeholder="Search Blog">
											<input type="submit" id="searchsubmit" value="Search">
										</div>
									</form>
								</div>
								
								<?php if (is_page( 'Blog' )) : ?>
									<?php
										$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
										
										$args = array( 
											'posts_per_page' => 10, 
											'post_type' => 'post',  
											'order'   => 'ASC',
											'paged' => $paged
										);

										$query = new WP_Query($args);
											if ( $query->have_posts() ) {
												while ( $query->have_posts () ): $query->the_post(); 
													echo get_template_part( 'content', 'archive' );
												endwhile; 
											} else {
												echo "<h6 style='text-align:center;'>something went wrong!</h6>";
											}
										wp_reset_postdata();?>
								<?php else : ?>

									<h6 style='text-align:center;'>something went wrong!</h6>

								<?php endif; ?>

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
								<div class="et_pb_widget_area"><?php dynamic_sidebar('blog-sidebar');?></div>
							</div>
						</div>
					</div>

				</div> <!-- .entry-content -->
			</article> <!-- .et_pb_post -->

	</div> <!-- .container -->	
</div><!-- #main-content -->

<?php get_footer(); ?>