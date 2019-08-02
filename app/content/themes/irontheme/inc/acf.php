<?php
add_filter('acf/settings/save_json', 'ith_acf_json_save_point');
function ith_acf_json_save_point( $path ) {
  // update path
  $path = get_stylesheet_directory() . '/inc/acf-json';
  // return
  return $path;
}

add_filter('acf/settings/load_json', 'ith_acf_json_load_point');
function ith_acf_json_load_point( $paths ) {
  // remove original path (optional)
  unset($paths[0]);
  // append path
  $paths[] = get_stylesheet_directory() . '/inc/acf-json';
  // return
  return $paths;
}

if( function_exists('acf_add_options_page') ) {

  acf_add_options_page(array(
    'page_title' 	=> 'Theme settings',
    'menu_title'	=> 'Theme settings',
    'menu_slug' 	=> 'theme-settings',
    'capability'	=> 'edit_posts',
    'redirect'		=> false
  ));

}

function my_acf_init() {

  acf_update_setting('google_api_key', 'AIzaSyAaX1QlThDnYC0tJp8PL9kdxufKXTfIy_0');
}

add_action('acf/init', 'my_acf_init');