<?php
	
/**
 * Register a custom post type called "project".
 *
 * @see get_post_type_labels() for label keys.
 */
function sh_register_cpt_project() {
    $labels = array(
        'name'                  => _x( 'Projekte', 'Post type general name', 'wptheme.campus' ),
        'singular_name'         => _x( 'Projekt', 'Post type singular name', 'wptheme.campus' ),
        'menu_name'             => _x( 'Projekte', 'Admin Menu text', 'wptheme.campus' ),
        'name_admin_bar'        => _x( 'Projekt', 'Add New on Toolbar', 'wptheme.campus' ),
        'add_new'               => __( 'Hinzufügen', 'wptheme.campus' ),
        'add_new_item'          => __( 'Neues Projekt hinzufügen', 'wptheme.campus' ),
        'new_item'              => __( 'Neues Projekt', 'wptheme.campus' ),
        'edit_item'             => __( 'Projekt bearbeiten', 'wptheme.campus' ),
        'view_item'             => __( 'Projekt ansehen', 'wptheme.campus' ),
        'all_items'             => __( 'Alle Projekte', 'wptheme.campus' ),
        'search_items'          => __( 'Projekt suchen', 'wptheme.campus' ),
        'parent_item_colon'     => __( 'Übergeordnetes Projekt:', 'wptheme.campus' ),
        'not_found'             => __( 'Keine Projekte gefunden.', 'wptheme.campus' ),
        'not_found_in_trash'    => __( 'Keine Projekte in Papierkorb gefunden.', 'wptheme.campus' ),
        
        
        'archives'              => _x( 'Projekt Archive', 'The post type archive label used in nav menus. Default “Post Archives”. ', 'wptheme.campus' ),
        'insert_into_item'      => _x( 'Zum Projekt hinzufügen', 'Overrides the “Insert into post” phrase (used when inserting media into a post). ', 'wptheme.campus' ),
        'uploaded_to_this_item' => _x( 'Zu diesem Projekt hochgeladen.', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). ', 'wptheme.campus' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'can_export'         => true,
        'public'             => false,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'projekte' ),
        'capability_type'    => array( 'project', 'projects' ),
        'map_meta_cap'		 => true,
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'		 	 => 'dashicons-clipboard',
        'supports'           => array( 'title'),
    );

    register_post_type( 'project', $args );
}
add_action( 'init', 'sh_register_cpt_project' );



/**
 * Register custom taxonomies called "akteur", "zielgruppe", "ort", "category", "stichworte".
 *
 */
function sh_register_taxonomies() {
	
	$labels = array(
		'name'              => _x( 'Akteur', 'taxonomy general name', 'wptheme.campus' ),
		'singular_name'     => _x( 'Akteur', 'taxonomy singular name', 'wptheme.campus' ),
		'search_items'      => __( 'Akteur suchen', 'wptheme.campus' ),
		'all_items'         => __( 'Alle Akteure', 'wptheme.campus' ),
		'edit_item'         => __( 'Akteur bearbeiten', 'wptheme.campus' ),
		'update_item'       => __( 'Akteur aktualisieren', 'wptheme.campus' ),
		'add_new_item'      => __( 'Akteur hinzufügen', 'wptheme.campus' ),
		'new_item_name'     => __( 'Neuer Akteur', 'wptheme.campus' ),
		'parent_item'    	=> __( 'Übergeordneter Akteur', 'wptheme.campus' ),
		'menu_name'         => __( 'Akteure', 'wptheme.campus' ),
		'not_found'         => __( 'Keine Akteure gefunden.', 'wptheme.campus' ),		
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'akteur' ),
	);

	register_taxonomy( 'akteur', array( 'project' ), $args );

	
	$labels = array(
		'name'              => _x( 'Zielgruppe', 'taxonomy general name', 'wptheme.campus' ),
		'singular_name'     => _x( 'Zielgruppe', 'taxonomy singular name', 'wptheme.campus' ),
		'search_items'      => __( 'Zielgruppe suchen', 'wptheme.campus' ),
		'all_items'         => __( 'Alle Zielgruppen', 'wptheme.campus' ),
		'edit_item'         => __( 'Zielgruppe bearbeiten', 'wptheme.campus' ),
		'update_item'       => __( 'Zielgruppe aktualisieren', 'wptheme.campus' ),
		'add_new_item'      => __( 'Zielgruppe hinzufügen', 'wptheme.campus' ),
		'new_item_name'     => __( 'Neue Zielgruppe', 'wptheme.campus' ),
		'parent_item'    	=> __( 'Übergeordnete Zielgruppe', 'wptheme.campus' ),
		'menu_name'         => __( 'Zielgruppen', 'wptheme.campus' ),
		'not_found'         => __( 'Keine Zielgruppen gefunden.', 'wptheme.campus' ),		
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'zielgruppe' ),
	);

	register_taxonomy( 'zielgruppe', array( 'project' ), $args );
	
	
	$labels = array(
		'name'              => _x( 'Ort', 'taxonomy general name', 'wptheme.campus' ),
		'singular_name'     => _x( 'Ort', 'taxonomy singular name', 'wptheme.campus' ),
		'search_items'      => __( 'Ort suchen', 'wptheme.campus' ),
		'all_items'         => __( 'Alle Orte', 'wptheme.campus' ),
		'edit_item'         => __( 'Ort bearbeiten', 'wptheme.campus' ),
		'update_item'       => __( 'Ort aktualisieren', 'wptheme.campus' ),
		'add_new_item'      => __( 'Ort hinzufügen', 'wptheme.campus' ),
		'new_item_name'     => __( 'Neuer Ort', 'wptheme.campus' ),
		'parent_item'    	=> __( 'Übergeordneter Ort', 'wptheme.campus' ),
		'menu_name'         => __( 'Orte', 'wptheme.campus' ),
		'not_found'         => __( 'Keine Orte gefunden.', 'wptheme.campus' ),		
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'ort' ),
	);

	register_taxonomy( 'ort', array( 'project' ), $args );
	
	
	$labels = array(
		'name'              => _x( 'Kategorie', 'taxonomy general name', 'wptheme.campus' ),
		'singular_name'     => _x( 'Kategorie', 'taxonomy singular name', 'wptheme.campus' ),
		'search_items'      => __( 'Kategorie suchen', 'wptheme.campus' ),
		'all_items'         => __( 'Alle Kategorien', 'wptheme.campus' ),
		'edit_item'         => __( 'Kategorie bearbeiten', 'wptheme.campus' ),
		'update_item'       => __( 'Kategorie aktualisieren', 'wptheme.campus' ),
		'add_new_item'      => __( 'Kategorie hinzufügen', 'wptheme.campus' ),
		'new_item_name'     => __( 'Neue Kategorie', 'wptheme.campus' ),
		'parent_item'    	=> __( 'Übergeordnete Kategorie', 'wptheme.campus' ),
		'menu_name'         => __( 'Kategorien', 'wptheme.campus' ),
		'not_found'         => __( 'Keine Kategorien gefunden.', 'wptheme.campus' ),		
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'kategorie' ),
	);

	register_taxonomy( 'project-category', array( 'project' ), $args );
	
	
	$labels = array(
		'name'              => _x( 'Stichworte', 'taxonomy general name', 'wptheme.campus' ),
		'singular_name'     => _x( 'Stichwort', 'taxonomy singular name', 'wptheme.campus' ),
		'search_items'      => __( 'Stichwort suchen', 'wptheme.campus' ),
		'all_items'         => __( 'Alle Stichworte', 'wptheme.campus' ),
		'edit_item'         => __( 'Stichwort bearbeiten', 'wptheme.campus' ),
		'update_item'       => __( 'Stichwort aktualisieren', 'wptheme.campus' ),
		'add_new_item'      => __( 'Stichwort hinzufügen', 'wptheme.campus' ),
		'new_item_name'     => __( 'Neues Stichwort', 'wptheme.campus' ),
		'parent_item'    	=> __( 'Übergeordnetes Stichwort', 'wptheme.campus' ),
		'menu_name'         => __( 'Stichworte', 'wptheme.campus' ),
		'not_found'         => __( 'Keine Stichworte gefunden.', 'wptheme.campus' ),		
	);

	$args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'stichwort' ),
	);

	register_taxonomy( 'tag', array( 'project' ), $args );
	
}
add_action( 'init', 'sh_register_taxonomies', 0 );