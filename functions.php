<?php
/**
 * Divi Inspired Spine Child Theme Functions.php
 *
 * ===== NOTES ==================================================================
 * 
 * Unlike style.css, the functions.php of a child theme does not override its 
 * counterpart from the parent. Instead, it is loaded in addition to the parent's 
 * functions.php. (Specifically, it is loaded right before the parent's file.)
 * 
 * In that way, the functions.php of a child theme provides a smart, trouble-free 
 * method of modifying the functionality of a parent theme. 
 * 
 * Discover Divi Child Themes: https://divicake.com/products/category/divi-child-themes/
 * Sell Your Divi Child Themes: https://divicake.com/open/
 * 
 * =============================================================================== */
 
function divichild_enqueue_styles() {
  
	$parent_style = 'parent-style';

	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get('Version')
	);

	//wp_enqueue_style( 'child-style', get_template_directory_uri() . '/assets/css/fontawesome.min.css' );

	//wp_enqueue_script( 'scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.js' );
}
add_action( 'wp_enqueue_scripts', 'divichild_enqueue_styles' );


/**
 * @param  $classes array
 * @param  $item object
 * @return array
 */
function normalize_wp_classes($classes, $item){

  // old class => new class
  $replacements = array(
    'menu-item'              => 'active',
    'current-menu-item'      => 'active-menu',
    'current-menu-parent'    => 'active-parent',
    'current-menu-ancestor'  => 'active-ancestor',
    'current_page_item'      => 'active-page',
    'current_page_parent'    => 'active-page-parent',
    'current_page_ancestor'  => 'active-page-ancestor',
    'current-page-item'      => 'active-page-item',
    'current-page-parent'    => 'active-page-parent',
    'current-page-ancestor'  => 'active-page-ancestor',
    'menu-item-has-children' => 'active-has-children'
  );

  // do the replacements above
  $classes = strtr(implode(',', $classes), $replacements);
  $classes = explode(',', $classes);

  // remove any classes that are not present in the replacements array,
  // and return the result

  return array_unique(array_intersect(array_values($replacements), $classes));
}
// for custom menus and for the page menu fallback (wp_list_pages)
add_filter('nav_menu_css_class', 'normalize_wp_classes', 10, 2);
add_filter('page_css_class', 'normalize_wp_classes', 10, 2);


// Add Divi to Custom Post
function my_et_builder_post_types( $post_types ){
   $post_types[] = 'newsroom_post';
   return $post_types;
}
add_filter('et_builder_post_types', 'my_et_builder_post_types');


// Divi Builder on custom post types
function divichild_post_types($post_types) {
    foreach (get_post_types() as $post_type) {
        if (!in_array($post_type, $post_types) and post_type_supports($post_type, 'editor')) {
            $post_types[] = $post_type;
        }
    }
    return $post_types;
}
add_filter('et_builder_post_types', 'divichild_post_types');
add_filter('et_fb_post_types','divichild_post_types' ); 


// Taxonomy: Newsroom Post Categories.
function cptui_register_my_taxes_newsroom_post_category() {

  $labels = array(
    "name" => __( "Newsroom Post Categories", "" ),
    "singular_name" => __( "Newsroom Post Category", "" ),
    "menu_name" => __( "Newsroom Post Categories", "" ),
    "edit_item" => __( "Edit Newsroom Post Categories", "" ),
  );

  $args = array(
    "label" => __( "Newsroom Post Categories", "" ),
    "labels" => $labels,
    "public" => true,
    "hierarchical" => true,
    "label" => "Newsroom Post Categories",
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => array( 'slug' => 'newsroom_post_category', 'with_front' => true, ),
    "show_admin_column" => false,
    "show_in_rest" => false,
    "rest_base" => "newsroom_post_category",
    "show_in_quick_edit" => false,
  );
  register_taxonomy( "newsroom_post_category", array( "newsroom_post" ), $args );
}

add_action( 'init', 'cptui_register_my_taxes_newsroom_post_category' );


// Add classes to body based on custom taxonomy newsroom_post_category
function section_id_class($classes) {
  global $post;
  $section_terms = get_the_terms($post->ID, 'newsroom_post_category');

    if ($section_terms && !is_wp_error($section_terms)) {
        $section_name = array();
        foreach ($section_terms as $term) {
            $classes[] = 'term-' . $term->slug;
        }
    }
  return $classes;
}
add_filter('body_class', 'section_id_class');


// Header Form
function post_to_third_party_4( $entry, $form ) {
  $baseURI = 'https://app-3QNC1THE1U.marketingautomation.services/webforms/receivePostback/MzawMDEzNjG1BAA/';
  $endpoint = 'bed04edb-1280-4143-aa67-3f1f49cf02f5';
  $post_url = $baseURI . $endpoint;
  $body = array(
            'First Name' => rgar( $entry, '2' ),
            'Last Name' => rgar( $entry, '3' ),
            'Email Name' => rgar( $entry, '4' ),
            'Phone' => rgar( $entry, '5' ),
            'Primary Insurance Provider' => rgar( $entry, '9' ),
            'Other' => rgar( $entry, '12' ),
            'Privacy Policy' => rgar( $entry, '10' ),
            'trackingid__sb' => $_COOKIE['__ss_tk']
            );
  $request = new WP_Http();
  $response = $request->post( $post_url, array( 'body' => $body ) );
}
add_action( 'gform_after_submission_4', 'post_to_third_party_4', 10, 2 );


// Footer Form
function post_to_third_party_2( $entry, $form ) {
  $baseURI = 'https://app-3QNC1THE1U.marketingautomation.services/webforms/receivePostback/MzawMDEzNjG1BAA/';
  $endpoint = 'c16b7d86-b4ea-4f34-b66a-6865d6f7af41';
  $post_url = $baseURI . $endpoint;
  $body = array(
            'First Name' => rgar( $entry, '2' ),
            'Last Name' => rgar( $entry, '3' ),
            'Email Name' => rgar( $entry, '4' ),
            'trackingid__sb' => $_COOKIE['__ss_tk']
            );
  $request = new WP_Http();
  $response = $request->post( $post_url, array( 'body' => $body ) );
}
add_action( 'gform_after_submission_2', 'post_to_third_party_2', 10, 2 );


/**
 * This function modifies the main WordPress query to include an array of 
 * post types instead of the default 'post' post type.
 *
 * @param object $query  The original query.
 * @return object $query The amended query.
 */
// function CPT_search( $query ) {
  
//     if ($query->is_search) {
//       $query->set('post_type', array( 'post', 'newsroom_post', 'pages'));
//       // $query->set('paged', ( get_query_var('paged') ) ? get_query_var('paged') : 1 );
//       $query->set('posts_per_page',10);
//     }
//     return $query;  
// }
// add_filter( 'pre_get_posts', 'CPT_search' );


// load Breadcrumb php file
require 'includes/breadcrumb.php';

