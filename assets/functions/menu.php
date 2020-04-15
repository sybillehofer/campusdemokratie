<?php
if( !function_exists('pll__') ) { 
	return;
}
		
// Register menus
register_nav_menus(
	array(
		'main-nav' 		=> pll__( 'The main menu' ),
		'meta-nav' 		=> pll__( 'Meta links in Header' ), 
		'icon-nav' 		=> pll__( 'Icon links on front page' ), 		
		'footer-links' 	=> pll__( 'Footer links' ),
	)
);	

// The meta menu
function cd_meta_nav() {
	 wp_nav_menu(array(
        'container' => false,                           	// Remove nav container
        'menu_class' => 'menu',  // Adding custom nav class
        'items_wrap' => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion medium-dropdown">%3$s</ul>',
        'theme_location' => 'meta-nav',        				// Where it's located in the theme
        'depth' => 5,                                   	// Limit the depth of the nav
        'fallback_cb' => false,                         	// Fallback function (see below)
        'walker' => new Topbar_Menu_Walker()
    ));
} 

// The main menu
function cd_main_nav() {
	 wp_nav_menu(array(
        'container' => false,                           	// Remove nav container
        'menu_class' => 'vertical medium-horizontal menu',  // Adding custom nav class
        'items_wrap' => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion medium-dropdown">%3$s</ul>',
        'theme_location' => 'main-nav',        				// Where it's located in the theme
        'depth' => 2,                                   	// Limit the depth of the nav
        'fallback_cb' => false,                         	// Fallback function (see below)
        'walker' => new Topbar_Menu_Walker()
    ));
} 

// The icon menu
function cd_icon_nav() {
	 wp_nav_menu(array(
        'container' => false,                           	// Remove nav container
        'menu_class' => 'vertical menu icon-menu',  // Adding custom nav class
        'items_wrap' => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion medium-dropdown">%3$s</ul>',
        'theme_location' => 'icon-nav',        				// Where it's located in the theme
        'depth' => 1,                                   	// Limit the depth of the nav
        'fallback_cb' => false,                         	// Fallback function (see below)
        'walker' => new Topbar_Menu_Walker()
    ));
} 


/* 
 * 
*/
function cd_add_icon_menu_icons( $items, $args ) {

	if ($args->theme_location === 'icon-nav') {
		// loop
		foreach( $items as &$item ) {
			
			// vars
			$icon = get_field('icon', $item);
			
			// append icon
			if( $icon ) {
				$item->title = '<img class="iconnav-img" src="' . $icon['url'] . '" alt="' . $item->title . '" /><span>' . $item->title . '</span>';
			}
			
		}	

	}
	
	// return
	return $items;
	
}
add_filter('wp_nav_menu_objects', 'cd_add_icon_menu_icons', 10, 2);



// Big thanks to Brett Mason (https://github.com/brettsmason) for the awesome walker
class Topbar_Menu_Walker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = Array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"menu\">\n";
    }
}

// The Footer Menu
function joints_footer_links() {
    wp_nav_menu(array(
    	'container' => 'false',                         // Remove nav container
    	'menu' => pll__( 'Footer links' ),   								// Nav name
    	'menu_class' => 'menu',      					// Adding custom nav class
    	'theme_location' => 'footer-links',             // Where it's located in the theme
        'depth' => 0,                                   // Limit the depth of the nav
    	'fallback_cb' => ''  							// Fallback function
	));
} /* End Footer Menu */

// Header Fallback Menu
function joints_main_nav_fallback() {
	wp_page_menu( array(
		'show_home' => true,
    	'menu_class' => '',      						// Adding custom nav class
		'include'     => '',
		'exclude'     => '',
		'echo'        => true,
        'link_before' => '',                           // Before each link
        'link_after' => ''                             // After each link
	) );
}

// Footer Fallback Menu
function joints_footer_links_fallback() {
	/* You can put a default here if you like */
}

// Add Foundation active class to menu
function required_active_nav_class( $classes, $item ) {
    if ( $item->current == 1 || $item->current_item_ancestor == true ) {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'required_active_nav_class', 10, 2 );


// change language titles for menus
function cd_change_menu_language_titles ( $items, $args ) {
	foreach( $items as $item ) {
		if( in_array( 'lang-item', $item->classes) ) {
			$title = $item->lang;
			$title = substr($title, strpos($title, '-') + 1);
			$item->title = $title;
		}	
	}
    return $items;
}
add_filter( 'wp_nav_menu_objects', 'cd_change_menu_language_titles', 10, 2 );








