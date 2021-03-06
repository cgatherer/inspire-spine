<?php

get_header();

$show_default_title = get_post_meta( get_the_ID(), '_et_pb_show_title', true );

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>

<div id="main-content">
	<div style="width:100%">
		<div class="page-title span12 group">
			<div>
				<h1 class="page-title--heading">Search</h1>
			</div>
		</div>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="entry-content">
					
					<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
						<a href="<?php echo home_url('/');?>" rel="v:url" property="v:title">Home</a> <span class="delimiter">|</span> <a href="<?php echo home_url('/blog');?>" rel="v:url" property="v:title">Blog</a> <span class="delimiter">|</span> <span class="current">Search</span>
					</div>
					
					<div class="results"><p>Search Results for Term: “<?php $search_query = get_search_query(); echo $search_query; ?>”</p></div>

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
 
						        <?php 
						        	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

						        	$args = array(  
										'posts_per_page' => 10,  
										'paged' => $paged
									);

						        	$query = new WP_Query($args);

						        	if ( have_posts() ) : ?>
						            <?php while ( have_posts() ) : the_post(); ?>
						        
						            	<?php 
						            		// if(get_post_type() === 'newsroom_post'){
						            		// 	echo get_template_part( 'content', 'newsroom' ); 
						            		// } else {
											 
						            		// }
						            		echo get_template_part( 'content', 'archive' );
						            	?>
						            <?php endwhile; ?>

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
									
						        <?php else : ?>
						 
						            <h6 style='text-align:center;margin-top:20px;'>No Search Results Available...</h6>
						 
						        <?php endif; ?>
								
								<?php
									// $types = array('post', 'newsroom_post', 'pages');

									// foreach ($types as $type) : 
									// setup_postdata($type);
										
									// 	//Setup Post data
									// 	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
										
									// 	$args = array( 
									// 		'post_type' => $type, 
									// 		'posts_per_page' => 10, 
									// 		'order'   => 'DESC', 
									// 		'paged' => $paged
									// 	);

									// 	$query = new WP_Query($args);

									// 	if ( $query->have_posts() ) {
									// 		while ( $query->have_posts () ): $query->the_post(); 
									// 			echo get_template_part( 'content', 'archive' );
									// 		endwhile; 
									// 	} else {
									// 		echo "<h6 style='text-align:center;margin-top:20px;'>No Search Results Available...</h6>";
									// 	}

									// endforeach;
					  		// 		wp_reset_postdata();

									// $categories = get_the_category();
									// $cat = $categories[0]->term_id;
									
									// $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
										
									// $args = array( 
									// 	'posts_per_page' => -1, 
									// 	'post_type' => 'post',
									// 	'category__in' => array($cat),  
									// 	'order'   => 'DESC',
									// 	// 'paged' => $paged
									// );

									// $query = new WP_Query($args);
									// 	if ( $query->have_posts() ) {
									// 		while ( $query->have_posts () ): $query->the_post(); 
									// 			echo get_template_part( 'content', 'archive' );
									// 		endwhile; 
									// 	} else {
									// 		echo "<h6 style='text-align:center;margin-top:20px;'>No Search Results Available...</h6>";
									// 	}
									// wp_reset_postdata();

									// if( have_posts() ){
									//     $types = array('post', 'newsroom_post', 'pages');
									//     foreach( $types as $type ){
									//         echo 'your container opens here for ' . $type;
									//         while( have_posts() ){
									//             the_post();
									//             if( $type == get_post_type() ){
									//                 get_template_part('content', 'archive');
									//             }
									//         }
									//         rewind_posts();
									//         echo 'your container closes here for ' . $type;
									//     }
									// }
								?>

								<div class="block-pagination">
									<?php
										// echo paginate_links( array(
										//     'base' => preg_replace('/\?.*/', '/', get_pagenum_link()) . '%_%',
										//     'total'        => $query->max_num_pages,
										//     'current'      => max( 1, get_query_var( 'paged' )),
										//     'format'       => '?paged=%#%',
										//     'show_all'     => false,
										//     'prev_next'    => true,
										//     'prev_text'    => __('<i class="fas fa-angle-left"></i>'),
										//     'next_text'    => __('<i class="fas fa-angle-right"></i>'),
										//     'add_args'     => false,
										//     'add_fragment' => '',
										// )); 
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
		
	</div>
</div> <!-- #main-content -->

<?php

get_footer();
