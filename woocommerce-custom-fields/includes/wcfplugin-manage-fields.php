<?php

///////////////////////////////
// 1. ADD FIELDS
///////////////////////////////

function wcfplugin_get_account_fields()
{
    $options = get_option('wcfplugin_settings');
    if ($options['fullname']) {
        $addElements = array(
            'billing_first_name' => array(
                'type'  => 'text',
                'label' => __('First Name', 'wcfplugin'),
                'class' => array('form-row-first'),
                'autocomplete' => 'on',
                'required' => true,
            ),
            'billing_last_name' => array(
                'type'  => 'text',
                'label' => __('Last Name', 'wcfplugin'),
                'class' => array('form-row-last'),
                'autocomplete' => 'on',
                'required' => true,
            )
        );
    }
    if ($options['country']) {
        $addElements['billing_country'] = array(
            'type'  => 'country',
            'label' => __('Country', 'wcfplugin'),
            'required' => true,
        );
    }
    if ($options['city']) {
        $addElements['billing_city'] = array(
            'type'  => 'text',
            'label' => __('City', 'wcfplugin'),
            'required' => true,
        );
    }
    if ($options['phone']) {
        $addElements['billing_phone'] = array(
            'type'  => 'tel',
            'label' => __('Phone', 'wcfplugin'),
            'required' => true,
        );
    }
    if ($options['address']) {
        $addElements['billing_address_1'] = array(
            'type'  => 'text',
            'label' => __('Address Line 1', 'wcfplugin'),
            'required' => true,
        );
    }
    if ($options['address2']) {
        $addElements['billing_address_2'] = array(
            'type'  => 'text',
            'label' => __('Address Line 2', 'wcfplugin'),
            'required' => true,
        );
    }
    if ($options['postcode']) {
        $addElements['billing_postcode'] = array(
            'type'  => 'text',
            'label' => __('Postcode', 'wcfplugin'),
            'required' => true,
        );
    }

    return apply_filters('wcfplugin_get_account_fields', $addElements);
}

function wcfplugin_print_user_frontend_fields()
{
    $fields = wcfplugin_get_account_fields();
    foreach ($fields as $key => $field_args) {
        woocommerce_form_field($key, $field_args);
    }
}

add_action('woocommerce_register_form', 'wcfplugin_print_user_frontend_fields', 10);



///////////////////////////////
// 2. VALIDATE FIELDS
///////////////////////////////

add_filter('woocommerce_registration_errors', 'wcfplugin_validate_name_fields', 10, 3);

function wcfplugin_validate_name_fields($errors, $username, $email)
{
    if (isset($_POST['billing_first_name']) && empty($_POST['billing_first_name'])) {
        $errors->add('billing_first_name_error', __('<strong>Error</strong>: First name is required!', 'woocommerce'));
    }
    if (isset($_POST['billing_last_name']) && empty($_POST['billing_last_name'])) {
        $errors->add('billing_last_name_error', __('<strong>Error</strong>: Last name is required!.', 'woocommerce'));
    }
    if (isset($_POST['billing_country']) && empty($_POST['billing_country'])) {
        $errors->add('billing_country_error', __('<strong>Error</strong>: Country is required!.', 'woocommerce'));
    }
    if (isset($_POST['billing_city']) && empty($_POST['billing_city'])) {
        $errors->add('billing_city_error', __('<strong>Error</strong>: City is required!.', 'woocommerce'));
    }
    if (isset($_POST['billing_phone']) && empty($_POST['billing_phone'])) {
        $errors->add('billing_phone_error', __('<strong>Error</strong>: Phone is required!.', 'woocommerce'));
    }
    if (isset($_POST['billing_address_1']) && empty($_POST['billing_address_1'])) {
        $errors->add('billing_address_1_error', __('<strong>Error</strong>: Address Line-1 is required!.', 'woocommerce'));
    }
    if (isset($_POST['billing_address_2']) && empty($_POST['billing_address_2'])) {
        $errors->add('billing_address_2_error', __('<strong>Error</strong>: Address Line-2 is required!.', 'woocommerce'));
    }
    if (isset($_POST['billing_postcode']) && empty($_POST['billing_postcode'])) {
        $errors->add('billing_postcode_error', __('<strong>Error</strong>: PostCode is required!.', 'woocommerce'));
    }
    return $errors;
}

///////////////////////////////
// 3. SAVE FIELDS
///////////////////////////////

add_action('woocommerce_created_customer', 'wcfplugin_save_name_fields');

function wcfplugin_save_name_fields($customer_id)
{
    if (isset($_POST['billing_first_name'])) {
        update_user_meta($customer_id, 'billing_first_name', sanitize_text_field($_POST['billing_first_name']));
        update_user_meta($customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']));
    }
    if (isset($_POST['billing_last_name'])) {
        update_user_meta($customer_id, 'billing_last_name', sanitize_text_field($_POST['billing_last_name']));
        update_user_meta($customer_id, 'last_name', sanitize_text_field($_POST['billing_last_name']));
    }
    if (isset($_POST['billing_country'])) {
        update_user_meta($customer_id, 'billing_country', sanitize_text_field($_POST['billing_country']));
        update_user_meta($customer_id, 'country', sanitize_text_field($_POST['billing_country']));
    }
    if (isset($_POST['billing_city'])) {
        update_user_meta($customer_id, 'billing_city', sanitize_text_field($_POST['billing_city']));
        update_user_meta($customer_id, 'city', sanitize_text_field($_POST['billing_city']));
    }
    if (isset($_POST['billing_phone'])) {
        update_user_meta($customer_id, 'billing_phone', sanitize_text_field($_POST['billing_phone']));
        update_user_meta($customer_id, 'phone', sanitize_text_field($_POST['billing_phone']));
    }
    if (isset($_POST['billing_address'])) {
        update_user_meta($customer_id, 'billing_address_1', sanitize_text_field($_POST['billing_address_1']));
        update_user_meta($customer_id, 'address_1', sanitize_text_field($_POST['billing_address_1']));
    }
    if (isset($_POST['billing_address'])) {
        update_user_meta($customer_id, 'billing_address_2', sanitize_text_field($_POST['billing_address_2']));
        update_user_meta($customer_id, 'address_2', sanitize_text_field($_POST['billing_address_2']));
    }
    if (isset($_POST['billing_postcode'])) {
        update_user_meta($customer_id, 'billing_postcode', sanitize_text_field($_POST['billing_postcode']));
        update_user_meta($customer_id, 'postcode', sanitize_text_field($_POST['billing_postcode']));
    }
}
