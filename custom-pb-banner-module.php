<?php
/**
 * Divi Custom Banner Module
 *
 * ===== NOTES ==================================================================
 * 
 * 
 * 
 * =============================================================================== */

function ex_divi_child_theme_setup() {

   if ( class_exists('ET_Builder_Module')) {

      class ET_Builder_Module_Image2 extends ET_Builder_Module {
         function init() {
            $this->name = __( 'Banner Image', 'et_builder' );
            $this->slug = 'et_pb_image2';
            // a whole bunch of php code that defines how the class functions
            
            
         }
      }
      $et_builder_module_image2 = new ET_Builder_Module_Image2();
      add_shortcode( 'et_pb_image2', array($et_builder_module_image2, '_shortcode_callback') );

   }

}
add_action('et_builder_ready', 'ex_divi_child_theme_setup');

?>