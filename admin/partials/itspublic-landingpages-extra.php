<?php
/*
 * Checking whether the page is exists or not and checks its post type
 */
function lp_remove_slug( $post_link, $post, $leavename ) {
    if ( 'landingpage' != $post->post_type || 'publish' != $post->post_status ) {
        return $post_link;
    }
    $post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
    return $post_link;
}
add_filter( 'post_type_link', 'lp_remove_slug', 10, 3 );
/*
 * Checking whether the query main or not
 */
function lp_parse_request( $query ) {
    if ( ! $query->is_main_query() || 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
        return;
    }
    if ( ! empty( $query->query['name'] ) ) {
        $query->set( 'post_type', array( 'landingpage' ) );
    }
}
add_action( 'pre_get_posts', 'lp_parse_request' );
