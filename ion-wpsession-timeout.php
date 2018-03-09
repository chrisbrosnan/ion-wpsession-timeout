<?php
   /*
   Plugin Name: ION WP session timeout
   Plugin URI:
   Description: A plugin for setting a timeout for WP users after inactivity (less than the timeout for ADFS)
   Version: 1.0
   Author: Chris Brosnan
   Author URI: http://github.com/chrisbrosnan/
   License:
   */

// Add JS event listener
function addScript(){
    if ( $_POST["wpsessionexpired"] != 'true' && is_user_logged_in() ){
        // Registering session timer script
        wp_register_script( 'session-timer', plugins_url( '/scripts/session-timer.js',__FILE__ ) );
        // Enqueuing session timer script
        wp_enqueue_script( 'session-timer' );
    } else { }
}
add_action('wp_enqueue_scripts', 'addScript');

// Starting session for user
function startSession(){
    if(!session_id()){
        session_start();
    } else {
        // do nothing
    }
}
add_action('init', 'startSession', 1);

// Logs out a user from WP (but not from ADFS) after period of inactivty set in 'session-timer.js' 
function logoutUser(){
    if ( $_POST["wpsessionexpired"] == 'true' ){ 
        wp_logout();
        header("refresh:0.5;url=".$_SERVER['REQUEST_URI']."");
    }
}
add_action('init', 'logoutUser');

?>
