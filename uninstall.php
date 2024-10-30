<?php

/**
 * @link       https://profiles.wordpress.org/netzaufsicht/
 * @since      1.0.0
 *
 * @package    Kontur_Copy_Code_Button
 */

// If uninstall not called from WordPress, then exit. 
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
} 

//Delete Options because nobody wants stuffed tables with useless content
        delete_option( 'kontur_button_text' );
        delete_option( 'kontur_button_text_copied' );
        delete_option( 'kontur_copy_text_safari' );
        delete_option( 'kontur_copy_text_other_browser' );
        delete_option( 'kontur_copy_code_button_background' );
        delete_option( 'kontur_copy_code_button_color' );
        delete_option( 'kontur_copy_button_class' );
        delete_option( 'kontur_pre_background' );

//since 1.1.0
        delete_option( 'kontur_icon_background' );
        delete_option( 'kontur_icon_color' );
        delete_option( 'kontur_copy_button_logo' );

//since 1.1.3
        delete_option( 'kontur_pre_text' );

//since 1.1.4
        delete_option( 'kontur_copy_button_use_logo' );
