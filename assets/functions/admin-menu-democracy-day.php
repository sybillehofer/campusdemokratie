<?php

add_menu_page( 'Democracy Day', 'Democracy Day', 'edit_pages', 'democracy-day', 'cd_menu_page_function', 'dashicons-format-chat', '30' );


function cd_count_proposal_in_activities($proposal_ID) {
        
    $args = array(
        'post_type' => 'activity'
    ); 
    $countArray = []; //create an array where you can put all the proposal id's and the number of times linked
    $loop = new WP_Query($args); 

    if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
    $posts = get_field('proposal');

        if( $posts ): 
                foreach( $posts as $post):
                    setup_postdata($post); 

                    //if the proposal id already exists -> count + 1
                    if (array_key_exists($post->ID, $countArray)){
                        $countArray[$post->ID]++;
                    }
                    else { // otherwise the proposal is linked 1 time
                        $countArray[$post->ID] = 1;    
                    } 
                endforeach;

            wp_reset_postdata();
        endif;
    endwhile;
    endif;
    
    if ( $countArray[$proposal_ID] ) {
        return $countArray[$proposal_ID];
    } else {
        return false;
    }
}
