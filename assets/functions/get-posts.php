<?php

// get news
function cd_get_news( $number = -1 ) {
	
	$news_posts = new WP_Query(array(
        'posts_per_page' => $number,
        'post_type'      => 'post'
    ));
	
	return $news_posts;
}

// get glossary items
function cd_get_glossary_items( $number = -1, $letter = 'all' ) {
	
	if( $letter !== 'all' ) {
		$meta_query = array(
	        'glossary_letter' => array(
	            'key' => 'glossary_letter',
	            'value' => $letter,
	        ),
	    );
	} else {
		$meta_query = '';
	}
	
	$glossary_items = new WP_Query(array(
        'posts_per_page' => $number,
        'post_type'      => 'sh_glossary',
        'meta_query'	 => $meta_query,
        'orderby'		 => 'title',
        'order'			 => 'ASC'
    ));
    
	return $glossary_items;
}


// get evens query
function cd_get_events( $number = -1, $term = false, $is_campus = false, $city_id = false, $eventtype_id = false, $is_front_page = false, $only_past = false ) {
	
	$cur_lang = pll_current_language();
	
	$meta_query = '';
	$tax_query = ''; 
	
	if( $is_campus ) {
		$meta_query = array(
	        'is_campus' => array(
	            'key' => 'is_campus',
	            'value' => $is_campus,
	        ),
	    );
	} else if( $city_id && $city_id !== '' ) {
		$tax_query = array(
			array(
				'taxonomy' => 'city',
				'field'    => 'id',
				'terms'    => $city_id,
			),
		);
	} else if( $eventtype_id && $eventtype_id !== '' ) {
		$tax_query = array(
			array(
				'taxonomy' => 'eventtype',
				'field'    => 'id',
				'terms'    => $eventtype_id,
			),
		);
	}
	
	if( $is_front_page ) {
		$meta_query = array(
	        'is_front_page' => array(
	            'key' => 'is_front_page',
	            'value' => true,
	        ),
	        array(
                'key' => 'start_date',
                'value' => date("Y-m-d"),
                'compare' => '>=',
                'type' => 'DATE'
            ),
	    );
	}
	
	$events = new WP_Query(array(
        'posts_per_page' => $number,
        'post_type'      => 'event',
        'lang'			 => $cur_lang,
        'meta_query'	 => $meta_query,
       	'tax_query'		 => $tax_query,
       	'post_status'    => 'publish'
    ));

	$ordered_events = array();

		
	foreach($events->posts as $event) {
	    $id = $event->ID;
		
		$event_post['id'] = $id;
	    $event_post['title'] = $event->post_title;

	    $start_date = get_field( 'start_date', $id );
	    $event_post['start_date'] = date_i18n( 'd. F Y', strtotime( $start_date ) );	
	    $event_post['start_day'] = date_i18n( 'D j', strtotime( $start_date ) );
	    
	    $end_date = get_field( 'end_date', $id );
	    if( $end_date && $end_date !== '' ) {
		    $event_post['end_date'] = date_i18n( 'd. F Y', strtotime( $end_date ) );
		    $event_post['end_day'] = date_i18n( 'D j', strtotime( $end_date ) );
		} else {
			$event_post['end_date'] = $event_post['start_date'];
			$event_post['end_day'] = date_i18n( 'D j', strtotime( $start_date ) );
		}
	
	    $event_post['month'] = date_i18n( 'F y', strtotime( $start_date ) );
	    $event_post['time'] = get_field( 'time', $id );
	    
	    $event_post['city'] = '';
	    $terms = wp_get_post_terms( $id, 'city' );
	    $count = count($terms);
	    $i = 1;
	    if( $count > 0 ) {
		    foreach( $terms as $term ) {
			    if($i !== 1 && $i <= $count) {
			        $event_post['city'] .= ', ';
			    }
			    $event_post['city'] .= $term->name;
			    $i++;
		    }			    
	    } else {
		    $event_post['city'] = '';
	    }
	    
	    $event_post['location'] = get_field( 'location', $id );
	    $event_post['organizer'] = get_field( 'organizer', $id );
	    $event_post['costs'] = get_field( 'costs', $id );
	    $event_post['is_campus'] = get_field( 'is_campus', $id );
		$event_post['has_registration'] = get_field( 'has_registration', $id );
		$event_post['registration_form'] = get_field( 'registration_form', $id );
		$event_post['registration_link'] = get_field( 'registration_link', $id );
		$event_post['registration_button_text'] = get_field( 'registration_button_text', $id );
	    $event_post['description'] = $event->post_content;
	    $event_post['link'] = get_the_permalink( $id );
	    $event_post['external_link'] = get_field( 'external_link', $id );
	    
	    // check if event occured in past
	    $yesterday = date("Y/m/d", time() - 86400);
	    if ($yesterday > $start_date) {
			$event_post['in_future'] = false;
		} else {
		    $event_post['in_future'] = true;
		}
	    
		// specifies the position of the current post
		$month_nr = date_i18n( 'y/m', strtotime( $start_date ) );
		$month_name = date_i18n( 'F y', strtotime( $start_date ) );
		$grouped_events[$month_nr]['month'] = $month_name;
		$grouped_events[$month_nr]['events'][] = $event_post;
		
	}
	
	$ordered_events['only_past'] = $only_past;
	$ordered_events['only_campus'] = $is_campus;
	
	//sort events by date
	if( isset($grouped_events) ) {
		foreach( $grouped_events as $key => $month ) {
			usort($month['events'], function ($a, $b) { return strnatcmp($a['start_date'], $b['start_date']); });
			$ordered_events[$key]['events'] = $month['events'];
			$ordered_events[$key]['month'] = $month['month'];
		}
	}
	
	//sort months by date
	if( $only_past === false) {
		ksort($ordered_events);
	}
	
	return $ordered_events;
	
}

function cd_get_events_new() {
	
	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'event',
		'post_status' => 'publish',
		'meta_key' => 'start_date',
		'meta_query' => array(
	        array(
	           'key' => 'start_date',
	           'value' => date("Ymd"),
	           'compare' => '>='
	       )
	    ),
	    'orderby' => 'meta_value',
	    'order' => 'ASC'
	);
	
	$events = new WP_Query($args);
	
	$ordered_events = [];
	foreach($events->posts as $event) :
	
		$event->month = date_i18n( 'F y', strtotime( $event->start_date ) );
	    $event->month_slug = umlauteumwandeln(strtolower(date_i18n( 'F', strtotime( $event->start_date ) )));
	
	    $event->start_day = date_i18n( 'D j', strtotime( $event->start_date ) );
	    $event->start_date = date_i18n( 'd. F Y', strtotime( $event->start_date ) );	
	   
	    if( $event->end_date && $event->end_date !== '' ) {
		    $event->end_day = date_i18n( 'D j', strtotime( $event->end_date ) );
		    $event->end_date = date_i18n( 'd. F Y', strtotime( $event->end_date ) );
		} else {
			$event->end_day = $event->start_day;
			$event->end_date = $event->start_date;
		}
		
		$ordered_events[$event->month][] = $event;
		
	endforeach;
	
	return $ordered_events;
}


function cd_get_event_title_and_class($event) {
	
	if( $event['is_campus'] === true ) { 
		$day_class = " is-campus";
		$event_title = '<a href="' . $event['link'] . '">' . $event['title'] . '</a>';
	} else { 
		$day_class = '';
		if( $event['external_link'] ) {
			$event_title = '<a href="' . $event['external_link']['url'] . '" target="' . $event['external_link']['target'] . '">' . $event['title'] . '</a>';
		} else {
			$event_title = $event['title'];
		}
	}
	
	$result = array('title' => $event_title, 'class' => $day_class);
	
	return $result;
}



function cd_get_slideshow( $shortcode_post ){

	$args = array(
		'post_type' => 'slideshow',
		'post_status' => 'publish',
		'title' => $shortcode_post,
	);
	
	$slideshows = new WP_Query($args);

	return $slideshows;
}


function cd_get_projects(){

	$args = array(
		'post_type' => 'project',
		'post_status' => 'publish',
		'posts_per_page' => -1
	);
	
	$projects = new WP_Query($args);

	return $projects->posts;
}

function cd_get_posts_by_categories($categories) {
	$args = array(
		'post_type' => 'post',
		'tax_query' => array(
			array(
			'taxonomy' => 'category',
			'field' => 'term_id',
			'terms' => $categories
			)
		)
	);
	$query = new WP_Query( $args );

	return $query;
}

function cd_get_tax_name($post_id, $tax) {

    $tax = get_the_terms( $post_id, $tax ); //get all terms

	foreach ($tax as $term) {
		if ( pll_get_term_language($term->term_id) === pll_current_language() ) {
			if( $link = get_field('link', 'akteur_' . $term->term_id) ) {
				$term_string = '<a href="' . $link['url'] . '" target="' . $link['target'] . '">' . $term->name . '</a>';
			} else {
				$term_string = $term->name;
			}
		
			if( $term)
	        $terms[] = $term_string; //add term to list of terms for this taxonomy
	    }
    }
    
	if(empty($terms) ) {
	    $terms[] = '-';
    }
    
	return $terms;
}

function cd_get_tax_slug($post_id, $tax) {

    $tax = get_the_terms( $post_id, $tax ); //get all terms

	$terms = [];
	if( $tax ) {
		foreach ($tax as $term) {
			$terms[] = $term->slug; //add term to list of terms for this taxonomy 
		}
	}
	
	return $terms;
}

function cd_get_taxonomy_terms($tax, $hide_empty = true) {
	$terms = get_terms( array(
		'taxonomy' => $tax,
		'hide_empty' => $hide_empty
	));
	
	return $terms;
}

function cd_get_isotope_classes($post) {
	$class_string = '';
	
	$taxonomies = get_object_taxonomies( $post );
	
	foreach($taxonomies as $tax) {
		if( $tax !== 'post_translations' )
			$class_string .= ' ' .join(' ', cd_get_tax_slug($post->ID, $tax));
	}
	
	if( $post->is_campus === "1" ) {
		$class_string .= ' is-campus';
	}

	if( $post->post_type == 'proposal' ) { //for proposals only

		$type = get_field('price-type', $post->ID);
		if($type == 2) {
			$class_string .= ' chargeable';
		} else {
			$class_string .= ' free';
		}

		$location = get_field('location', $post->ID);
		if( is_array($location) === true ) {
			if( in_array(0, $location) || in_array(1, $location) ) {
				if( in_array(0, $location) ) { $class_string .= ' offline'; }
				if( in_array(1, $location) ) { $class_string .= ' online'; }
				if( in_array(2, $location) ) { $class_string .= ' offline'; }
				if( in_array(3, $location) ) { $class_string .= ' offline'; }
			} else {
				$class_string .= ' offline';
			}
		} else {
			$class_string .= ' offline';
		}

		$democracy_day = get_field('democracy-day-only', $post->ID);
		if($democracy_day == 2) {
			$class_string .= ' democracy-day';
		} else {
			$class_string .= ' always';
		}
	}
	
	return $class_string;
}

function cd_get_isotope_classes_month($posts) {
	$class_string = '';
	
	foreach($posts as $post) {
		$class_string .= cd_get_isotope_classes($post); 
	}
	
	return $class_string;
}

function cd_get_isotope_data_attr($post) {
	$data_string = '';

	if( $post->post_type == 'proposal' ) { //for proposals only
		
		if(get_field('age', $post->ID)) {
			$age = get_field('age', $post->ID);
			$age_from = $age['from'] !== '' ? $age['from'] : '0';
			$age_to = $age['to'] !== '' ? $age['to'] : '99';
			$data_string .= 'data-age-from="' . $age_from . '" data-age-to="' . $age_to . '"';
		}

		if(get_field('duration', $post->ID)) {
			$duration = get_field('duration', $post->ID);
			$duration_from = $duration['from'] !== '' ? $duration['from'] : '0';
			$duration_to = $duration['to'] !== '' ? $duration['to'] : '730';
			$data_string .= 'data-duration-from="' . $duration_from . '" data-duration-to="' . $duration_to . '"';
		}

		if(get_field('group-size', $post->ID)) {
			$group_size = get_field('group-size', $post->ID);
			$group_size_from = $group_size['from'] !== '' ? $group_size['from'] : '0';
			$group_size_to = $group_size['to'] !== '' ? $group_size['to'] : '730';
			$data_string .= 'data-group-from="' . $group_size_from . '" data-group-to="' . $group_size_to . '"';
		}
	}
	
	return $data_string;
}