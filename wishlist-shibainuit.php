<?php
/**
 * Plugin Name: Wishlist ShibainuIT
 * Description: Highly customizable WooCommerce wishlist plugin.
 * Version: 2.00
 * Author: SHIBAINU IT  
 * Author URI: https://shibainuit.com
 * License: GPL2
 * Requires at least: 5.0
 * Tested up to: 5.7.2
 * Text Domain: sit
 * SVN URL: https://plugins.svn.wordpress.org/wishlist-shibainuit
 * Public URL: https://wordpress.org/plugins/wishlist-shibainuit
*/

/**
 * Some Useful Constant
 */
define( 'SIT_PLUGIN_LOCATION', plugin_dir_path(__FILE__));
define( 'SIT_USER_META_KEY', 'sit_wishlist_ids' );
define( 'SIT_BEFORE_ADDED_BTN_HTML', 'sit_wishlist_before_html' );
define( 'SIT_AFTER_ADDED_BTN_HTML', 'sit_wishlist_after_html' );
define( 'SIT_DEFAULT_WISHLIST_BTN_VISIBILITY', 'sit_wishlist_btn_visibility' );
define( 'SIT_PLUGIN_URL' , plugin_dir_url(__FILE__));


class SIT_Wishlist{

    public function __construct() {
		$this->includes();
		$this->reg_hooks();
	}
    public function reg_hooks(){
        add_action( 'wp_enqueue_scripts'	, [ $this, 'enqueue_frontend_assets' ] );               
        add_action( 'admin_enqueue_scripts'	, [ $this, 'enqueue_admin_assets' ] );              
		
		add_filter('plugin_action_links_'.plugin_basename(__FILE__), [$this, 'add_plugin_page_settings_link' ]);
		
	}

	function add_plugin_page_settings_link( $links ) {
		$links[] = '<a href="' .
			admin_url( 'options-general.php?page=sit-wishlist-setting' ) .
			'">' . __('Settings') . '</a>';
		return $links;
	} 

    /**
     * Enqueue all Necessary assets
     * 
     */    
	public function enqueue_admin_assets() {
		wp_enqueue_script( 'sit_script_admin', plugin_dir_url( __FILE__ ). 'dist/js/sit-admin.js'  , ['jquery'], 1,true );
	}
    public function enqueue_frontend_assets() {
		wp_enqueue_style( 'sit_style', plugin_dir_url( __FILE__ ). 'dist/css/style.css', [], 1, 'all' );
		wp_enqueue_script( 'sit_script', plugin_dir_url( __FILE__ ). 'dist/js/theme.js', ['jquery'], 1, true );
	}


    public function includes() {
		require __DIR__ . '/inc/overwrite-templates.php'; 	// Overwrite the plugin file
		require __DIR__ . '/inc/useful-functions.php'; 	// Overwrite the plugin file
		require __DIR__ . '/inc/add-to-wishlist-btn.php'; 	// add the button to front-end
		require __DIR__ . '/inc/ajax.php'; 					// Ajax function for add remove the wishlist 
		require __DIR__ . '/inc/add-endpoint.php'; 			// Add woocommerce end point
		require __DIR__ . '/inc/settings-page.php';			// Settings page register
		require __DIR__ . '/inc/add-modal-frontend.php'; 	// Overwrite the plugin file
	}
}

new SIT_Wishlist();