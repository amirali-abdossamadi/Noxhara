<?php
// Enqueue styles and scripts
function noxhara_enqueue_scripts() {
    wp_enqueue_style( 'noxhara-style', get_stylesheet_uri(), array(), '1.0.1' );
    wp_enqueue_style( 'noxhara-custom-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.1' );
    wp_enqueue_script( 'noxhara-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.1', true );
}
add_action( 'wp_enqueue_scripts', 'noxhara_enqueue_scripts' );

// Theme setup
function noxhara_setup() {
    load_theme_textdomain( 'noxhara', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'woocommerce' );
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'noxhara' ),
    ) );
}
add_action( 'after_setup_theme', 'noxhara_setup' );

// Include custom function files
require get_template_directory() . '/inc/custom-functions.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/theme-hooks.php';