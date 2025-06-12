<?php
// Enqueue styles and scripts
function noxhara_enqueue_scripts() {
    wp_enqueue_style( 'noxhara-style', get_stylesheet_uri(), array(), '1.0.7' );
    wp_enqueue_style( 'noxhara-custom-style', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.7' );
    wp_enqueue_script( 'noxhara-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0.7', true );

    // Inline CSS for logo sizing
    $logo_width = get_theme_mod( 'noxhara_logo_width', 150 );
    $logo_height = get_theme_mod( 'noxhara_logo_height', 50 );
    $custom_css = "
        .logo-img {
            width: {$logo_width}px !important;
            height: {$logo_height}px !important;
            max-width: 100% !important;
            max-height: 100% !important;
        }
    ";
    wp_add_inline_style( 'noxhara-custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'noxhara_enqueue_scripts' );

// Theme setup
function noxhara_setup() {
    load_theme_textdomain( 'noxhara', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'woocommerce' );
    add_theme_support( 'custom-logo', array(
        'height'      => 50,
        'width'       => 150,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'noxhara' ),
    ) );
    add_image_size( 'noxhara-logo', 300, 100, false );
}
add_action( 'after_setup_theme', 'noxhara_setup' );

// Add RTL support
add_action( 'init', function() {
    if ( is_rtl() ) {
        wp_enqueue_style( 'noxhara-rtl', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.7' );
    }
} );

// Customizer settings
function noxhara_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'noxhara_logo_settings', array(
        'title'    => __( 'Logo Settings', 'noxhara' ),
        'priority' => 30,
    ) );

    $wp_customize->add_setting( 'noxhara_use_logo', array(
        'default'           => true,
        'sanitize_callback' => 'noxhara_sanitize_checkbox',
    ) );
    $wp_customize->add_control( 'noxhara_use_logo', array(
        'label'    => __( 'Use Logo Image', 'noxhara' ),
        'section'  => 'noxhara_logo_settings',
        'type'     => 'checkbox',
    ) );

    $wp_customize->add_setting( 'noxhara_logo_width', array(
        'default'           => 150,
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'noxhara_logo_width', array(
        'label'    => __( 'Logo Width (px)', 'noxhara' ),
        'section'  => 'noxhara_logo_settings',
        'type'     => 'number',
        'input_attrs' => array(
            'min'  => 50,
            'max'  => 300,
            'step' => 1,
        ),
    ) );

    $wp_customize->add_setting( 'noxhara_logo_height', array(
        'default'           => 50,
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( 'noxhara_logo_height', array(
        'label'    => __( 'Logo Height (px)', 'noxhara' ),
        'section'  => 'noxhara_logo_settings',
        'type'     => 'number',
        'input_attrs' => array(
            'min'  => 20,
            'max'  => 100,
            'step' => 1,
        ),
    ) );
}
add_action( 'customize_register', 'noxhara_customize_register' );

function noxhara_sanitize_checkbox( $checked ) {
    return (bool) $checked;
}

// Include custom function files
if ( file_exists( get_template_directory() . '/inc/custom-functions.php' ) ) {
    require get_template_directory() . '/inc/custom-functions.php';
}
if ( file_exists( get_template_directory() . '/inc/template-tags.php' ) ) {
    require get_template_directory() . '/inc/template-tags.php';
}
if ( file_exists( get_template_directory() . '/inc/theme-hooks.php' ) ) {
    require get_template_directory() . '/inc/theme-hooks.php';
}