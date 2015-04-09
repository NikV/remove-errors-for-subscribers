<?php
/**
 * Plugin Name: Remove Errors for Subscribers
 */
function wp_check_role( $role, $user_id = null ) {

	if ( is_numeric( $user_id ) ) {
		$user = get_userdata( $user_id );
	}
	else {
		$user = wp_get_current_user();
	}

	if ( empty( $user ) ) {
		return false;
	}

	return in_array( $role, (array) $user->roles );
}



function sub_remove_admin_notices() {
	if ( wp_check_role('subscriber') ) {

	echo'<style>
		.updated {
			display: none;
		}
		.error {
			display: none;
		}
		.updated {
			display: none;
		}
	</style>';

	}
}
add_action( 'admin_notices', 'sub_remove_admin_notices' );