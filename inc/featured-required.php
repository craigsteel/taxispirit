<?php
/**
 * Template to insure featured image required for posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package taxispirit
 */

add_action('save_post', 'wpds_check_thumbnail');
add_action('admin_notices', 'wpds_thumbnail_error');
function wpds_check_thumbnail($post_id) {
    
    // change to any custom post type
    if(get_post_type($post_id) != 'post')
        return;
    if ( !has_post_thumbnail( $post_id ) ) {
        // set a transient to show the users an admin message
        set_transient( 'has_post_thumbnail', 'no' );
        // unhook this function so it doesn't loop infinitely
        remove_action('save_post', 'wpds_check_thumbnail');
        // update the post set it to draft
        wp_update_post(array('ID' => $post_id, 'post_status' => 'draft'));
        add_action('save_post', 'wpds_check_thumbnail');
    } else {
        delete_transient( 'has_post_thumbnail' );
    }
}

function wpds_thumbnail_error() {
    // check if the transient is set, and display the error message
    if ( get_transient( 'has_post_thumbnail' ) == 'no' ) {
        echo '<div id="message" class="error"><p><strong>You must select Featured Image. Your Post is saved but it can not be published.</strong></p></div>';
        delete_transient( 'has_post_thumbnail' );
    }
}