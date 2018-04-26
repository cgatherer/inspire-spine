<?php 
	// Post Categories
	$haystack    = get_the_category( $post->ID );
	$i = count($haystack);
	$string = "";

	for ($j=0; $j < $i; $j++) {
		$string     .= " ";
		$string     .= $haystack[$j]->slug;
		$stringName .= $haystack[$j]->name;
	}
											
	$link = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'large', false );
	$href = get_the_permalink();										
	$theCat = wp_get_post_categories($post->ID);
											
	if (has_post_thumbnail($post->ID)){
		$theCols = 'span12'; 
		$imgWidth = 'span4';
		$contentWidth = 'span8';
		$paddingLeft = 'padding-left: 15px;';
	} else {
		$theCols = 'span12'; 
		$imgContainer ='hide';
		$contentWidth = 'span12';
		$noMargin = 'margin-left: 0px !important;';
	}
?>

<div class="<?php echo $string;?>">
	<div id="post-<?php the_ID(); ?>" class="post-content <?php echo $theCols;?> group nopad">
		<div class="post-content--image <?php echo $imgWidth;?>" style="<?php echo $noMargin;?>">
			<a href="<?php echo $href;?>"><img src="<?php echo $link[0]; ?>"></a>
		</div>

		<!-- Post Content -->
		<div class="post-content--container <?php echo $contentWidth;?>" style="<?php echo $noMargin;?> <?php echo $paddingLeft; ?>">
			<span class="post-content--date"><?php echo get_the_date('d M Y'); ?></span>
			<h4 class="post-content--heading"><a href="<?php echo $href;?>"><?php echo the_title();?></a></h4>

			<p class="post-content--cat">
				<a href="<?php echo $href;?>"><?php echo $stringName;?></a>
			</p>
				
			<!-- Post Excerpt -->														
			<div class="post-content--text">
				<?php
					if ($theCat){ 
						$str = substr(get_the_excerpt(), 0,194); 
					} else {
						$str = get_the_excerpt();
					}

					$n = strpos($str, '<a');

					if ($n > 0){
						$rest = substr($str, 0, $n);
						echo $rest;
					} else {
						echo $str;
					}
				?> ...
			</div>

			<!-- Button -->
			<a href="<?php echo $href;?>"><button class="see-more-btn">Read More</button></a>
		</div>
	</div>
</div>