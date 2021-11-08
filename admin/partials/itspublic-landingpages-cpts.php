<?php
// Register Custom Post Type Gemeente
function create_gemeente_cpt() {

    $labels = array(
        'name' => _x( 'Gemeentes', 'Post Type General Name', 'itspublic' ),
        'singular_name' => _x( 'Gemeente', 'Post Type Singular Name', 'itspublic' ),
        'menu_name' => _x( 'Gemeentes', 'Admin Menu text', 'itspublic' ),
        'name_admin_bar' => _x( 'Gemeente', 'Add New on Toolbar', 'itspublic' ),
        'archives' => __( 'Gemeente Archives', 'itspublic' ),
        'attributes' => __( 'Gemeente Attributes', 'itspublic' ),
        'parent_item_colon' => __( 'Parent Gemeente:', 'itspublic' ),
        'all_items' => __( 'All Gemeentes', 'itspublic' ),
        'add_new_item' => __( 'Add New Gemeente', 'itspublic' ),
        'add_new' => __( 'Add New', 'itspublic' ),
        'new_item' => __( 'New Gemeente', 'itspublic' ),
        'edit_item' => __( 'Edit Gemeente', 'itspublic' ),
        'update_item' => __( 'Update Gemeente', 'itspublic' ),
        'view_item' => __( 'View Gemeente', 'itspublic' ),
        'view_items' => __( 'View Gemeentes', 'itspublic' ),
        'search_items' => __( 'Search Gemeente', 'itspublic' ),
        'not_found' => __( 'Not found', 'itspublic' ),
        'not_found_in_trash' => __( 'Not found in Trash', 'itspublic' ),
        'featured_image' => __( 'Featured Image', 'itspublic' ),
        'set_featured_image' => __( 'Set featured image', 'itspublic' ),
        'remove_featured_image' => __( 'Remove featured image', 'itspublic' ),
        'use_featured_image' => __( 'Use as featured image', 'itspublic' ),
        'insert_into_item' => __( 'Insert into Gemeente', 'itspublic' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Gemeente', 'itspublic' ),
        'items_list' => __( 'Gemeentes list', 'itspublic' ),
        'items_list_navigation' => __( 'Gemeentes list navigation', 'itspublic' ),
        'filter_items_list' => __( 'Filter Gemeentes list', 'itspublic' ),
    );
    $args = array(
        'label' => __( 'Gemeente', 'itspublic' ),
        'description' => __( 'CPT for Gemeentes', 'itspublic' ),
        'labels' => $labels,
        'menu_icon' => 'dashicons-book',
        'supports' => array('title','thumbnail'),
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
    register_post_type( 'gemeente', $args );

}
add_action( 'init', 'create_gemeente_cpt', 0 );

// Register Custom Post Type Doc
function create_doc_cpt() {

	$labels = array(
		'name' => _x( 'Docs', 'Post Type General Name', 'itspublic' ),
		'singular_name' => _x( 'Doc', 'Post Type Singular Name', 'itspublic' ),
		'menu_name' => _x( 'Batch docs', 'Admin Menu text', 'itspublic' ),
		'name_admin_bar' => _x( 'Doc', 'Add New on Toolbar', 'itspublic' ),
		'archives' => __( 'Doc Archives', 'itspublic' ),
		'attributes' => __( 'Doc Attributes', 'itspublic' ),
		'parent_item_colon' => __( 'Parent Doc:', 'itspublic' ),
		'all_items' => __( 'All Docs', 'itspublic' ),
		'add_new_item' => __( 'Add New Doc', 'itspublic' ),
		'add_new' => __( 'Add New', 'itspublic' ),
		'new_item' => __( 'New Doc', 'itspublic' ),
		'edit_item' => __( 'Edit Doc', 'itspublic' ),
		'update_item' => __( 'Update Doc', 'itspublic' ),
		'view_item' => __( 'View Doc', 'itspublic' ),
		'view_items' => __( 'View Docs', 'itspublic' ),
		'search_items' => __( 'Search Doc', 'itspublic' ),
		'not_found' => __( 'Not found', 'itspublic' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'itspublic' ),
		'featured_image' => __( 'Featured Image', 'itspublic' ),
		'set_featured_image' => __( 'Set featured image', 'itspublic' ),
		'remove_featured_image' => __( 'Remove featured image', 'itspublic' ),
		'use_featured_image' => __( 'Use as featured image', 'itspublic' ),
		'insert_into_item' => __( 'Insert into Doc', 'itspublic' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Doc', 'itspublic' ),
		'items_list' => __( 'Docs list', 'itspublic' ),
		'items_list_navigation' => __( 'Docs list navigation', 'itspublic' ),
		'filter_items_list' => __( 'Filter Docs list', 'itspublic' ),
	);
	$args = array(
		'label' => __( 'Batch docs', 'itspublic' ),
		'description' => __( 'CPT for its public Documents', 'itspublic' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-media-document',
		'supports' => array('title', 'thumbnail'),
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
	register_post_type( 'doc', $args );

}
add_action( 'init', 'create_doc_cpt', 0 );
