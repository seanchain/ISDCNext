<?php

require_once('../blog/wp-load.php');

function vaildate_login() {
	if ( $user_id = wp_validate_auth_cookie( $_COOKIE[LOGGED_IN_COOKIE], 'logged_in' ) ) {
		$user = wp_get_current_user();
		$user_name = $user->user_firstname . $user_id->user_lastname;
		return array(true, $user_id, $user_name);
	} else {
		return false;
	}
}

?>