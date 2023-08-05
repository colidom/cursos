<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
// Includes
require get_template_directory() . '/includes/widgets.php';
require get_template_directory() . '/includes/queries.php';

function gymxtreme_setup()
{
    // Imágenes destacadas
    add_theme_support('post-thumbnails');

    // Títulos para SEO
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'gymxtreme_setup');

function gymxtreme_menu()
{
    register_nav_menus(array(
        'main-manu' => __('Main Menu', 'gymxtreme')
    ));
}

add_action('init', 'gymxtreme_menu');


function gymxtreme_scripts_styles()
{
    // CSS Files
    wp_enqueue_style('normalize', 'https://necolas.github.io/normalize.css/8.0.1/normalize.css', array(), '8.0.1');
    wp_enqueue_style('styles', get_stylesheet_uri(), array('normalize'), '1.0.0');
    if (is_page('gallery')) {
        wp_enqueue_style('lightboxcss', get_template_directory_uri() . '/css/lightbox.min.css', array(), '2.11.4');
    }
    if (is_front_page()) {
        wp_enqueue_style('swippercss', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css', array(), '10.0.4');
    }
    // JS Files
    if (is_page('gallery')) {
        wp_enqueue_script('lightboxjs', get_template_directory_uri() . '/js/lightbox.min.js', array('jquery'), '2.11.4',  true);
    }
    if (is_front_page()) {
        wp_enqueue_script('swipperjs', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', array(), '10.0.4',  true);
        wp_enqueue_script('anime', 'https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js', array(), '2.0.2', true);
    }
    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'gymxtreme_scripts_styles');

// Definir zona de widgets
function gymxtreme_widgets()
{
    register_sidebar(array(
        "name"          => "Sidebar 1",
        "id"            => "sidebar-1",
        "before_widget" => '<div class="widget">',
        "after_widget"  => '</div>',
        "before_title"  => '<h3 class="text-center text-primary">',
        "after_title"   => "</h3>"
    ));
}

add_action('widgets_init', 'gymxtreme_widgets');

// Crear Shortcodes
function gymxtreme_location_shortcode()
{
?>
    <div class="map">
        <?php
        if (is_page('contact')) {
            the_field('location');
        }
        ?>
    </div>

    <h2 class="text-center text-primary">Contact Form</h2>

<?php
    echo do_shortcode('[contact-form-7 id="144" title="Formulario de contacto 1"]');
}

add_shortcode('gymxtreme_location', 'gymxtreme_location_shortcode');

/* Dynamic images as BG */
function gymxtreme_hero_image()
{
    // Get page ID
    $front_id = get_option('page_on_front');

    // Get the image
    $image_id = get_field('hero_image', $front_id);

    // Get image path
    $image = wp_get_attachment_image_src($image_id, 'full')[0];

    // CSS Code
    wp_register_style('custom', false);
    wp_enqueue_style('custom');

    $featured_image_css = "
        body.home .header{
            background-image: linear-gradient(rgb( 0 0 0 / .75),rgb( 0 0 0 / .75) ), url($image);
        }
    ";

    // Inject CSS
    wp_add_inline_style('custom', $featured_image_css);
}

add_action('init', 'gymxtreme_hero_image');
