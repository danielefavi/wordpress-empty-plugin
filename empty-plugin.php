function wppbc_fv_check_if_user_locked( $message, $field, $request_data, $form_location, $form_role = '', $user_id = 0 ) {
	// Handle visibility for register form
	if( $form_location == 'register' ) {
 
		// Visibility for User Locked option
		if( !current_user_can( apply_filters( 'wppb_fv_capability_user_locked', 'manage_options' ) ) ) {
			if (isset($field['visibility']) &amp;&amp; ($field['visibility'] == 'user_locked')) {
                		remove_filter('wppb_check_form_field_' . Wordpress_Creation_Kit_PB::wck_generate_slug( $field['field'] ), 'wppb_in_fv_check_field_value', 11);
                        	remove_filter('wppb_check_form_field_' . Wordpress_Creation_Kit_PB::wck_generate_slug( $field['field'] ), 'wppb_in_fv_check_if_user_locked', 11);
                	}
		}
	}
 
	return $message;
}
 
function wppbc_init_field_visibility() {
 
	if ( !defined('WPPBFV_IN_PLUGIN_DIR') ){
		return;
	}
 
	$filter_fields = wppb_in_field_visibility_get_extra_fields();
	// add filters for the fields
 
	foreach( $filter_fields as $filter_field_slug =&gt; $filter_field ) {
		if( class_exists('Wordpress_Creation_Kit_PB') ) {
			add_filter('wppb_check_form_field_' . Wordpress_Creation_Kit_PB::wck_generate_slug( $filter_field ), 'wppbc_fv_check_if_user_locked', 10, 6);
		}
	}
}
add_action( 'init', 'wppbc_init_field_visibility', 999 );
 
 
/*
 * Make field visibility user locked on the Edit Profile page only
 */
 
add_filter( 'wppb_output_display_form_field', 'wppbc_handle_output_display_state', 999, 5 );
function wppbc_handle_output_display_state( $display_field, $field, $form_location, $form_role, $user_id ){
 
	// Handle visibility for register form
	if( $form_location == 'register' ) {
 
		// Visibility for User Locked option
		if( !current_user_can( apply_filters( 'wppb_fv_capability_user_locked', 'manage_options' ) ) ) {
			if (isset($field['visibility']) &amp;&amp; ($field['visibility'] == 'user_locked')) {
				$display_field = true;
			}
		}
	}
	return $display_field;
}
