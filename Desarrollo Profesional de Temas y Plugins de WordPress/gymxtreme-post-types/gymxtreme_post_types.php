<?php
/*
    Plugin Name: GymXtreme - Post Types
    Plugin URI: https://github.com/colidom/gymxtreme-post-types
    Description: Añade Post Types al sitio GymXtreme.
    Version: 1.0.0
    Author: colidom
    Author URI: https://github.com/colidom
    Text Domain: gymxtreme
*/

if (!defined('ABSPATH')) die();

// Registrar Custom Post Type
function gymxtreme_lessons_post_type()
{

    $labels = array(
        'name'                  => _x('Lessons', 'Post Type General Name', 'gymxtreme'),
        'singular_name'         => _x('Lesson', 'Post Type Singular Name', 'gymxtreme'),
        'menu_name'             => __('Lessons', 'gymxtreme'),
        'name_admin_bar'        => __('Lesson', 'gymxtreme'),
        'archives'              => __('Archive', 'gymxtreme'),
        'attributes'            => __('Attributes', 'gymxtreme'),
        'parent_item_colon'     => __('Lesson Padre', 'gymxtreme'),
        'all_items'             => __('AllLessons', 'gymxtreme'),
        'add_new_item'          => __('Add Lesson', 'gymxtreme'),
        'add_new'               => __('Add Lesson', 'gymxtreme'),
        'new_item'              => __('New Lesson', 'gymxtreme'),
        'edit_item'             => __('Edit Lesson', 'gymxtreme'),
        'update_item'           => __('Update Lesson', 'gymxtreme'),
        'view_item'             => __('See Lesson', 'gymxtreme'),
        'view_items'            => __('See Lessons', 'gymxtreme'),
        'search_items'          => __('Search Lesson', 'gymxtreme'),
        'not_found'             => __('Not found', 'gymxtreme'),
        'not_found_in_trash'    => __('Not found in', 'gymxtreme'),
        'featured_image'        => __('Featured Image', 'gymxtreme'),
        'set_featured_image'    => __('Save Featured Image', 'gymxtreme'),
        'remove_featured_image' => __('Delete Featured Image', 'gymxtreme'),
        'use_featured_image'    => __('Use as Featured Image', 'gymxtreme'),
        'insert_into_item'      => __('Insert en Lesson', 'gymxtreme'),
        'uploaded_to_this_item' => __('Added in Lesson', 'gymxtreme'),
        'items_list'            => __('Lessons list', 'gymxtreme'),
        'items_list_navigation' => __('Lessons navigation', 'gymxtreme'),
        'filter_items_list'     => __('Filter Lessons', 'gymxtreme'),
    );

    $args = array(
        'label'                 => __('Lesson', 'gymxtreme'),
        'description'           => __('Lessons para el Sitio Web', 'gymxtreme'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'hierarchical'          => true, // true = posts , false = paginas
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-welcome-learn-more',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type('gymxtreme_lessons', $args);
}
add_action('init', 'gymxtreme_lessons_post_type', 0);

// Instructors Custom Post Types
function gymxtreme_instructors_post_type()
{

    $labels = array(
        'name'                  => _x('Instructors', 'Post Type General Name', 'gymxtreme'),
        'singular_name'         => _x('Instructor', 'Post Type Singular Name', 'gymxtreme'),
        'menu_name'             => __('Instructors', 'gymxtreme'),
        'name_admin_bar'        => __('Instructor', 'gymxtreme'),
        'archives'              => __('Archive', 'gymxtreme'),
        'attributes'            => __('Attributes', 'gymxtreme'),
        'parent_item_colon'     => __('Parent Instructor', 'gymxtreme'),
        'all_items'             => __('All the Instructors', 'gymxtreme'),
        'add_new_item'          => __('Add Instructor', 'gymxtreme'),
        'add_new'               => __('Add Instructor', 'gymxtreme'),
        'new_item'              => __('New Instructor', 'gymxtreme'),
        'edit_item'             => __('Edit Instructor', 'gymxtreme'),
        'update_item'           => __('Update Instructor', 'gymxtreme'),
        'view_item'             => __('See Instructor', 'gymxtreme'),
        'view_items'            => __('See Instructors', 'gymxtreme'),
        'search_items'          => __('Search Instructor', 'gymxtreme'),
        'not_found'             => __('Not found', 'gymxtreme'),
        'not_found_in_trash'    => __('Not found in the trash', 'gymxtreme'),
        'featured_image'        => __('Featured Image', 'gymxtreme'),
        'set_featured_image'    => __('Save Featured Image', 'gymxtreme'),
        'remove_featured_image' => __('Delete Featured Image', 'gymxtreme'),
        'use_featured_image'    => __('Use as Featured Image', 'gymxtreme'),
        'insert_into_item'      => __('Insert en Instructor', 'gymxtreme'),
        'uploaded_to_this_item' => __('Added in Instructor', 'gymxtreme'),
        'items_list'            => __('Instructors list', 'gymxtreme'),
        'items_list_navigation' => __('Instructors navigation', 'gymxtreme'),
        'filter_items_list'     => __('Filter Instructors', 'gymxtreme'),
    );
    $args = array(
        'label'                 => __('Instructors', 'gymxtreme'),
        'description'           => __('Website Trainers', 'gymxtreme'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-admin-users',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type('instructors', $args);
}
add_action('init', 'gymxtreme_instructors_post_type', 0);



function gymxtreme_testimonials_post_type()
{
    $labels = array(
        'name'                  => _x('Testimonials', 'Post Type General Name', 'gymxtreme'),
        'singular_name'         => _x('Testimonial', 'Post Type Singular Name', 'gymxtreme'),
        'menu_name'             => __('Testimonials', 'gymxtreme'),
        'name_admin_bar'        => __('Testimonial', 'gymxtreme'),
        'archives'              => __('Archive', 'gymxtreme'),
        'attributes'            => __('Attributes', 'gymxtreme'),
        'parent_item_colon'     => __('Parent Testimonial', 'gymxtreme'),
        'all_items'             => __('All Testimonials', 'gymxtreme'),
        'add_new_item'          => __('Add Testimonial', 'gymxtreme'),
        'add_new'               => __('Add Testimonial', 'gymxtreme'),
        'new_item'              => __('New Testimonial', 'gymxtreme'),
        'edit_item'             => __('Edit Testimonial', 'gymxtreme'),
        'update_item'           => __('Update Testimonial', 'gymxtreme'),
        'view_item'             => __('See Testimonial', 'gymxtreme'),
        'view_items'            => __('See Testimonials', 'gymxtreme'),
        'search_items'          => __('Search Testimonial', 'gymxtreme'),
        'not_found'             => __('Not found', 'gymxtreme'),
        'not_found_in_trash'    => __('Not found in the trash', 'gymxtreme'),
        'featured_image'        => __('Featured Image', 'gymxtreme'),
        'set_featured_image'    => __('Save Featured Image', 'gymxtreme'),
        'remove_featured_image' => __('Delete Featured Image', 'gymxtreme'),
        'use_featured_image'    => __('Use as Featured Image', 'gymxtreme'),
        'insert_into_item'      => __('Insert in Testimonial', 'gymxtreme'),
        'uploaded_to_this_item' => __('Added in Testimonial', 'gymxtreme'),
        'items_list'            => __('Testimonials list', 'gymxtreme'),
        'items_list_navigation' => __('Testimonials navegation', 'gymxtreme'),
        'filter_items_list'     => __('Filter Testimonials', 'gymxtreme'),
    );
    $args = array(
        'label'                 => __('Testimonials', 'gymxtreme'),
        'description'           => __('Testimonials para el Sitio Web', 'gymxtreme'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'thumbnail'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 8,
        'menu_icon'             => 'dashicons-editor-quote',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type('testimonials', $args);
}
add_action('init', 'gymxtreme_testimonials_post_type', 0);
