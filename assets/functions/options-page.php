<?php
/**
 * Register options page.
 */
function sh_register_options() {
	if( function_exists('acf_add_options_page') ) {

		if( isset($_GET['page']) && $_GET['page'] == 'theme-options' ) {
			global $polylang;

			$polylang->curlang = false;
		}

		$page = array(

			/* (string) The title displayed on the options page. Required. */
			'page_title' => 'Optionen',

			/* (string) The title displayed in the wp-admin sidebar. Defaults to page_title */
			'menu_title' => '',

			/* (string) The slug name to refer to this menu by (should be unique for this menu).
			Defaults to a url friendly version of menu_slug */
			'menu_slug' => 'theme-options',

			/* (string) The capability required for this menu to be displayed to the user. Defaults to edit_posts.
			Read more about capability here: http://codex.wordpress.org/Roles_and_Capabilities */
			'capability' => 'edit_posts',

			/* (int|string) The position in the menu order this menu should appear.
			WARNING: if two menu items use the same position attribute, one of the items may be overwritten so that only one item displays!
			Risk of conflict can be reduced by using decimal instead of integer values, e.g. '63.3' instead of 63 (must use quotes).
			Defaults to bottom of utility menu items */
			'position' => false,

			/* (string) The slug of another WP admin page. if set, this will become a child page. */
			'parent_slug' => '',

			/* (string) The icon url for this menu. Defaults to default WordPress gear */
			'icon_url' => false,

			/* (boolean) If set to true, this options page will redirect to the first child page (if a child page exists).
			If set to false, this parent page will appear alongside any child pages. Defaults to true */
			'redirect' => true,

			/* (int|string) The '$post_id' to save/load data to/from. Can be set to a numeric post ID (123), or a string ('user_2').
			Defaults to 'options'. Added in v5.2.7 */
			'post_id' => 'sh_options',

			/* (boolean)  Whether to load the option (values saved from this options page) when WordPress starts up.
			Defaults to false. Added in v5.2.8. */
			'autoload' => false,

		);

		acf_add_options_page( $page );

	}
}
add_action( 'init', 'sh_register_options' );

// set theme options for global access
function sh_set_theme_options(){

	global $theme_options;

	$theme_options = array();

	// define fields
	$fields = array( 'header_logo', 'footer_logo', 'footer_logo_zusatz', 'company_name', 'company_address', 'company_phone', 'company_mail', 'company_website', 'newsletter_form', 'download_form', 'whitepaper_sidebar_title', 'whitepaper_sidebar_sap_text', 'whitepaper_sidebar_form_text', 'contact_person_background', 'contact_member', 'contact_cta_title', 'references_dl_title', 'references_dl_subtitle', 'addresses' );

	// loop defined fields and set them in theme options array
	foreach( $fields as $field ) {

		if( function_exists('acf_add_local_field_group') )
			$value = get_field( $field, 'sh_options' );

		if( !empty($value) ){
			$theme_options[$field] = $value;
		} else {
			$theme_options[$field] = false;
		}

	}

}

add_action( 'init', 'sh_set_theme_options' );


// get contact info from theme options
function cd_get_contact_info() {
	$lang = pll_current_language();
	
	$fields = array( 'name', 'address', 'tel', 'mail', 'facebook', 'twitter' );
	foreach( $fields as $field ) {
		$contact[$field] = get_field( $lang . '_' . $field, 'sh_options' );
	}
	
	return $contact;
}









