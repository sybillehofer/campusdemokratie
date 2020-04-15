<?php
	
function cd_change_post_label() {
    global $menu;
    global $submenu;
    $submenu['edit.php'][5][0] = 'Alle Beiträge';
}
add_action( 'admin_menu', 'cd_change_post_label' );

function cd_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'News';
    $labels->singular_name = 'Beitrag';
    $labels->add_new = 'Erstellen';
    $labels->add_new_item = 'Neuer Beitrag';
    $labels->edit_item = 'News bearbeiten';
    $labels->new_item = 'News Beitrag';
    $labels->view_item = 'News ansehen';
    $labels->search_items = 'News suchen';
    $labels->not_found = 'Keine Beiträge gefunden.';
    $labels->not_found_in_trash = 'Keine Beiträge im Papierkorb gefunden.';
    $labels->all_items = 'Alle Beiträge';
    $labels->menu_name = 'News';
    $labels->name_admin_bar = 'Beitrag';
    
    $menu_icon = &$wp_post_types['post']->menu_icon;
    $menu_icon = 'dashicons-megaphone';
}
add_action( 'init', 'cd_change_post_object' );