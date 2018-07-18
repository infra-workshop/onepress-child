<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style')
);
}
 // Add two menus: this theme uses wp_nav_menu() in two locations.  
 register_nav_menus( array(  
   'primary' => __( 'Primary Navigation', 'onepress-imde' ),  
   'secondary' => __('Secondary Navigation', 'onepress-imde')  
 ) );
// Customize the footer area (show also the secondary menu)
if ( ! function_exists( 'onepress_footer_site_info' ) ) {
    /**
     * Add Copyright and Credit text to footer
     * @since 1.1.3
     */
    function onepress_footer_site_info()
    {
        ?>

        <!-- shows our custom menu -->
        <?php if( has_nav_menu( 'secondary', 'onepress-imde' ) ) {
            ?> <div class="footer-menu-container"> <?php
            wp_nav_menu( array( 'theme_location' => 'secondary' ) );
            ?> </div> <?php
        } ?>
        <!-- end: shows our custom menu -->

        <?php printf(esc_html__('Copyright %1$s %2$s %3$s', 'onepress'), '&copy;', esc_attr(date('Y')), esc_attr(get_bloginfo())); ?>
        <?php
    }
}
?>
