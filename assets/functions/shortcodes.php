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


/**
 * register shortcode "interactive map"
 */
function interactive_map_shortcode() {
	if( !is_admin() ) {
        ob_start();
        include(locate_template( 'parts/shortcode-interactive-map.php'));
        $content = ob_get_contents();
        ob_end_clean();
	}
    return $content;
}
add_shortcode( 'interactive-map', 'interactive_map_shortcode' );