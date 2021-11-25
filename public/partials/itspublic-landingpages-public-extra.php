<?php
add_filter('pre_get_posts', 'pre_get_posts_hook' );

function pre_get_posts_hook($wp_query) {
    if ( is_post_type_archive('gemeente') && $wp_query->is_main_query() ) { //edited this line
        $wp_query->set( 'orderby', 'title' );
        $wp_query->set( 'order', 'ASC' );
        return $wp_query;
    }
}