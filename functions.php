<?php
function load_css()
{
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), false, 'all');
    wp_enqueue_style('main');
}
add_action('wp_enqueue_scripts', 'load_css');

function load_js()
{
    wp_enqueue_script('jquery');
    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), false, true);
    wp_enqueue_script('bootstrap');
}
add_action('wp_enqueue_scripts', 'load_js');

// Add Menus to CMS Wordpress
add_theme_support('menus');

// Menus
register_nav_menus(
    array(
        'top-menu' => 'Top Menu Location',
        'mobile-menu' => 'Mobile Menu Location'
    )
);


function custom_logo_setup(){
    $args = array(
        'height'               => 100,
		'width'                => 100,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array( 'Pfadi Helveter St. Georgen', 'site-description' ),
		'unlink-homepage-logo' => true, 
    );
    add_theme_support('custom-logo', $args);
}
add_action('after_setup_theme', 'custom_logo_setup');


function aktivitaet_post_type()
{
    $args = array(
        'labels' => array(
            'name' => 'Aktivitäten',
            'singular_name' => 'Aktivität',
            'add_new' => 'Hinzufügen',
            'add_new_item' => 'Neuee Aktivität hinzufügen',
            'edit_item' => 'Aktivität bearbeiten',
            'new_item' => 'Neue Aktivität',
            'view_item' => 'Aktivität ansehen',
            'search_items' => 'Nach Aktivität suchen',
            'not_found' => 'Keine Aktivität gefunden',
            'not_found_in_trash' => 'Keine Aktivitäten im Papierkorb',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'hierarchical' => 'false',
        'menu_icon' => 'dashicons-smiley'
    );
    register_post_type('aktivitaeten', $args);
}
add_action('init', 'aktivitaet_post_type');


function aktivitaet_download()
{
    // $post_id = get_the_ID();
    $post_id = $_REQUEST['post_id'];

    $file = get_field('aktivitaet_file', $post_id);


    if ($file):
        $path = get_attached_file($file['ID']);
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"" . $file['filename'] . "\"");
        readfile($path);
        exit;
    endif;
}
add_action('admin_post_aktivitaet_download', 'aktivitaet_download');