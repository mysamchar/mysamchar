<?php
// $Id: theme-settings.php,v 1.2 2009/07/09 16:22:14 christiangnoth Exp $

//
//  An example themes/german_newspaper/theme-settings.php file.
//  description:        http://drupal.org/node/177868
//  form api reference: http://api.drupal.org/api/file/developer/topics/forms_api_reference.html
//

/**
* Implementation of THEMEHOOK_settings() function.
*
* @param $saved_settings
*   array An array of saved settings for this theme.
* @return
*   array A form array.
*/
function phptemplate_settings($saved_settings) 
{
  /*
   * The default values for the theme variables. Make sure $defaults exactly
   * matches the $defaults in the template.php file.
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

  // Merge the saved variables and their default values
  $settings = array_merge($defaults, $saved_settings);
	$options 	= array(
							'1' => t('Enabled'),
							'0' => t('Disabled'));

  // Create the form widgets using Forms API
  $form['gn_newslist'] = array(
    '#type' 	=> 'checkbox',
    '#title' 	=> t('Show Newslist Header Section'),
    '#default_value' => $settings['gn_newslist'],
    '#description' => t('Decide if the Newslist Header Section should be visible or not.'),
  );
  
  $form['gn_bottom_bar'] = array(
    '#type' 	=> 'checkbox',
    '#title' 	=> t('Show Bottom Bar above Footer'),
    '#default_value' => $settings['gn_bottom_bar'],
    '#description' => t('Decide if the Bottom Bar region should be visible or not.'),
  );

  //
  //  Theme Background
  //
	$form['gn_background'] = array(
    '#type' 	=> 'fieldset',
    '#title' 	=> t('Change the Theme Background'),
	  '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['gn_background']['gn_background_img'] = array(
    '#type' 					=> 'radios',
    '#title' 					=> t('Use a Background Image ?'),
		'#default_value' 	=>  $settings['gn_background_img'],
    '#options' 				=> $options,
    '#description' 		=> t('Use a Background Image or not.'),
  );

  if ( theme_get_setting('gn_background_img') )
  {
    $form['gn_background']['gn_background_img_url'] = array(
      '#type' 					=> 	'textfield',
      '#title' 					=> 	t('Background Image URL'),
      '#default_value' 	=> 	$settings['gn_background_img_url'],
      '#size' 					=> 	10,
      '#description' 		=> 	t('Background Image Path'),
    );
    $form['gn_background']['gn_background_img_options'] = array(
      '#type' 					=> 	'textfield',
      '#title' 					=> 	t('Background Image URL Options'),
      '#default_value' 	=> 	$settings['gn_background_img_options'],
      '#size' 					=> 	10,
      '#description' 		=> 	t('Background Image Options like: repeat, top, left etc.'),
    );
    $form['gn_background']['gn_background_color'] = array(
      '#type' 					=> 	'textfield',
      '#title' 					=> 	t('Background Color ?'),
      '#default_value' 	=> 	$settings['gn_background_color'],
      '#size' 					=> 	10,
      '#description' 		=> 	t('Background Color'),
    );
  }
  else
  {
    $form['gn_background']['gn_background_color'] = array(
      '#type' 					=> 	'textfield',
      '#title' 					=> 	t('Background Color ?'),
      '#default_value' 	=> 	$settings['gn_background_color'],
      '#size' 					=> 	10,
      '#description' 		=> 	t('Background Color'),
    );
    $form['gn_background']['gn_background_img_url'] = array(
      '#type' 					=> 	'textfield',
      '#title' 					=> 	t('Background Image URL'),
      '#default_value' 	=> 	$settings['gn_background_img_url'],
      '#size' 					=> 	10,
      '#description' 		=> 	t('Background Image Path'),
    );
    $form['gn_background']['gn_background_img_options'] = array(
      '#type' 					=> 	'textfield',
      '#title' 					=> 	t('Background Image URL Options'),
      '#default_value' 	=> 	$settings['gn_background_img_options'],
      '#size' 					=> 	10,
      '#description' 		=> 	t('Background Image Options like: repeat, top, left etc.'),
    );
  }
  
	$form['gn_background']['gn_background_img']['#element_validate'][] = 'gn_options_check';
  
  // Return the additional form widgets
  return $form;
}


/**
* Check theme option settings
*/
function gn_options_check($form, &$form_state) {
  // Check radio settings.
  if ( $form_state['values']['gn_background_img'] )
	{
	  $form['gn_background']['gn_background_color']['#disabled'] 		= TRUE;
	  $form['gn_background']['gn_background_img_url']['#disabled'] 	= FALSE;

		$img_url = $form_state['values']['gn_background_img_url'];

/*
		$form_state['redirect'] = 'search/search_files/'. trim($form_state['values'][$form_id]);
    $parts = pathinfo($file->filename);
    $filename = (! empty($key)) ? str_replace('/', '_', $key) .'_sublogo.'. $parts['extension'] : 'sublogo.'. $parts['extension'];
    if (file_copy($file, $filename))
		{
      $_POST['use_sublogo'] = $form_state['values']['use_sublogo'] = TRUE;
      $_POST['sublogo_path'] = $form_state['values']['sublogo_path'] = $file->filepath;
    }
*/
  }
}


?>