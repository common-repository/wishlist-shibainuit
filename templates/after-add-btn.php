<?php

/**
 * To overwrite this template create a file name after-add-btn.php
 * and put it in your active-theme-folder/woocommerce folder
 */
$sit_admin_btn_html = get_option( SIT_AFTER_ADDED_BTN_HTML, false );
$sit_after_icon = '<svg width="25" height="22" viewBox="0 0 25 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22.6562 1.95312C20.0781 -0.25 16.2812 0.171875 13.8906 2.60938L13 3.54688L12.0625 2.60938C9.71875 0.171875 5.875 -0.25 3.29688 1.95312C0.34375 4.48438 0.203125 8.98438 2.82812 11.7031L11.9219 21.0781C12.4844 21.6875 13.4688 21.6875 14.0312 21.0781L23.125 11.7031C25.75 8.98438 25.6094 4.48438 22.6562 1.95312Z" fill="#031C3A"></path></svg>';

if( $sit_admin_btn_html == false || ( is_string($sit_admin_btn_html) && trim($sit_admin_btn_html) == '' ) ){
    // render default template    
    echo stripslashes('<div class="sit-wishlist-btn-inner">'.$sit_after_icon.'Remove from wishlist</div>');
}else{
    // if button html set
    echo stripslashes_deep( $sit_admin_btn_html  );
}