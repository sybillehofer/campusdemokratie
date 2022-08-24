<?php
/**
 * register shortcode "wir verbinden"
 */
function wir_verbinden_shortcode() {
	if( has_nav_menu('icon-nav') && !is_admin() ) {
        ob_start();
        include(locate_template( 'parts/shortcode-wir-verbinden.php'));
        $content = ob_get_contents();
        ob_end_clean();
	} else {
		$content = '<p>keine Navigation vorhanden</p>';
    }

    return $content;
}
add_shortcode( 'wir-verbinden', 'wir_verbinden_shortcode' );

/*
 *
 * register shortcode "slideshows"
 *
*/
function slideshow_shortcode( $atts, $content, $tag = 'slideshow' ) {
  
    $atts = array_change_key_case((array)$atts, CASE_LOWER); // normalize attribute keys, lowercase
 
    // override default attributes with user attributes
    $cd_atts = shortcode_atts([
                                 'slideshow' => 'Beispiel Slideshow',
                                 'title' => false,
                             ], $atts, $tag);
                                 
    ob_start();
    $shortcode_post = esc_html__($cd_atts['slideshow'], 'slideshow');
    $title = esc_html__($cd_atts['title'], 'slideshow');
    include(locate_template( 'parts/shortcode-slideshow.php'));
	$content = ob_get_contents();
    ob_end_clean();
    
    return $content;
    
}

add_shortcode('slideshow', 'slideshow_shortcode');

/*
 *
 * register shortcode "fragengenerator"
 *
*/
function fragengenerator_shortcode( $atts, $content, $tag = 'fragengenerator' ) {
    
    // JAVASCRIPT
    wp_enqueue_script( 'p5-library-js', get_template_directory_uri() . '/assets/js/p5.min.js', array( 'jquery' ), '', true );
    wp_enqueue_script( 'questions-generator-js', get_template_directory_uri() . '/assets/js/questions-generator.js', array( 'jquery' ), '', true );
    wp_localize_script('questions-generator-js', 'generator', array(
        'font_bold' => get_template_directory_uri() .'/assets/fonts/GT-Pressura-Bold.ttf',
        'font_regular' => get_template_directory_uri() .'/assets/fonts/GT-Pressura-Regular.ttf',
        'image' => get_template_directory_uri() .'/assets/images/democracy_day_logo_red.svg'
    ));
      
    ob_start();
    include(locate_template( 'parts/shortcode-fragengenerator.php'));
    $content = ob_get_contents();
    ob_end_clean();

    return $content;
    
}

add_shortcode('fragengenerator', 'fragengenerator_shortcode');