<?php
// Theme support options
require_once(get_template_directory().'/assets/functions/theme-support.php'); 

// WP Head and other cleanup functions
require_once(get_template_directory().'/assets/functions/cleanup.php'); 

// Register scripts and stylesheets
require_once(get_template_directory().'/assets/functions/enqueue-scripts.php'); 

// Register helper functions
require_once(get_template_directory().'/assets/functions/helpers.php');

// Add custom post type project
require_once(get_template_directory().'/assets/functions/cpt-project.php'); 

// Register general hooks
require_once(get_template_directory().'/assets/functions/hooks.php'); 

// Register options page
require_once(get_template_directory().'/assets/functions/options-page.php');

// Register custom menus and menu walkers
require_once(get_template_directory().'/assets/functions/menu.php'); 

// Register sidebars/widget areas
require_once(get_template_directory().'/assets/functions/sidebar.php'); 

// Makes WordPress comments suck less
//require_once(get_template_directory().'/assets/functions/comments.php'); 

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/assets/functions/page-navi.php'); 

// Adds support for multiple languages
require_once(get_template_directory().'/assets/translation/translation.php'); 

// Remove 4.2 Emoji Support
require_once(get_template_directory().'/assets/functions/disable-emoji.php'); 

// Adds site styles to the WordPress editor
require_once(get_template_directory().'/assets/functions/editor-styles.php'); 

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/assets/functions/related-posts.php'); 

// Use this as a template for custom post types
// require_once(get_template_directory().'/assets/functions/custom-post-type.php');

// Customize the WordPress login menu
require_once(get_template_directory().'/assets/functions/login.php'); 

// Customize the WordPress admin
require_once(get_template_directory().'/assets/functions/admin.php'); 

// Settings for default posts
require_once(get_template_directory().'/assets/functions/default-posts.php'); 

// Get post objects
require_once(get_template_directory().'/assets/functions/get-posts.php'); 

// Get AJAX handling for glossary
require_once(get_template_directory().'/assets/functions/glossary-ajax.php'); 

// Get all shortcodes
require_once(get_template_directory().'/assets/functions/shortcodes.php'); 

// Get all custom acf blocks for Gutenberg Editor
require_once(get_template_directory().'/assets/functions/acf-blocks.php'); 