<?php
/*
Plugin Name: Siris Login/Logout Redirect
Plugin URI: http://sirisgraphics.com/project/siris-loginlogout-redirect/
Description: Send users to a custom url, page or post after logging in or logging out by replacing the default ‘go to dashboard’ behavior. Hide the Admin Bar from the user after they have logged in. 
Version: 1.0
Author: Vamsi Pulavarthi
Author URI: http://sirisgraphics.com/author/vamsi
License: GPLv2
*/

// create custom plugin settings menu
add_action('admin_menu', 'slr_create_menu');
add_action('admin_enqueue_scripts', 'slr_admin_scripts');
add_action('login_redirect', 'slr_LoginSuccess', 10, 3);
add_filter('authenticate', 'slr_checkLogin', 40, 1);
add_filter('show_admin_bar', 'slr_showAdminBar');
add_filter( 'wp_logout', 'slr_logoutPage', 10, 2 );

function slr_create_menu() {
	//create new top-level menu
	add_menu_page('Login/Logout Redirect', 'Login/Logout Redirect', 'administrator', 'siris-login-logout-redirect', 'slr_settings_page', '', __FILE__);
	//call register settings function
	add_action( 'admin_init', 'register_slrsettings' );
}

function slr_settings_page() {
    include_once( '/includes/slrForm.php' );
}

function register_slrsettings() {
	//register our settings
	register_setting( 'slr-settings', 'slr_login_page_url' );
    register_setting( 'slr-settings', 'slr_logout_page_url' );
    register_setting( 'slr-settings', 'slr_login_redirect_url' );
    register_setting( 'slr-settings', 'slr_show_admin_bar' );
}

function slr_admin_scripts() {
    if (isset($_GET['page']) && $_GET['page'] == 'siris-login-logout-redirect') {
        wp_enqueue_style( 'bootstrap', plugins_url('/addins/bootstrap.min.css', __FILE__) );
    }
}

function slr_LoginSuccess($url, $request, $user) {
    if( $user && is_object( $user ) && is_a( $user, 'WP_User' ) ) {
        if( get_option( 'slr_login_redirect_url' ) == '' ) {
            return $url;
        } else {
            $url = get_option( 'slr_login_redirect_url' );
            return $url;
        }
    }
}

function slr_checkLogin($user) {
	if(is_wp_error($user) ) {
        if( !(get_option( 'slr_login_page_url' ) == '') ) {
            wp_redirect( get_option( 'slr_login_page_url' ) );
		    exit();
        }
	} else {
		return $user;
	}
}

function slr_showAdminBar() {
    if ( get_option( 'slr_show_admin_bar' ) == 'True' ) {
        show_admin_bar( TRUE );
    } else {
        show_admin_bar( FALSE );
    }
}

function slr_logoutPage( $logout_url, $redirect ) {
    if( get_option( 'slr_logout_page_url' ) == '' ) {
        return home_url();
    } else {
        wp_redirect( get_option( 'slr_logout_page_url' ) );
        exit;

    }
}

?>