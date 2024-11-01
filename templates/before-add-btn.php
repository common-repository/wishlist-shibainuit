<?php 
/**
 * To overwrite this template create a file name before-add-btn.php
 * and put it in your active-theme-folder/woocommerce folder
 */

$sit_admin_btn_html = get_option( SIT_BEFORE_ADDED_BTN_HTML, false );
$sit_before_icon = '<svg width="25" height="22" viewBox="0 0 25 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22.4688 2.04688C19.75 -0.25 15.5781 0.078125 13 2.75C10.375 0.078125 6.20312 -0.25 3.48438 2.04688C-0.03125 5 0.484375 9.82812 3.01562 12.4062L11.2188 20.7969C11.6875 21.2656 12.2969 21.5469 13 21.5469C13.6562 21.5469 14.2656 21.2656 14.7344 20.7969L22.9844 12.4062C25.4688 9.82812 25.9844 5 22.4688 2.04688ZM21.3438 10.8125L13.1406 19.2031C13.0469 19.2969 12.9531 19.2969 12.8125 19.2031L4.60938 10.8125C2.875 9.07812 2.54688 5.79688 4.9375 3.78125C6.76562 2.23438 9.57812 2.46875 11.3594 4.25L13 5.9375L14.6406 4.25C16.375 2.46875 19.1875 2.23438 21.0156 3.73438C23.4062 5.79688 23.0781 9.07812 21.3438 10.8125Z" fill="#031C3A"></path></svg>'; 

if( $sit_admin_btn_html == false || ( is_string($sit_admin_btn_html) && trim($sit_admin_btn_html) == '' ) ){
    // render default template    
    echo stripslashes('<div class="sit-wishlist-btn-inner">'.$sit_before_icon.'Add to wishlist</div>');
}else{
    // if button html set
    echo stripslashes_deep($sit_admin_btn_html);
}