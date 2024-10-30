<?php
/*
* @link              https://profiles.wordpress.org/netzaufsicht/
 * @since             1.0.0
 * @package           Kontur_Copy_Code_Button
 *
 * @wordpress-plugin
 * Plugin Name:       Kontur Copy Code Button
 * Plugin URI:        https://wordpress.org/plugins/kontur-copy-code-button/
 * Description:       Add your own "kontur Copy Code Button" <strong>with your own icon, text, class, color</strong> and "pre" Background. Works as well with the "WP Code Block". The clicked button copies your code into the clipboard.
 * Version:           1.1.4
 * Author:            Eilert Behrends
 * Author URI:        https://profiles.wordpress.org/netzaufsicht/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       kontur-copy-code-button
 * Domain Path:       /languages/
 */

// Exit If Accessed Directly
if ( ! defined( 'ABSPATH' ) ) exit;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


/**
 * Current plugin version.
 */
define( 'KONTURCOPYCODEBUTTON_VERSION', '1.1.4' );
define( 'KONTURCOPYCODEBUTTON__MINIMUM_WP_VERSION', '5.6' );
define( 'KONTURCOPYCODEBUTTON__MINIMUM_PHP_VERSION', '7' );
define( 'KONTURCOPYCODEBUTTON_IMG_URL', plugins_url( '/images', __FILE__ ) );


/*------------------------------------------*/
/*			Plugin Setup Functions			*/
/*------------------------------------------*/


// Check if we are in admin mode and load options page
if ( is_admin() ) {

    
    
// Add the Options Page-Link
if ( !function_exists( 'kontur_copy_code_button_Menu' ) ) {
function kontur_copy_code_button_Menu()
	{
 global $hook_suffix;
		/* Adding menu */
		$hook_suffix = add_theme_page(__('kontur Copy Code Button'),__('kontur Copy Code Button'), 'manage_options','kontur-copy-code-button', 'kontur_copy_code_button');
		
	}
add_action('admin_menu', 'kontur_copy_code_button_Menu');
    }
if ( !function_exists( 'kontur_copy_code_button_set_plug_backend' ) ) {
   function kontur_copy_code_button_set_plug_backend() {
  require plugin_dir_path( __FILE__ ) . 'admin/kontur-copy-code-button-admin-page.php';

}
add_action( 'init', 'kontur_copy_code_button_set_plug_backend' );
}
}


// get the style and scripts for the options page only

if ( !function_exists( 'kontur_copy_code_button_admin_enqueue_script' ) ) {
function kontur_copy_code_button_admin_enqueue_script($hook) {
        // $hook is string value given add_menu_page function.
        if($hook != 'appearance_page_kontur-copy-code-button') {
                return;
        }
        wp_enqueue_style( 'kontur-admin-style-admin', plugin_dir_url( __FILE__ ) . 'admin/css/kontur-copy-code-button-admin.css' ); 
	// Add the color picker css file       
        wp_enqueue_style( 'wp-color-picker' ); 
        // Include the Media Uplaoder
        wp_enqueue_media();
    	wp_register_script('media-uploader', plugins_url('admin/js/kontur-media-uploader.js' , __FILE__ ), array('jquery'));
    	wp_enqueue_script('media-uploader');
         wp_enqueue_script('jquery');
        // Include Admin jQuery file with WordPress Color Picker dependency
    // Include Admin jQuery file with WordPress Color Picker dependency
        wp_enqueue_script( 'color-script', plugins_url( '/admin/js/kontur_copy_code_button_admin.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
      
}
add_action( 'admin_enqueue_scripts', 'kontur_copy_code_button_admin_enqueue_script' );
}


// Doing things with our copy script

function kontur_copy_button_enqueue_script() { 

	 
	wp_enqueue_script('jquery');
    wp_enqueue_script('clipboard-js', '/wp-includes/js/clipboard.min.js');

    wp_enqueue_script( 'copy_code_script', plugin_dir_url( __FILE__ ) . 'js/kontur_copy_code_button.js' );
	
    wp_enqueue_style( 'kontur-copy-code-button-frontend', plugin_dir_url( __FILE__ ) . 'css/kontur-copy-code-button-frontend' );
    wp_localize_script('copy_code_script', 'copyScript', array(
    'kontur_button_text' => get_option('kontur_button_text'),
	'kontur_button_text_copied' => get_option('kontur_button_text_copied'),
	'kontur_copy_text_safari' => get_option('kontur_copy_text_safari'),
	'kontur_copy_text_other_browser' => get_option('kontur_copy_text_other_browser'),
	'kontur_copy_code_button_background' => get_option('kontur_copy_code_button_background'),
	'kontur_copy_code_button_color' => get_option('kontur_copy_code_button_color'),
    'kontur_copy_button_class' => get_option('kontur_copy_button_class'),
    'kontur_pre_background' => get_option('kontur_pre_background'),
    'kontur_copy_button_logo' =>  esc_url(get_option('kontur_copy_button_logo')),
    'kontur_copy_button_use_logo' => get_option('kontur_copy_button_use_logo'),
    'kontur_pre_text' => get_option('kontur_pre_text'),  
        
        
	));	
}
add_action('wp_enqueue_scripts', 'kontur_copy_button_enqueue_script');

/**
 * Add color styling from theme
 */
function kontur_copy_button_wpdocs_styles_method() {
    wp_enqueue_style(
        'kontur-button-custom-style',
        plugin_dir_url( __FILE__ ) . '/css/kontur-style.css'
    );
        $color01 = get_option('kontur_pre_background');
        $color02 = get_option('kontur_copy_code_button_background');
        $color03 = get_option('kontur_copy_code_button_color');
    $color04 = get_option('kontur_pre_text');
    
    
    
        $custom_css = "
                .kontur-btn-clipboard{
                        background-color: {$color02}!important;
                        color: {$color03}!important;
                }
                 div.konturPreCodeWrapper pre{
                        background: {$color01};
                        color: {$color04};
                }
                ";
        wp_add_inline_style( 'kontur-button-custom-style', $custom_css );
}

add_action( 'wp_enqueue_scripts', 'kontur_copy_button_wpdocs_styles_method' );



// Print Direct Link To Options Page In Plugins List
function kontur_copy_button_settings_link( $links ) {
	return array_merge(
		array(
			'settings' => '<a href="' . admin_url( 'admin.php?page=kontur-copy-code-button' ) . '">' . __( '>> Settings', 'kontur-copy-code-button' ) . '</a>'
		),
		$links
	);
}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'kontur_copy_button_settings_link' );




// Load Text Domain
function kontur_copy_button_load_plugin_textdomain() {
    load_plugin_textdomain( 'kontur-copy-code-button', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'kontur_copy_button_load_plugin_textdomain' );


/*--------------------------------------*/
/*			Admin Options Page			*/
/*--------------------------------------*/



function register_kontur_copy_code_button_plugin_settings() {
	//register our settings
	register_setting( 'kontur-copy-code-button-plugin-settings-group', 'kontur_button_text',  array(
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
	register_setting( 'kontur-copy-code-button-plugin-settings-group', 'kontur_button_text_copied',  array(
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field'
    ) ); 
	register_setting( 'kontur-copy-code-button-plugin-settings-group', 'kontur_copy_text_safari',  array(
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field'
    ) ); 
	register_setting( 'kontur-copy-code-button-plugin-settings-group', 'kontur_copy_text_other_browser',  array(
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field'
    ) ); 
	register_setting( 'kontur-copy-code-button-plugin-settings-group', 'kontur_copy_code_button_background' ,  array(
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
	register_setting( 'kontur-copy-code-button-plugin-settings-group', 'kontur_copy_code_button_color' ,  array(
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    register_setting( 'kontur-copy-code-button-plugin-settings-group', 'kontur_copy_button_class' ,  array(
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    
    
      register_setting( 'kontur-copy-code-button-plugin-settings-group', 'kontur_pre_text' ,  array(
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    
    register_setting( 'kontur-copy-code-button-plugin-settings-group', 'kontur_pre_background' ,  array(
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    
     register_setting( 'kontur-copy-code-button-plugin-settings-group', 'kontur_icon_background' ,  array(
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    
       register_setting( 'kontur-copy-code-button-plugin-settings-group', 'kontur_icon_color' ,  array(
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    
        register_setting( 'kontur-copy-code-button-plugin-settings-group', 'kontur_copy_button_use_logo' ,  array(
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
          
        register_setting( 'kontur-copy-code-button-plugin-settings-group', 'kontur_copy_button_logo' ,  array(
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    
}

add_action( 'admin_init', 'register_kontur_copy_code_button_plugin_settings' );



/**
	 * Set defaults
	 *
	 *
	 * @since    1.0.0
	 */
function kontur_copy_code_button_activation(){
    do_action( 'kontur_copy_code_button_default_options' );
}
register_activation_hook( __FILE__, 'kontur_copy_code_button_activation' );



// Set default values here
function kontur_copy_code_button_default_values(){
$default_image = plugin_dir_url( __FILE__ ) . 'images/kontur_us-code-button-01.svg';
    // Form settings
    add_option( 'kontur_button_text', 'Copy me' );
    add_option( 'kontur_button_text_copied' , 'Code copied' );
     add_option( 'kontur_pre_text', '#424242' );
    add_option( 'kontur_copy_code_button_background', '#aaaaaa' );
    add_option( 'kontur_copy_code_button_color', '#fcfcfc' );
    add_option( 'kontur_copy_button_class', 'kontur button btn' );
    add_option( 'kontur_pre_background', '#fafafa' );
    add_option( 'kontur_copy_button_logo', $default_image );
    add_option( 'kontur_copy_button_use_logo', '' );

}

add_action( 'kontur_copy_code_button_default_options', 'kontur_copy_code_button_default_values' );






	