<?php
	
add_action('wp_ajax_get_glossary_items', 'get_glossary_items');
add_action('wp_ajax_nopriv_get_glossary_items', 'get_glossary_items');

function get_glossary_items() {
	
	if( isset($_POST['letter']) ) {
		
		$glossary_items = cd_get_glossary_items( -1, $_POST['letter'] );
	
	} else if( isset($_POST['query']) ) {
	    $args = array(
	        'post_type'		=> 'sh_glossary',
	        'post_status'	=> 'publish',
	        'orderby'		=> 'title',
	        'order'			=> 'ASC',
	        's'				=> $_POST['query'],
	    );

	    $default_items = new WP_Query( $args );
	    
	    $args_keyword = array(
	        'post_type'		=> 'sh_glossary',
	        'post_status'	=> 'publish',
	        'orderby'		=> 'title',
	        'order'			=> 'ASC',
	        'tax_query' => array(
				array(
					'taxonomy' => 'keyword',
					'field' => 'slug',
					'terms' => $_POST['query'],
				)
			)
	    );
	    
	    $items_by_keyword = new WP_Query( $args_keyword );
	    
	    $glossary_items = new WP_Query();
		$glossary_items->posts = array_unique( array_merge( $default_items->posts, $items_by_keyword->posts ), SORT_REGULAR );
		$glossary_items->post_count = count( $glossary_items->posts );
	
	}

    ob_start();
    
    if ( $glossary_items->have_posts() ) {

		if ( locate_template( 'parts/content-glossary-archive.php' ) !== '' ) {
			include(locate_template( 'parts/content-glossary-archive.php' ));
		}
		
	} else {
		pll_e( 'Keine Begriffe gefunden' );
	}
	
	$content = ob_get_clean();
	
	echo $content;
	
	die();
	
}