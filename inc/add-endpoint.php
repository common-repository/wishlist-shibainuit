<?php 
/**
 * This function will add endpoint and menu item in the woocommerce system
 * 
 */

add_action( 'init', 'sit_custom_endpoints' );
function sit_custom_endpoints() {        
    add_rewrite_endpoint( 'sit-wishlist', EP_ROOT | EP_PAGES );
}

add_filter( 'query_vars', 'sit_custom_query_vars', 0 );
function sit_custom_query_vars( $vars ) {    
    $vars[] = 'sit-wishlist';
    return $vars;
}

add_action( 'woocommerce_account_sit-wishlist_endpoint', function(){
    sit_wishlist_template("wishlist-render.php", [
        'sit_wishlist_ids' => sit_get_wishlist_array()
    ]);
});

// add dashboard menu item 
function sit_add_wishlist_item_to_menu( $items ) {
    $items['sit-wishlist'] = 'Wishlist';
    return $items;
}

add_filter( 'woocommerce_account_menu_items', 'sit_add_wishlist_item_to_menu' );