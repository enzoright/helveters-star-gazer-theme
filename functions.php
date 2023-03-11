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
    wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true );

}
add_action('wp_enqueue_scripts', 'load_js');

// Add Menus to CMS Wordpress
add_theme_support('menus');

/* Menus */ 
register_nav_menus(
    array(
        'top-menu' => 'Top Menu Location',
        'mobile-menu' => 'Mobile Menu Location'
    )
);

function register_footer_menu() {
    register_nav_menu('footer-menu', __( 'Footer Menu' ));
}
add_action('init', 'register_footer_menu');



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
        'hierarchical' => false,
        'menu_icon' => 'dashicons-smiley',
        'has_archive' => false,
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

function add_svg_mime_type( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'add_svg_mime_type' );

function custom_theme_customize_register($wp_customize) {
    // Hero Image Section
    $wp_customize->add_section('hero_image_section', array(
        'title' => __('Hero Image', 'custom_theme'),
        'description' => __('Upload a hero image for the homepage', 'custom_theme'),
        'priority' => 25
    ));

    // Hero Image Setting
    $wp_customize->add_setting('hero_image', array(
        'default' => '',
        'sanitize_callback' => 'absint'
    ));

    // Hero Image Control
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'hero_image_control', array(
        'label' => __('Select Hero Image', 'custom_theme'),
        'section' => 'hero_image_section',
        'settings' => 'hero_image'
    )));
}
add_action('customize_register', 'custom_theme_customize_register');

function cpt_hero_image() {
    $labels = array(
        'name'                  => 'Hero Images',
        'singular_name'         => 'Hero Image',
        'menu_name'             => 'Hero Images',
        'name_admin_bar'        => 'Hero Image',
        'add_new'               => 'Add New',
        'add_new_item'          => 'Add New Hero Image',
        'new_item'              => 'New Hero Image',
        'edit_item'             => 'Edit Hero Image',
        'view_item'             => 'View Hero Image',
        'all_items'             => 'All Hero Images',
        'search_items'          => 'Search Hero Images',
        'parent_item_colon'     => 'Parent Hero Images:',
        'not_found'             => 'No Hero Images found.',
        'not_found_in_trash'    => 'No Hero Images found in Trash.'
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'has_archive'           => true,
        'menu_icon'             => 'dashicons-format-image',
        'supports'              => array( 'title', 'thumbnail' ),
    );

    register_post_type( 'hero-image', $args );
}
add_action( 'init', 'cpt_hero_image' );

function add_hero_image_meta_box() {
    add_meta_box(
        'hero-image-meta-box',
        'Hero Image',
        'render_hero_image_meta_box',
        'page',
        'normal',
        'default'
    );
}
add_action( 'add_meta_boxes', 'add_hero_image_meta_box' );

function render_hero_image_meta_box( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'hero_image_nonce' );
    $hero_image_id = get_post_meta( $post->ID, 'hero_image_id', true );
    $hero_image = wp_get_attachment_image_src( $hero_image_id, 'full' );
    ?>
    <label for="hero_image_id">Select Hero Image:</label>
    <input type="hidden" name="hero_image_id" id="hero_image_id" value="<?php echo esc_attr( $hero_image_id ); ?>">
    <img src="<?php echo esc_url( $hero_image[0] ); ?>" style="max-width: 100%; max-height: 200px;">
    <button id="hero_image_upload_button" class="button">Select Hero Image</button>
    <button id="hero_image_remove_button" class="button">Remove Hero Image</button>
    <script>
        jQuery(document).ready(function($){
            var hero_image_frame;
            $('#hero_image_upload_button').click(function(event){
                event.preventDefault();
                if ( hero_image_frame ) {
                    hero_image_frame.open();
                    return;
                }
                hero_image_frame = wp.media.frames.hero_image_frame = wp.media({
                    title: 'Select Hero Image',
                    button: {
                        text: 'Use this image'
                    },
                    multiple: false
                });
                hero_image_frame.on('select', function(){
                    var attachment = hero_image_frame.state().get('selection').first().toJSON();
                    $('#hero_image_id').val(attachment.id);
                    $('img').attr('src', attachment.url);
                });
                hero_image_frame.open();
            });
            $('#hero_image_remove_button').click(function(event){
                event.preventDefault();
                $('#hero_image_id').val('');
                $('img').attr('src', '');
            });
        });
    </script>
    <?php
}

function save_hero_image_meta_box( $post_id ) {
    if ( ! isset( $_POST['hero_image_nonce'] ) || ! wp_verify_nonce( $_POST['hero_image_nonce'], basename( __FILE__ ) ) ) {
        return $post_id;
    }
    $post_type = get_post_type_object( get_post_type( $post_id ) );
    if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
        return $post_id;
    }
    if ( isset( $_POST['hero_image_id'] ) ) {
        update_post_meta( $post_id, 'hero_image_id', sanitize_text_field( $_POST['hero_image_id'] ) );
    } else {
        delete_post_meta( $post_id, 'hero_image_id' );
    }
}
add_action( 'save_post', 'save_hero_image_meta_box' );

function get_hero_image_url() {
    $hero_image_id = get_post_meta( get_the_ID(), 'hero_image_id', true );
    $hero_image = wp_get_attachment_image_src( $hero_image_id, 'full' );
    return $hero_image[0];
}