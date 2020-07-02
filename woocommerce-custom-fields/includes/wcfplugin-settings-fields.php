<?php

function wcfplugin_settings()
{

  // If plugin settings don't exist, then create them
  if (false == get_option('wcfplugin_settings')) {
    add_option('wcfplugin_settings');
  }

  // Define (at least) one section for our fields
  add_settings_section(
    // Unique identifier for the section
    'wcfplugin_settings_section',
    // Section Title
    __('Plugin Settings Section', 'wcfplugin'),
    // Callback for an optional description
    'wcfplugin_settings_section_callback',
    // Admin page to add section to
    'wcfplugin'
  );

  // // Input Text Field
  // add_settings_field(
  //   // Unique identifier for field
  //   'wcfplugin_settings_input_text',
  //   // Field Title
  //   __( 'Text Input', 'wcfplugin'),
  //   // Callback for field markup
  //   'wcfplugin_settings_text_input_callback',
  //   // Page to go on
  //   'wcfplugin',
  //   // Section to go in
  //   'wcfplugin_settings_section'
  // );

  // // Textarea Field
  // add_settings_field(
  //   'wcfplugin_settings_textarea',
  //   __( 'Text Area', 'wcfplugin'),
  //   'wcfplugin_settings_textarea_callback',
  //   'wcfplugin',
  //   'wcfplugin_settings_section'
  // );

  // Checkbox Fields
  // Fullname 
  add_settings_field(
    'wcfplugin_settings_fullname',
    __('Add Fullname Field', 'wcfplugin'),
    'wcfplugin_settings_checkbox_callback_fullname',
    'wcfplugin',
    'wcfplugin_settings_section',
    [
      'label' => ''
    ]
  );

  // Country 
  add_settings_field(
    'wcfplugin_settings_country',
    __('Add Country Field', 'wcfplugin'),
    'wcfplugin_settings_checkbox_callback_country',
    'wcfplugin',
    'wcfplugin_settings_section',
    [
      'label' => ''
    ]
  );

  // Address 1
  add_settings_field(
    'wcfplugin_settings_address',
    __('Add Address Field', 'wcfplugin'),
    'wcfplugin_settings_checkbox_callback_address',
    'wcfplugin',
    'wcfplugin_settings_section',
    [
      'label' => ''
    ]
  );

  // Address 2
  add_settings_field(
    'wcfplugin_settings_address2',
    __('Add Address-2 Field', 'wcfplugin'),
    'wcfplugin_settings_checkbox_callback_address2',
    'wcfplugin',
    'wcfplugin_settings_section',
    [
      'label' => ''
    ]
  );

  // PostCode
  add_settings_field(
    'wcfplugin_settings_postcode',
    __('Add PostCode Field', 'wcfplugin'),
    'wcfplugin_settings_checkbox_callback_postcode',
    'wcfplugin',
    'wcfplugin_settings_section',
    [
      'label' => ''
    ]
  );

  // City
  add_settings_field(
    'wcfplugin_settings_city',
    __('Add City Field', 'wcfplugin'),
    'wcfplugin_settings_checkbox_callback_city',
    'wcfplugin',
    'wcfplugin_settings_section',
    [
      'label' => ''
    ]
  );

  // Phone
  add_settings_field(
    'wcfplugin_settings_phone',
    __('Add Phone Field', 'wcfplugin'),
    'wcfplugin_settings_checkbox_callback_phone',
    'wcfplugin',
    'wcfplugin_settings_section',
    [
      'label' => ''
    ]
  );


  // // Radio Field
  // add_settings_field(
  //   'wcfplugin_settings_radio',
  //   __( 'Radio', 'wcfplugin'),
  //   'wcfplugin_settings_radio_callback',
  //   'wcfplugin',
  //   'wcfplugin_settings_section',
  //   [
  //     'option_one' => 'Radio 1',
  //     'option_two' => 'Radio 2'
  //   ]
  // );

  // // Dropdown
  // add_settings_field(
  //   'wcfplugin_settings_select',
  //   __( 'Select', 'wcfplugin'),
  //   'wcfplugin_settings_select_callback',
  //   'wcfplugin',
  //   'wcfplugin_settings_section',
  //   [
  //     'option_one' => 'Select Option 1',
  //     'option_two' => 'Select Option 2',
  //     'option_three' => 'Select Option 3'
  //   ]
  // );


  register_setting(
    'wcfplugin_settings',
    'wcfplugin_settings'
  );
}
add_action('admin_init', 'wcfplugin_settings');

function wcfplugin_settings_section_callback()
{

  esc_html_e('Add or Remove Custom Registration Fields for WooCommerce', 'wcfplugin');
}

// function wcfplugin_settings_text_input_callback() {

//   $options = get_option( 'wcfplugin_settings' );

// 	$text_input = '';
// 	if( isset( $options[ 'text_input' ] ) ) {
// 		$text_input = esc_html( $options['text_input'] );
// 	}

//   echo '<input type="text" id="wcfplugin_customtext" name="wcfplugin_settings[text_input]" value="' . $text_input . '" />';

// }

// function wcfplugin_settings_textarea_callback() {

//   $options = get_option( 'wcfplugin_settings' );

// 	$textarea = '';
// 	if( isset( $options[ 'textarea' ] ) ) {
// 		$textarea = esc_html( $options['textarea'] );
// 	}

//   echo '<textarea id="wcfplugin_settings_textarea" name="wcfplugin_settings[textarea]" rows="5" cols="50">' . $textarea . '</textarea>';

// }

function wcfplugin_settings_checkbox_callback_fullname($args)
{

  $options = get_option('wcfplugin_settings');

  $checkbox = '';
  if (isset($options['fullname'])) {
    $checkbox = esc_html($options['fullname']);
  }

  $html = '<input type="checkbox" id="wcfplugin_settings_checkbox_fullname" name="wcfplugin_settings[fullname]" value="1"' . checked(1, $checkbox, false) . '/>';
  $html .= '&nbsp;';
  $html .= '<label for="wcfplugin_settings_checkbox_fullname">' . $args['label'] . '</label>';

  echo $html;
}

function wcfplugin_settings_checkbox_callback_country($args)
{

  $options = get_option('wcfplugin_settings');

  $checkbox = '';
  if (isset($options['country'])) {
    $checkbox = esc_html($options['country']);
  }

  $html = '<input type="checkbox" id="wcfplugin_settings_checkbox_country" name="wcfplugin_settings[country]" value="1"' . checked(1, $checkbox, false) . '/>';
  $html .= '&nbsp;';
  $html .= '<label for="wcfplugin_settings_checkbox_country">' . $args['label'] . '</label>';

  echo $html;
}


function wcfplugin_settings_checkbox_callback_address($args)
{

  $options = get_option('wcfplugin_settings');

  $checkbox = '';
  if (isset($options['address'])) {
    $checkbox = esc_html($options['address']);
  }

  $html = '<input type="checkbox" id="wcfplugin_settings_checkbox_address" name="wcfplugin_settings[address]" value="1"' . checked(1, $checkbox, false) . '/>';
  $html .= '&nbsp;';
  $html .= '<label for="wcfplugin_settings_checkbox_address">' . $args['label'] . '</label>';

  echo $html;
}

function wcfplugin_settings_checkbox_callback_address2($args)
{

  $options = get_option('wcfplugin_settings');

  $checkbox = '';
  if (isset($options['address2'])) {
    $checkbox = esc_html($options['address2']);
  }

  $html = '<input type="checkbox" id="wcfplugin_settings_checkbox_address2" name="wcfplugin_settings[address2]" value="1"' . checked(1, $checkbox, false) . '/>';
  $html .= '&nbsp;';
  $html .= '<label for="wcfplugin_settings_checkbox_address2">' . $args['label'] . '</label>';

  echo $html;
}

function wcfplugin_settings_checkbox_callback_postcode($args)
{

  $options = get_option('wcfplugin_settings');

  $checkbox = '';
  if (isset($options['postcode'])) {
    $checkbox = esc_html($options['postcode']);
  }

  $html = '<input type="checkbox" id="wcfplugin_settings_checkbox_postcode" name="wcfplugin_settings[postcode]" value="1"' . checked(1, $checkbox, false) . '/>';
  $html .= '&nbsp;';
  $html .= '<label for="wcfplugin_settings_checkbox_postcode">' . $args['label'] . '</label>';

  echo $html;
}

function wcfplugin_settings_checkbox_callback_city($args)
{

  $options = get_option('wcfplugin_settings');

  $checkbox = '';
  if (isset($options['city'])) {
    $checkbox = esc_html($options['city']);
  }

  $html = '<input type="checkbox" id="wcfplugin_settings_checkbox_city" name="wcfplugin_settings[city]" value="1"' . checked(1, $checkbox, false) . '/>';
  $html .= '&nbsp;';
  $html .= '<label for="wcfplugin_settings_checkbox_city">' . $args['label'] . '</label>';

  echo $html;
}

function wcfplugin_settings_checkbox_callback_phone($args)
{

  $options = get_option('wcfplugin_settings');

  $checkbox = '';
  if (isset($options['phone'])) {
    $checkbox = esc_html($options['phone']);
  }

  $html = '<input type="checkbox" id="wcfplugin_settings_checkbox_phone" name="wcfplugin_settings[phone]" value="1"' . checked(1, $checkbox, false) . '/>';
  $html .= '&nbsp;';
  $html .= '<label for="wcfplugin_settings_checkbox_phone">' . $args['label'] . '</label>';

  echo $html;
}





// function wcfplugin_settings_radio_callback( $args ) {

//   $options = get_option( 'wcfplugin_settings' );

//   $radio = '';
// 	if( isset( $options[ 'radio' ] ) ) {
// 		$radio = esc_html( $options['radio'] );
// 	}

// 	$html = '<input type="radio" id="wcfplugin_settings_radio_one" name="wcfplugin_settings[radio]" value="1"' . checked( 1, $radio, false ) . '/>';
// 	$html .= ' <label for="wcfplugin_settings_radio_one">'. $args['option_one'] .'</label> &nbsp;';
// 	$html .= '<input type="radio" id="wcfplugin_settings_radio_two" name="wcfplugin_settings[radio]" value="2"' . checked( 2, $radio, false ) . '/>';
// 	$html .= ' <label for="wcfplugin_settings_radio_two">'. $args['option_two'] .'</label>';

// 	echo $html;

// }

// function wcfplugin_settings_select_callback( $args ) {

//   $options = get_option( 'wcfplugin_settings' );

//   $select = '';
// 	if( isset( $options[ 'select' ] ) ) {
// 		$select = esc_html( $options['select'] );
// 	}

//   $html = '<select id="wcfplugin_settings_options" name="wcfplugin_settings[select]">';

// 	$html .= '<option value="option_one"' . selected( $select, 'option_one', false) . '>' . $args['option_one'] . '</option>';
// 	$html .= '<option value="option_two"' . selected( $select, 'option_two', false) . '>' . $args['option_two'] . '</option>';
// 	$html .= '<option value="option_three"' . selected( $select, 'option_three', false) . '>' . $args['option_three'] . '</option>';

// 	$html .= '</select>';

// 	echo $html;

// }
