<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
    exit;  

// functions.php is empty so you can easily track what code is needed in order to Vite + Tailwind JIT run well


// Main switch to get frontend assets from a Vite dev server OR from production built folder
// it is recommended to move it into wp-config.php


include "inc/inc.vite.php";

// Theme Customizer Support
function icrp_theme_customizer($wp_customize) {
    // Logo Section
    $wp_customize->add_section('icrp_logo_section', array(
        'title' => 'Logo ICRP',
        'priority' => 30,
    ));
    
    // Logo Setting
    $wp_customize->add_setting('icrp_logo', array(
        'default' => get_template_directory_uri() . '/assets/img/logo.png',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    // Logo Control
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'icrp_logo_control', array(
        'label' => 'Upload Logo ICRP',
        'section' => 'icrp_logo_section',
        'settings' => 'icrp_logo',
    )));
}
add_action('customize_register', 'icrp_theme_customizer');


