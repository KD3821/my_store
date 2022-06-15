<?php
    
    add_action( 'wp_enqueue_scripts', 'add_scripts_and_styles' );
    add_action( 'after_setup_theme', 'add_menu' );
    
    function add_menu() {
        register_nav_menu( 'top', 'Главное меню сайта' );
        register_nav_menu( 'bottom', 'Меню на уроке');
    }
    function add_scripts_and_styles() {
        wp_deregister_script('jquery');
        wp_register_script('jquery', get_template_directory_uri().'/assets/js/jquery-3.5.1.min.js', false, null, true);
        wp_enqueue_script('jquery');
        wp_enqueue_script('main', get_template_directory_uri(). '/assets/js/main.js', array('jquery'), null, 'footer');
        wp_enqueue_style('main', get_stylesheet_uri());
    }

?>

    
