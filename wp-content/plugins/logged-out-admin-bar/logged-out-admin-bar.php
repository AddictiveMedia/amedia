<?php
/*
 Plugin Name: Logged Out Admin Bar
 Plugin URI: http://wordpress.org/extend/plugins/logged-out-admin-bar/
 Description: Makes that admin bar always visible even for logged out users
 Author: westi
 Version: 0.2
 Author URI: http://blog.ftwr.co.uk/
 */

function pjw_logged_out_admin_bar( $wp_admin_bar) {
	if ( ! is_user_logged_in() ) {
		$wp_admin_bar->add_menu( array( 'title' => __( 'Log In' ), 'href' => wp_login_url(), 'parent' => 'top-secondary' ) );
		if ( get_option('users_can_register') )
			$wp_admin_bar->add_menu( array( 'title' => __( 'Register' ), 'href' => site_url( 'wp-login.php?action=register' ), 'parent' => 'top-secondary' ) );
	}
}

add_action( 'admin_bar_menu', 'pjw_logged_out_admin_bar' );
add_filter( 'show_admin_bar', '__return_true' , 1000 );
