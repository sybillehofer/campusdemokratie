<?php
	
/**
 * Register a custom post type called "activity".
 *
 */
function sh_register_cpt_activity() {
    $labels = array(
        'name'                  => _x( 'Aktivitäten', 'Post type general name', 'wptheme.campus' ),
        'singular_name'         => _x( 'Aktivität', 'Post type singular name', 'wptheme.campus' ),
        'menu_name'             => _x( 'Aktivitäten', 'Admin Menu text', 'wptheme.campus' ),
        'name_admin_bar'        => _x( 'Aktivität', 'Add New on Toolbar', 'wptheme.campus' ),
        'add_new'               => __( 'Hinzufügen', 'wptheme.campus' ),
        'add_new_item'          => __( 'Neue Aktivität hinzufügen', 'wptheme.campus' ),
        'new_item'              => __( 'Neue Aktivität', 'wptheme.campus' ),
        'edit_item'             => __( 'Aktivität bearbeiten', 'wptheme.campus' ),
        'view_item'             => __( 'Aktivität ansehen', 'wptheme.campus' ),
        'all_items'             => __( 'Aktivitäten', 'wptheme.campus' ),
        'search_items'          => __( 'Aktivität suchen', 'wptheme.campus' ),
        'parent_item_colon'     => __( 'Übergeordnete Aktivität:', 'wptheme.campus' ),
        'not_found'             => __( 'Keine Aktivitäten gefunden.', 'wptheme.campus' ),
        'not_found_in_trash'    => __( 'Keine Aktivitäten im Papierkorb gefunden.', 'wptheme.campus' ),
        
        
        'archives'              => _x( 'Aktivitäten-Archive', 'The post type archive label used in nav menus. Default “Post Archives”. ', 'wptheme.campus' ),
        'insert_into_item'      => _x( 'Zur Aktivität hinzufügen', 'Overrides the “Insert into post” phrase (used when inserting media into a post). ', 'wptheme.campus' ),
        'uploaded_to_this_item' => _x( 'Zu dieser Aktivität hochgeladen.', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). ', 'wptheme.campus' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'can_export'         => true,
        'public'             => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => 'democracy-day',
        'query_var'          => false,
        'rewrite'            => array( 'slug' => 'aktivitaeten' ),
        'map_meta_cap'		 => true,
		'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'		 	 => 'dashicons-location',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'revisions'),
    );

    register_post_type( 'activity', $args );
}
add_action( 'init', 'sh_register_cpt_activity' );