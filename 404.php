<?php
/*
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Divi
 * @since Divi Child Theme
 */

get_header(); 
 
$is_page_builder_used = et_pb_is_pagebuilder_used( get_the_ID() ); ?>

<div id="main-content">
	<div style="width:100%">

		<div class="page-title span12 group">
			<div>
				<h1 class="page-title--heading">Error 404</h1>
			</div>
		</div>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<div class="entry-content">
					
					<div class="breadcrumbs" xmlns:v="http://rdf.data-vocabulary.org/#">
							<a href="<?php echo home_url('/');?>" rel="v:url" property="v:title">Home</a> <span class="delimiter">|</span> <span class="current">Error 404</span>
						</div>	

					<div class="et_pb_section" style="background-color: rgba(255, 255, 255, 0);">
						<div class="basic-page-section group et_pb_row et_pb_row_0">
							<div class="et_pb_column et_pb_column_2_3  et_pb_column_0 et_pb_css_mix_blend_mode_passthrough">
								<div class="entry">
								<!--If no results are found-->
									<h1>No Results Found</h1>
									<p>The page you requested could not be found. Try refining your search, or use the navigation above to locate the post.</p>
								</div>
							</div>

							<div class="et_pb_column et_pb_column_1_3  et_pb_column_1 et_pb_css_mix_blend_mode_passthrough et-last-child">
								<div class="et_pb_widget_area"><?php //dynamic_sidebar('blog-sidebar');?></div>
							</div>
						</div>
					</div>

				</div> <!-- .entry-content -->
			</article> <!-- .et_pb_post -->

	</div> <!-- .container -->	
</div><!-- #main-content -->

<?php get_footer(); ?>