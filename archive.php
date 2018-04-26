<?php

get_header();   

$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() );

?>

<div id="main-content">
	<div style="width:100%">
			
			<div class="page-title span12 group">
				<div>
					<h1 class="page-title--heading">Blog</h1>
				</div>
			</div>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="entry-content">
					<?php $classes = get_body_class();
						if (in_array('tag',$classes)) { ?>
						<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
							<a href="<?php echo home_url('/');?>" rel="v:url" property="v:title">Home</a> <span class="delimiter">|</span> <span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="<?php echo home_url('/tag');?>">Tag</a></span> <span class="delimiter">|</span> <span class="current"><?php $title = single_tag_title( '', false ); echo $title; ?></span>
						</div>	

						<div class="results"><p>Blog Results in Tags: “<?php $title = single_tag_title( '', false ); echo $title; ?>”</p>
						</div>	

					<?php } else { ?>

						<?php if ( function_exists('my_breadcrumbs') ) my_breadcrumbs(); ?>

					<?php } ?>

					<?php if (in_array('date',$classes)){ ?>
						<div class="results"><p>Blog Archive Results: “<?php echo get_the_date('F Y'); ?>”</p>
						</div>
					<?php }?>

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
									$month = get_the_date('m');
									$year = get_the_date('Y');

									if(is_month($month)){

										$args = array(
											'post_type' => 'post',
										    'date_query' => array(
										        array(
										            'year'  =>  $year,
										            'month' => $month
										        )
										    ),
										    'posts_per_page'=> -1,
										    'order' => 'DESC'
										);
										
										$query = new WP_Query($args);
											if ( $query->have_posts() ) {
												while ( $query->have_posts () ): $query->the_post(); 
													echo get_template_part( 'content', 'archive' );
												endwhile; 
											} else {
												echo "<h6 style='text-align:center;'>something went wrong!</h6>";
											}
										wp_reset_postdata();

									} else {
										
										$args = array(
											'post_type' => 'post',
										    'date_query' => array(
										        array(
										            'year'  =>  $year
										        )
										    ),
										    'posts_per_page'=> -1,
										    'order' => 'DESC'
										);
										
										$query = new WP_Query($args);
											if ( $query->have_posts() ) {
												while ( $query->have_posts () ): $query->the_post(); 
													echo get_template_part( 'content', 'archive' );
												endwhile; 
											} else {
												echo "<h6 style='text-align:center;'>something went wrong!</h6>";
											}
										wp_reset_postdata();
									}
								?>
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