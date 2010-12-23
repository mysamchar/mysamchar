<?php
// $Id: template.php,v 1.2 2009/07/09 16:22:14 christiangnoth Exp $

/*
* Initialize theme settings
*/
if (is_null(theme_get_setting('gn_background_img_options')))
{  
  global $theme_key;

  /*
   * The default values for the theme variables. Make sure $defaults exactly
   * matches the $defaults in the theme-settings.php file.
   */
  $defaults = array(              
    'gn_newslist'           		=> 1,
    'gn_bottom_bar'         		=> 1,
    'gn_background'         		=> 0,
		'gn_background_color'   		=> 'white',
    'gn_background_img'     		=> 0,
    'gn_background_img_options'	=> '',
    'gn_background_img_url' 		=> '',
  );

  // Get default theme settings.
  $settings = theme_get_settings($theme_key);
  // Don't save the toggle_node_info_ variables.
  if (module_exists('node')) {
    foreach (node_get_types() as $type => $name) {
      unset($settings['toggle_node_info_' . $type]);
    }
  }
  // Save default theme settings.
  variable_set(
    str_replace('/', '_', 'theme_'. $theme_key .'_settings'),
    array_merge($defaults, $settings)
  );
  // Force refresh of Drupal internals.
  theme_get_setting('', TRUE);
}
?>