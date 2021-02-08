<?php
	
/**
 * Register a custom post type called "proposal".
 *
 */
function sh_register_cpt_proposal() {
    $labels = array(
        'name'                  => _x( 'Vorschläge', 'Post type general name', 'wptheme.campus' ),
        'singular_name'         => _x( 'Vorschlag', 'Post type singular name', 'wptheme.campus' ),
        'menu_name'             => _x( 'Vorschläge', 'Admin Menu text', 'wptheme.campus' ),
        'name_admin_bar'        => _x( 'Vorschlag', 'Add New on Toolbar', 'wptheme.campus' ),
        'add_new'               => __( 'Hinzufügen', 'wptheme.campus' ),
        'add_new_item'          => __( 'Neuen Vorschlag hinzufügen', 'wptheme.campus' ),
        'new_item'              => __( 'Neuen Vorschlag', 'wptheme.campus' ),
        'edit_item'             => __( 'Vorschlag bearbeiten', 'wptheme.campus' ),
        'view_item'             => __( 'Vorschlag ansehen', 'wptheme.campus' ),
        'all_items'             => __( 'Vorschläge', 'wptheme.campus' ),
        'search_items'          => __( 'Vorschlag suchen', 'wptheme.campus' ),
        'parent_item_colon'     => __( 'Übergeordneter Vorschlag:', 'wptheme.campus' ),
        'not_found'             => __( 'Keine Vorschläge gefunden.', 'wptheme.campus' ),
        'not_found_in_trash'    => __( 'Keine Vorschläge im Papierkorb gefunden.', 'wptheme.campus' ),
        
        
        'archives'              => _x( 'Vorschläge-Archive', 'The post type archive label used in nav menus. Default “Post Archives”. ', 'wptheme.campus' ),
        'insert_into_item'      => _x( 'Zum Vorschlag hinzufügen', 'Overrides the “Insert into post” phrase (used when inserting media into a post). ', 'wptheme.campus' ),
        'uploaded_to_this_item' => _x( 'Zu diesem Vorschlag hochgeladen.', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). ', 'wptheme.campus' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'can_export'         => true,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => 'democracy-day',
        'query_var'          => false,
        'rewrite'            => array( 'slug' => 'mitmachen' ),
        'map_meta_cap'		 => true,
		'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'		 	 => 'dashicons-lightbulb',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'revisions' ),
    );

    register_post_type( 'proposal', $args );
}
add_action( 'init', 'sh_register_cpt_proposal' );