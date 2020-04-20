<?php
/**
 * telephone_url function.
 *
 * @access public
 * @param mixed $number
 * @return void
 */
function telephone_url($number)
{
    $nationalprefix = '+41';
    $protocol       = 'tel:';
    $formattedNumber = $number;
    if ($formattedNumber !== '') {
        // add national dialing code prefix to tel: link if it's not already set
        if (strpos($formattedNumber, '00') !== 0 && strpos($formattedNumber, '0800') !== 0 && strpos($formattedNumber, '+') !== 0 && strpos($formattedNumber, $nationalprefix) !== 0) {
            $formattedNumber = preg_replace('/^0/', $nationalprefix, $formattedNumber);
        }
    }
    $formattedNumber = str_replace('(0)', '', $formattedNumber);
    $formattedNumber = preg_replace('~[^0-9\+]~', '', $formattedNumber);
    $formattedNumber = trim($formattedNumber);
    return $protocol . $formattedNumber;
}


// check if month has events in future and should be shown by default
function month_has_events_in_future( $events ) {
	
	$in_future = false;
	foreach($events as $event) {
		if($event['in_future'] === true) {
			$in_future = true;
		}	
	}
	
	return $in_future;
}

function umlauteumwandeln($str){
	$tempstr = Array("Ä" => "AE", "Ö" => "OE", "Ü" => "UE", "ä" => "ae", "ö" => "oe", "ü" => "ue"); 
	return strtr($str, $tempstr);
}

/**
 * Returns the primary term for the chosen taxonomy set by Yoast SEO
 * or the first term selected.
 *
 * @link https://www.tannerrecord.com/how-to-get-yoasts-primary-category/
 * @param integer $post The post id.
 * @param string  $taxonomy The taxonomy to query. Defaults to category.
 * @return array The term with keys of 'title', 'slug', and 'url'.
 */
function get_primary_taxonomy_term( $post = 0, $taxonomy = 'category' ) {
	if ( ! $post ) {
		$post = get_the_ID();
	}

	$terms        = get_the_terms( $post, $taxonomy );
	$primary_term = array();

	if ( $terms ) {
        $term_id = '';
		$term_display = '';
		$term_slug    = '';
		$term_link    = '';
		if ( class_exists( 'WPSEO_Primary_Term' ) ) {
			$wpseo_primary_term = new WPSEO_Primary_Term( $taxonomy, $post );
			$wpseo_primary_term = $wpseo_primary_term->get_primary_term();
			$term               = get_term( $wpseo_primary_term );
			if ( is_wp_error( $term ) ) {
                $term_id = $terms[0]->term_id;
                $term_display = $terms[0]->name;
				$term_slug    = $terms[0]->slug;
				$term_link    = get_term_link( $terms[0]->term_id );
			} else {
                $term_id = $term->term_id;
				$term_display = $term->name;
				$term_slug    = $term->slug;
				$term_link    = get_term_link( $term->term_id );
			}
		} else {
            $term_id = $terms[0]->term_id;
            $term_display = $terms[0]->name;
			$term_slug    = $terms[0]->slug;
			$term_link    = get_term_link( $terms[0]->term_id );
		}
		$primary_term['term_id'] = $term_id;
		$primary_term['url']   = $term_link;
		$primary_term['slug']  = $term_slug;
		$primary_term['title'] = $term_display;
	}
	return $primary_term;
}