<?php
function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
    
    // Load What-Input files in footer
    wp_enqueue_script( 'what-input', get_template_directory_uri() . '/vendor/what-input/dist/what-input.min.js', array(), '', true );
    
    // JAVASCRIPT
    wp_enqueue_script( 'foundation-js', get_template_directory_uri() . '/vendor/foundation-sites/dist/js/foundation.min.js', array( 'jquery' ), '6.3.1', true );
    wp_enqueue_script( 'isotope-js', 'https://unpkg.com/isotope-layout@2/dist/isotope.pkgd.min.js', array( 'jquery' ), '6.3.1', true );
    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'isotope-filters-js', get_template_directory_uri() . '/assets/js/isotope-filters.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'glossary-js', get_template_directory_uri() . '/assets/js/glossary.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'glossary-ajax-js', get_template_directory_uri() . '/assets/js/glossary-ajax.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'isotope-post-js', get_template_directory_uri() . '/assets/js/isotope-post.js', array( 'jquery' ), '', true );
    
    // AJAX
    wp_localize_script( 'glossary-ajax-js', 'CDAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' )) );
    
    // Register Motion-UI
    wp_enqueue_style( 'motion-ui-css', get_template_directory_uri() . '/vendor/motion-ui/dist/motion-ui.min.css', array(), '', 'all' );
	
	// CSS
    wp_enqueue_style( 'foundation-css', get_template_directory_uri() . '/vendor/foundation-sites/dist/css/foundation.min.css', array(), '', 'all' );
    wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/vendor/font-awesome-4.7.0/css/font-awesome.min.css', array(), '', 'all' );
    wp_enqueue_style( 'header-css', get_template_directory_uri() . '/assets/css/header.css', array(), '', 'all' );
    wp_enqueue_style( 'fonts-css', get_template_directory_uri() . '/assets/css/fonts.css', array(), '', 'all' );
    wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/css/style.css', array(), '', 'all' );
	wp_enqueue_style( 'custom-orbit-css', get_template_directory_uri() . '/assets/css/orbit.css', array(), '', 'all' );
    wp_enqueue_style( 'custom-tables-css', get_template_directory_uri() . '/assets/css/tables.css', array(), '', 'all' );
    wp_enqueue_style( 'forms-css', get_template_directory_uri() . '/assets/css/forms.css', array(), '', 'all' );
    wp_enqueue_style( 'navigations-css', get_template_directory_uri() . '/assets/css/navigations.css', array(), '', 'all' );
    wp_enqueue_style( 'footer-css', get_template_directory_uri() . '/assets/css/footer.css', array(), '', 'all' );
    wp_enqueue_style( 'news-css', get_template_directory_uri() . '/assets/css/news.css', array(), '', 'all' );
    wp_enqueue_style( 'glossary-css', get_template_directory_uri() . '/assets/css/glossary.css', array(), '', 'all' );
    wp_enqueue_style( 'events-css', get_template_directory_uri() . '/assets/css/events.css', array(), '', 'all' );
	wp_enqueue_style( 'responsive-css', get_template_directory_uri() . '/assets/css/responsive.css', array(), '', 'all' );
    wp_enqueue_style( 'isotope-css', get_template_directory_uri() . '/assets/css/isotope.css', array(), '', 'all' );
    wp_enqueue_style( 'block-elements-css', get_template_directory_uri() . '/assets/css/block-elements.css', array(), '', 'all' );
    wp_enqueue_style( 'posts-css', get_template_directory_uri() . '/assets/css/posts.css', array(), '', 'all' );

}
add_action('wp_enqueue_scripts', 'site_scripts', 999);
