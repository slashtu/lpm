<?php
/**
 * @package Reverse Proxy
 */
/*
Plugin Name: Reverse Proxy
Plugin URI: https://instrumentalapp.com/
Description: Reverse proxy setup for Instrumental blog
Version: 1.0
Author: James Paden
Author URI: https://instrumentalapp.com
*/


// Change to match the desired subfolder, no leading or tralling slash
define("RP_SUBFOLDER", "blog");

function rp_is_login_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}

if ( $_SERVER["REMOTE_ADDR"] != "127.0.0.1" && !is_admin() && !rp_is_login_page() && $_GET["preview"] != "true" ) {
    add_action( 'init', function () {
      if (!$_SERVER["HTTP_X_IS_REVERSE_PROXY"]) {
        //not coming from us, 404 it.
        header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
        exit;
      }
    });

    //From http://stackoverflow.com/questions/772510/wordpress-filter-to-modify-final-html-output
    ob_start();
    add_action('shutdown', function() {
        $final = '';
        $levels = count(ob_get_level());
        for ( $i = 0; $i < $levels; $i++ ) {
            $final .= ob_get_clean();
        }

        // Apply any filters to the final output
        $final = str_replace("http://" . $_SERVER["HTTP_HOST"] . "/blog", "http://" . $_SERVER["HTTP_X_ORIGINAL_HOST"] . "/blog", $final);

        echo $final;
    }, 0);
}