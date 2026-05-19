<?php

if ( !defined( 'WP_DEBUG' ) ) {
	die( 'Direct access forbidden.' );
}

add_action( 'wp_enqueue_scripts', 'sassriver_child_enqueue_styles', 99 );

function sassriver_child_enqueue_styles() {
   wp_enqueue_style( 'sassriver-parent-style', get_stylesheet_directory_uri() . '/style.css' );
}
