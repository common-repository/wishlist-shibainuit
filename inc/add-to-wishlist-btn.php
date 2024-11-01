<?php 
/**
 * Button HTML 
 */

// check if user want to visible the default button
if( get_option( SIT_DEFAULT_WISHLIST_BTN_VISIBILITY , 'visible' ) == 'visible' ){
    add_action( 'woocommerce_after_add_to_cart_button', 'sit_after_add_to_cart_btn_render' );
}

function sit_after_add_to_cart_btn_render(){
    echo  sit_after_add_to_cart_btn();
}

// add shortcode support 
add_shortcode( 'SIT-WISHLIST-BUTTON', 'sit_after_add_to_cart_btn' );

function sit_after_add_to_cart_btn(){

    $c_post_id      = get_the_ID(  );

    $wishlist_array     = sit_get_wishlist_array();
    $key                = SIT_USER_META_KEY;

    $item_in_wishlist   = sit_is_item_in_wishlist($c_post_id);

    $admin_url = admin_url( 'admin-ajax.php' );
    ob_start();

    echo "<div class='sit-wishlist-btn-wrapper' >";
        if( $item_in_wishlist ): ?>
            <a role="button" class="sit-wishlist-btn" data-nonce="<?php echo esc_attr(wp_create_nonce('sit-wishlist')) ?>" data-post-id="<?php echo esc_attr($c_post_id) ?>" data-action="remove" data-admin-url="<?php echo esc_url($admin_url) ?>" >
                <?php sit_wishlist_template('after-add-btn.php') ?>
            </a>
        <?php else: ?>
            <a role="button" class="sit-wishlist-btn" data-nonce="<?php echo esc_attr(wp_create_nonce('sit-wishlist')) ?>" data-post-id="<?php echo esc_attr($c_post_id) ?>" data-action="add" data-admin-url="<?php echo esc_url($admin_url) ?>" >
                <?php sit_wishlist_template('before-add-btn.php'); ?>
            </a>
        <?php endif; 
    echo "</div>";

    $html = ob_get_clean();

    return $html;
}
