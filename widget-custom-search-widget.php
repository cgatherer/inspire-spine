<?php
/**
 * Template part for displaying the Custom Search Widget
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package inspire-spine
 */
?> 

<div id="search-custom" class="span12 nopad widget widget_search desktop-search" style="width: 100%;max-width: 370px;">
	<h2 class="widgettitle"><?php the_field( 'search_tilte', $acfw ); ?></h2>
	<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url('/');?>">
	<div>
		<label class="screen-reader-text" for="s">Search for:</label>
		<input type="text" value="" name="s" id="s" placeholder="Search Blog">
		<input type="submit" id="searchsubmit" value="Search">
	</div>
	</form>
</div>