<?php
	
function cd_error_notices() {
	
	$required_plugins = array( 
		'Polylang' => '<a href="https://de.wordpress.org/plugins/polylang/" target="_blank">Polylang</a>', 
		'MW_Polylang_Theme_Strings' => '<a href="https://de.wordpress.org/plugins/polylang-theme-strings/" target="_blank">Polylang Theme Strings</a>'
	);
	
	$missing_plugins = array();
	foreach( $required_plugins as $class => $link ) {
		if( !class_exists( $class ) ) { 
			$missing_plugins[$class] = $link;
		}
	}
	
    $count = count($missing_plugins);
    if( $count > 0 ) {
		
		echo '<div class="error notice"><p>';
	        
	        _e( 'Bitte installieren und aktivieren Sie für dieses Theme folgende Plugins: ' );
	        
	        $i = 1;
	        foreach( $missing_plugins as $plugin ) {
		        if($i !== 1 && $i <= $count) {
			        echo ', ';
			    }
			    echo $plugin;
			    $i++;
	        }
	        
	    echo '</p></div>';
	}
	
}
add_action( 'admin_notices', 'cd_error_notices' );



function cd_template_chooser( $template ){
    global $wp_query;   
    $post_type = get_query_var('post_type');
  
    if( $wp_query->is_search && $post_type === 'sh_glossary' ){
        return locate_template('archive-sh_glossary.php');  //  redirect to archive-sh_glossary.php
    }   
    return $template;   
}
add_filter( 'template_include', 'cd_template_chooser' );    



/**
 * Save post metadata when a post is saved.
 *
 * @param int $post_id The post ID.
 * @param post $post The post object.
 * @param bool $update Whether this is an existing post being updated or not.
 */
function cd_add_post_meta( $post_id, $post, $update ) {

    $post_type = get_post_type($post_id);

    if ( $post_type !== 'sh_glossary' ) 
    	return;

	$letter = mb_substr( get_the_title($post_id), 0, 1 );
	
    if ( !isset( $_POST['glossary_letter'] ) ) {
        update_post_meta( $post_id, 'glossary_letter', $letter );
    }
    
}
add_action( 'save_post', 'cd_add_post_meta', 10, 3 );



/*
 *
 * edit urls for glossary items
 *
*/
function cd_edit_glossary_item_url(array $results, array $query) {

	$new_results = array();

	foreach( $results as $result ) {
	
		if( $result['info'] === 'Begriff' ) {
			
			$url = $result['permalink'];
	
		    $url = cd_post_url_to_hash_link( $url );
			
			$result['permalink'] = $url;
			
		}
		
		$new_results[] = $result;

	}

	$results = $new_results;	

	return $results;

}
add_filter('wp_link_query', 'cd_edit_glossary_item_url', PHP_INT_MAX, 2);


/*
 *
 * make hash url from post url for links
 *
*/
function cd_post_url_to_hash_link( $url ) {
	
	$index = strpos($url, '/abc/');
	
    if($index === false) {
        return $url;
    }
    $url = substr_replace($url, '/abc/#', $index, strlen('/abc/'));

	$url = rtrim($url,"/ ");
		
	return $url;
}

/*
 *
 * make hash url from post url for sharing
 *
*/
function cd_post_url_to_hash( $url ) {
	
	$index = strpos($url, '/abc/');
	
    if($index === false) {
        return $url;
    }
    $url = substr_replace($url, '/abc/%23', $index, strlen('/abc/'));

	$url = rtrim($url,"/ ");
	
	return $url;
}


/*
 *
 * keep links in post excerpts
 *
*/
function cd_get_excerpt($text) {
	global $post;
	if ( '' == $text ) {
		$text = get_the_content('');
		$text = apply_filters('the_content', $text);
		if (strlen($text) > 700) {
			$text = substr($text, 0, 700);
		}
	}
	return $text;
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'cd_get_excerpt');


/*
 *
 * 
 *
*/
function cd_set_correct_taxonomies( $post_id, $post, $update ) {
    
    if( $post->post_type !== 'project')
    	return;
    	
    $taxonomies = ['akteur', 'zielgruppe', 'ort', 'category'];
    
    foreach($taxonomies as $taxonomy) {
	 
	    $terms = wp_get_post_terms( $post_id, $taxonomy ); //get all terms
	    
	    $translated_terms = [];
		$final_terms = [];
		foreach ($terms as $term) {
			$term_translations = [];
			
			array_push($term_translations, pll_get_term($term->term_id, 'de')); //get id of term in de
			array_push($term_translations, pll_get_term($term->term_id, 'fr')); //get id of term in fr
			array_push($term_translations, pll_get_term($term->term_id, 'it')); //get id of term in it
			
			foreach($term_translations as $term) {
				if($term) {
					array_push($final_terms, $term);
				}
			}
			
		}
		
		wp_set_post_terms($post_id, $final_terms, $taxonomy );
		   
    }
	
}

add_action( 'save_post', 'cd_set_correct_taxonomies', 10,3 );
 

