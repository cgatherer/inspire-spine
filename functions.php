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

// for custom menus
add_filter('nav_menu_css_class', 'normalize_wp_classes', 10, 2);

// for the page menu fallback (wp_list_pages)
add_filter('page_css_class', 'normalize_wp_classes', 10, 2);

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

function my_et_builder_post_types( $post_types ){
   $post_types[] = 'newsroom';
   return $post_types;
}
add_filter('et_builder_post_types', 'my_et_builder_post_types');

// Taxonomy: newsroom categories.
function cptui_register_my_taxes_newsroom_categories() {

  $labels = array(
    "name" => __( "newsroom categories", "" ),
    "singular_name" => __( "newsroom category", "" ),
  );

  $args = array(
    "label" => __( "newsroom categories", "" ),
    "labels" => $labels,
    "public" => true,
    "hierarchical" => false,
    "label" => "newsroom categories",
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => array( 'slug' => 'newsroom_categories', 'with_front' => true, ),
    "show_admin_column" => false,
    "show_in_rest" => false,
    "rest_base" => "",
    "show_in_quick_edit" => false,
  );
  register_taxonomy( "newsroom_categories", array( "newsroom" ), $args );
}

add_action( 'init', 'cptui_register_my_taxes_newsroom_categories' );

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


// load Breadcrumb php file
require 'includes/breadcrumb.php';

