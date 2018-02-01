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
}
add_action( 'wp_enqueue_scripts', 'divichild_enqueue_styles' );

// Register and load the widget
function wpb_load_widget() {
    register_widget( 'cta_form_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );
 
// Creating the widget 
class cta_form_widget extends WP_Widget {
 
	function __construct() {
		parent::__construct(
 
		// Base ID of your widget
		'cta_form_widget', 
 
		// Widget name will appear in UI
		__('CTA Form', 'wpb_widget_domain'), 
 
		// Widget description
		array( 'description' => __( 'Request Free MRI Review', 'wpb_widget_domain' ), ) 
	);
}
 
// Creating widget front-end
public function widget( $args, $instance ) {
	//$title = apply_filters( 'widget_title', $instance['title'] );
 
	// before and after widget arguments are defined by themes
	//echo $args['before_widget'];
	if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];
	 
		// This is where you run the code and display the output
		//echo __( 'Hello, World!', 'wpb_widget_domain' );
		require_once( get_stylesheet_directory_uri() . '/cta-form.php' );
		//echo $args['after_widget'];
	}
         
	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'wpb_widget_domain' );
		}
		// Widget admin form
	?>

	<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
	<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" /></p>
	
	<?php }
     
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
} // Class wpb_widget ends here

