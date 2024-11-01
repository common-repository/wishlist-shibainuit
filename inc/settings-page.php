<?php 
/**
 * Register Plugin setting page
 */
function sit_wishlist_register_options_page() {
    add_options_page('Wishlist - SHIBAINU IT', 'Wishlist - Shibainu IT', 'manage_options', 'sit-wishlist-setting', 'sit_wishlist_wp_setting_page_html');
}
add_action('admin_menu', 'sit_wishlist_register_options_page');

function sit_wishlist_wp_setting_page_html(){
    $sit_default_btn_visibility = get_option( SIT_DEFAULT_WISHLIST_BTN_VISIBILITY, 'visible'  );
    ?>
    <div class="wrap">
        <h1>Wishlist Button Setting</h1>
        <form id="sit-wishlist-settings-form" data-nonce="<?php echo wp_create_nonce('sit-wishlist') ?>" data-admin-url="<?php echo admin_url( 'admin-ajax.php' )?>"  >
            <table class="form-table" role="presentation">
                <tbody>
                    <tr>
                        <th scope="row"><label for="sit_before_add_html">Before adding product button text/html</label></th>
                        <td><input name="sit_before_add_html" type="text" id="sit_before_add_html" value="<?php echo esc_attr(get_option( SIT_BEFORE_ADDED_BTN_HTML )) ?>" class="regular-text"></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="sit_after_add_html">After adding product button text/html</label></th>
                        <td><input name="sit_after_add_html" type="text" id="sit_after_add_html" value="<?php echo esc_attr(get_option( SIT_AFTER_ADDED_BTN_HTML )) ?>" class="regular-text"></td>
                    </tr>

                    <tr>
                        <th scope="row"><label>Set Wishlist button visibility</label></th>
                        <td>
                            <div style="display:flex; flex-direction:column ">
                                <label style="margin-bottom: 10px"><input name="sit_default_btn_visibility" type="radio" value="visible" <?php echo esc_html( $sit_default_btn_visibility == 'visible' ? 'checked="checked"' : '' ); ?> >Visible</label>
                                <label><input name="sit_default_btn_visibility" type="radio" value="hidden" <?php echo esc_html(  $sit_default_btn_visibility == 'hidden' ? 'checked="checked"' : '' )?> >Hidden</label>
                                <p>Default Wishlist button visibility beside woocommerce "Add to cart" button</p>
                            </div>
                        
                        </td>
                    </tr>

                    <tr>
                        <th>
                            <div class="alert alert-info" style="
                            margin: 10px 0;
                            padding: 10px;
                            background: red;
                            color: #0c5460;
                            background-color: #d1ecf1;
                            border-color: #bee5eb;
                            border: 1px solid #bee5eb; 
                            display:none;
                            "

                            ></div>
                            <button class="button button-primary" type="submit">Save changes</button>
                        </th>
                    </tr>
                </tbody>

            </table>
        </form>


    </div>

    
    <?php
}