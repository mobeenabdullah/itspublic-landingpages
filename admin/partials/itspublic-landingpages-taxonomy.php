<?php
// Register Taxonomy Doc Category
function create_doccategory_tax() {

    $labels = array(
        'name'              => _x( 'Doc Categories', 'taxonomy general name', 'itspublic' ),
        'singular_name'     => _x( 'Doc Category', 'taxonomy singular name', 'itspublic' ),
        'search_items'      => __( 'Search Doc Categories', 'itspublic' ),
        'all_items'         => __( 'All Doc Categories', 'itspublic' ),
        'parent_item'       => __( 'Parent Doc Category', 'itspublic' ),
        'parent_item_colon' => __( 'Parent Doc Category:', 'itspublic' ),
        'edit_item'         => __( 'Edit Doc Category', 'itspublic' ),
        'update_item'       => __( 'Update Doc Category', 'itspublic' ),
        'add_new_item'      => __( 'Add New Doc Category', 'itspublic' ),
        'new_item_name'     => __( 'New Doc Category Name', 'itspublic' ),
        'menu_name'         => __( 'Doc Category', 'itspublic' ),
    );
    $args = array(
        'labels' => $labels,
        'description' => __( 'Custom Taxonomy for Docs CPT', 'itspublic' ),
        'hierarchical' => true,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'show_in_quick_edit' => true,
        'show_admin_column' => false,
        'show_in_rest' => true,
    );
    register_taxonomy( 'doccategory', array('doc'), $args );

}
add_action( 'init', 'create_doccategory_tax' );