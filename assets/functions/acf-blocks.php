<?php

// Check if function exists and hook into setup.
if( function_exists('acf_register_block_type') ) {
    add_action('acf/init', 'register_acf_block_types');
}

function register_acf_block_types() {
    acf_register_block_type(array(
        'name'              => 'logo-link-list',
        'title'             => __('Logo-Link-Liste'),
        'description'       => __(''),
        'render_template'   => 'parts/blocks/logo-link-list.php',
        'category'          => 'common',
        'icon'              => 'editor-ul',
        'keywords'          => array( 'logo', 'link', 'list' ),
        'post_types'        => array('post'),
        'mode'              => 'auto',
    ));

    acf_register_block_type(array(
        'name'              => 'foto-link',
        'title'             => __('Foto-Link'),
        'description'       => __(''),
        'render_template'   => 'parts/blocks/foto-link.php',
        'category'          => 'common',
        'icon'              => 'camera',
        'keywords'          => array( 'foto', 'link' ),
        'post_types'        => array('post'),
        'mode'              => 'auto',
    ));
}