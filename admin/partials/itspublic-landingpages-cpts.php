<?php
// Register Custom Post Type Landing Page
function create_landingpage_cpt() {
    $labels = array(
        'name' => _x( 'Landing Pages', 'Post Type General Name', 'itspublic' ),
        'singular_name' => _x( 'Landing Page', 'Post Type Singular Name', 'itspublic' ),
        'menu_name' => _x( 'Landing Pages', 'Admin Menu text', 'itspublic' ),
        'name_admin_bar' => _x( 'Landing Page', 'Add New on Toolbar', 'itspublic' ),
        'archives' => __( 'Landing Page Archives', 'itspublic' ),
        'attributes' => __( 'Landing Page Attributes', 'itspublic' ),
        'parent_item_colon' => __( 'Parent Landing Page:', 'itspublic' ),
        'all_items' => __( 'All Landing Pages', 'itspublic' ),
        'add_new_item' => __( 'Add New Landing Page', 'itspublic' ),
        'add_new' => __( 'Add New', 'itspublic' ),
        'new_item' => __( 'New Landing Page', 'itspublic' ),
        'edit_item' => __( 'Edit Landing Page', 'itspublic' ),
        'update_item' => __( 'Update Landing Page', 'itspublic' ),
        'view_item' => __( 'View Landing Page', 'itspublic' ),
        'view_items' => __( 'View Landing Pages', 'itspublic' ),
        'search_items' => __( 'Search Landing Page', 'itspublic' ),
        'not_found' => __( 'Not found', 'itspublic' ),
        'not_found_in_trash' => __( 'Not found in Trash', 'itspublic' ),
        'featured_image' => __( 'Featured Image', 'itspublic' ),
        'set_featured_image' => __( 'Set featured image', 'itspublic' ),
        'remove_featured_image' => __( 'Remove featured image', 'itspublic' ),
        'use_featured_image' => __( 'Use as featured image', 'itspublic' ),
        'insert_into_item' => __( 'Insert into Landing Page', 'itspublic' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Landing Page', 'itspublic' ),
        'items_list' => __( 'Landing Pages list', 'itspublic' ),
        'items_list_navigation' => __( 'Landing Pages list navigation', 'itspublic' ),
        'filter_items_list' => __( 'Filter Landing Pages list', 'itspublic' ),
    );
    $args = array(
        'label' => __( 'Landing Page', 'itspublic' ),
        'description' => __( 'CPT for Landing Pages', 'itspublic' ),
        'labels' => $labels,
        'menu_icon' => 'dashicons-book',
        'supports' => array('title'),
        'taxonomies' => array(),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
    );
    register_post_type( 'landingpage', $args );

}
add_action( 'init', 'create_landingpage_cpt', 0 );