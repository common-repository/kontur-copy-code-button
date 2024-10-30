<?php
/**
 * @link       https://profiles.wordpress.org/netzaufsicht/
 * @since      1.1.0
 *
 * @package    Kontur_Copy_Code_Button
 */

// Exit If Accessed Directly
if ( ! defined( 'ABSPATH' ) ) exit;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
if (__FILE__ == $_SERVER['SCRIPT_FILENAME']) { exit; }


// SETTINGS PAGE

function kontur_copy_code_button(){?>
<div class="wrap" style="background:white;  padding:15px;">

    <style>
        body {
            background: white;
        }

        .d30er {
            font-size: 30px;
            width: 30px;
            height: 30px;
        }

        .metabox-holder h2.hndle {
            font-size: 23px;
            padding: 8px 12px;
            color: #ac80b1;
            margin: 0;
            line-height: 1.4;
            font-weight: 200;
        }

        .wp-core-ui .button-primary {
            background: #ac80b1;
            border-color: #ffffff;
            color: #fff;
            text-decoration: none;
            text-shadow: none;

        }
    </style>
    <hr>
    <?php if (isset($_GET['settings-updated'])) : ?>
    <div class="notice notice-success is-dismissible" style="border-left-color: #56a73a;
background: rgb(244, 251, 232);
}">
        <p class="h1"><?php esc_html_e( 'SETTINGS UPDATED !', 'kontur-copy-code-button' ); ?>
        </p>
    </div>
    <?php endif; ?>





    <div class="kntr-row d-flex kntr-header align-items-center pt-5 ps-2">
        <div class="kntr-col-10 mx-auto" style="max-width:300px;"><img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/kontur_copy_code_button.png'; ?>" alt="kontur Copy Code Button " height="auto" width="100%"> </div>
        <div class="kntr-col-9">
            <h1 class="kntr-large mt-3 text-end">
                <?php esc_html_e( 'kontur Copy Code Button', 'kontur-copy-code-button' ); ?>
            </h1>

        </div>

    </div>
    <form method="post" action="options.php" enctype="multipart/form-data">
        <?php settings_fields( 'kontur-copy-code-button-plugin-settings-group' ); ?>
        <?php do_settings_sections( 'kontur-copy-code-button-plugin-settings-group' ); ?>


        <hr>
        <h2> <?php esc_html_e( 'Change Your Settings', 'kontur-copy-code-button' ); ?>
        </h2>

        <div id="dashboard-widgets-wrap">
            <div id="dashboard-widgets" class="metabox-holder">
                <div id="postbox-container-1" class="postbox-container">
                    <div id="konturOne" class="postbox meta-box-sortables ">
                        <h2 class="hndle ui-sortable-handle"><span class="dashicons d30er dashicons-edit"></span> <?php esc_html_e( 'Set your own Text for the Button', 'kontur-copy-code-button' ); ?></h2>
                        <div class="inside">

                            <?php esc_html_e( 'Copy Button Text:', 'kontur-copy-code-button' ); ?><br>
                            <input type="text" id="kontur_button_text" name="kontur_button_text" placeholder="<?php esc_html_e( ' e.g. "Copy Code"', 'kontur-copy-code-button' ); ?>" value="<?php echo esc_attr( get_option('kontur_button_text') ); ?>" />

                            <br>
                            <?php esc_html_e( 'Text after copying:', 'kontur-copy-code-button' ); ?>
                            <br>
                            <input type="text" id="kontur_button_text_copied" name="kontur_button_text_copied" placeholder="<?php esc_html_e( ' e.g. "Copied"', 'kontur-copy-code-button' ); ?>" value="<?php echo esc_attr( get_option('kontur_button_text_copied') ); ?>" />

                       

                            <?php submit_button( __( 'Save button label texts', 'kontur-copy-code-button' ),'button button-hero' ); ?>
     <hr>
                            <div class="me-3">


                                <script>
                                    jQuery(document).ready(function() {
                                        jQuery(".Send_data").click(function(e) {
                                            if (jQuery("input[type=radio][name=iconitem]:checked").length == 0) {
                                                //icons
                                                return false;
                                            } else {
                                                var iconitem = jQuery("input[type=radio][name=iconitem]:checked").val();





                                                //change preview

                                                jQuery("#kontur-btn-clipboard-preview").html('<div style="min-height:30px; max-width:30px; background-image: url(' + iconitem + '); background-size:cover;"></div>');

                                                jQuery("#kontur-btn-admin-icon-preview").html('<div style="min-height:30px; max-width:30px; background-image: url(' + iconitem + '); background-size:cover;"></div>');

                                                jQuery('#kontur_copy_button_logo').val(iconitem);
                                            }
                                        });






                                        // input copy text prview
                                        jQuery("#kontur_button_text").on("input", function() {





                                            jQuery("#kontur_copy_code_button_background_preview").text(jQuery(this).val());

                                        });



                                        // input copied text prview
                                        jQuery("#kontur_button_text_copied").on("input", function() {





                                            jQuery("#kontur_copy_code_button_background_preview").text(jQuery(this).val());

                                        });






                                    });
                                </script>



                                <h2 class="hndle ui-sortable-handle"><span class="dashicons d30er dashicons-admin-media "></span> <?php esc_html_e( 'Use your/an icon to copy:', 'kontur-copy-code-button' ); ?></h2>
                                <hr>






                                <style>
                                    .kontur-btn-clipboard-preview {
                                        color: <?php echo esc_attr(get_option('kontur_copy_code_button_color'));
                                        ?>;
                                        background-color: <?php echo esc_attr(get_option('kontur_copy_code_button_background'));
                                        ?>;
                                </style>







                                <script>
                                    jQuery(document).ready(function() {
                                        jQuery('#kontur_copy_code_button_background').iris({
                                            hide: true,
                                            change: function(event, ui) {
                                                var idcolor = jQuery(
                                                    ui.color.toString());


                                                jQuery(document).ready(function() {

                                                    var mycolor_kontur_copy_code_button_background_color_info = ui.color.toString();
                                                    jQuery("#dashboard-widgets-wrap").append('<style>  #kontur_copy_code_button_background_preview, #konturTwo > div > div > div > div  , .kontur-btn-clipboard,#kontur-btn-clipboard-preview, #kontur-btn-clipboard-preview01, #kontur-btn-clipboard-preview02, #kontur-btn-clipboard-preview03, #kontur-btn-clipboard-preview04, #kontur-btn-clipboard-preview05, #kontur-btn-clipboard-preview06, .kontur-btn-clipboard-preview {background: ' + mycolor_kontur_copy_code_button_background_color_info + '!important;} </style>').appendTo("#kntr-admin-style-dashboard");
                                                });

                                                jQuery(".kontur-btn-clipboard").css('background', ui.color.toString());

                                                jQuery("#kontur_copy_code_button_background_set > div > .wp-color-result.button").css('background-color', ui.color.toString());

                                            }
                                        });
                                    });
                                </script>



                                <style>
                                    input#konturradiobtn1,
                                    input#konturradiobtn2,
                                    input#konturradiobtn3,
                                    input#konturradiobtn4,
                                    input#konturradiobtn5,
                                    input#konturradiobtn6 {
                                        display: none;
                                    }


                                    input#konturradiobtn1[type="radio"]+label>div#kontur-btn-clipboard-preview01,
                                    input#konturradiobtn2[type="radio"]+label>div#kontur-btn-clipboard-preview02,
                                    input#konturradiobtn3[type="radio"]+label>div#kontur-btn-clipboard-preview03,
                                    input#konturradiobtn4[type="radio"]+label>div#kontur-btn-clipboard-preview04,
                                    input#konturradiobtn5[type="radio"]+label>div#kontur-btn-clipboard-preview05,
                                    input#konturradiobtn6[type="radio"]+label>div#kontur-btn-clipboard-preview06 {
                                        border: 2px solid #fff !important;
                                        border-radius: 2px;
                                        box-shadow: 4px 5px 5px -2px rgba(255, 255, 255, 0.99);
                                    }


                                    input#konturradiobtn1[type="radio"]:checked+label>div#kontur-btn-clipboard-preview01,
                                    input#konturradiobtn2[type="radio"]:checked+label>div#kontur-btn-clipboard-preview02,
                                    input#konturradiobtn3[type="radio"]:checked+label>div#kontur-btn-clipboard-preview03,
                                    input#konturradiobtn4[type="radio"]:checked+label>div#kontur-btn-clipboard-preview04,
                                    input#konturradiobtn5[type="radio"]:checked+label>div#kontur-btn-clipboard-preview05,
                                    input#konturradiobtn6[type="radio"]:checked+label>div#kontur-btn-clipboard-preview06 {
                                        border: 2px solid #b17faf !important;
                                        box-shadow: 4px 5px 5px -2px rgba(194, 129, 200, 0.48);
                                    }
                                </style>







                                <div id="kontur-btn-clipboard-preview" style="width:30px; height:auto; padding:8px; background:<?php echo esc_attr( get_option('kontur_copy_code_button_background') ); ?> " class="my-3">
                                    <div style="min-height:30px; max-width:30px; background-image: url('<?php echo esc_attr( get_option('kontur_copy_button_logo') ); ?>'); background-size:cover;"></div>
                                </div>


                                <input type="checkbox" id="kontur_copy_button_use_logo" name="kontur_copy_button_use_logo" value="1" <?php checked(1, get_option('kontur_copy_button_use_logo'), true); ?> /><?php esc_html_e( 'Icon as copy button "text"', 'kontur-copy-code-button' ); ?>
                                <script>
                                    jQuery(document).ready(function() {
                                        jQuery("#kontur_copy_button_use_logo").click(function() {
                                            jQuery("#saveiconsettingsfirst").toggle(400);
                                            jQuery("#checkboxicon").toggle();
                                        });
                                    });
                                </script>


                                <div id="saveiconsettingsfirst" style="display:none">


                                    <h2 class="border shadow text-center" style="font-size: 23px;
                                                                                 padding: 8px 12px;
                                                                                 color: #ac80b1;
                                                                                 margin: 0;
                                                                                 text-transform:uppercase;
                                                                                 line-height: 1.4;
                                                                                 font-weight: 900;">
                                        SAVE THIS first &darr;</h2>
                                    <div class="kntr-row flex-row d-flex align-items-center justify-content-start">
                                        <img src="<?php echo plugin_dir_url( __FILE__ ) . 'images/kontur_copy_code_button.png'; ?>" alt="kontur Copy Code Button " class="kntr-col-3" height="auto" width="80px">
                                        <?php submit_button(  __( 'Save Icon settings', 'kontur-copy-code-button' ),'button  button-hero button-primary kntr-col-9', 'submit-icon-setting', 0 ); ?>

                                    </div>
                                </div>
                                <?php $kontur_copy_button_use_logo_checked = get_option('kontur_copy_button_use_logo', '1'); ?>
                                <?php if ( 1 != $kontur_copy_button_use_logo_checked ): ?> <br><small id="checkboxicon"><?php esc_html_e('Check to use your icon', 'kontur-copy-code-button') ?> </small>


                                <?php else : ?><br><small id="checkboxicon">
                                    <?php esc_html_e('Uncheck to use the text ', 'kontur-copy-code-button') ?></small>
                                <?php endif ?>
                               
                                <input id="kontur_copy_button_logo" type="text" class="mt-2" name="kontur_copy_button_logo" style="width:99%; font-size:10px;" value="<?php echo get_option('kontur_copy_button_logo'); ?>" /><br><small class="d-block my-1">&uarr; <?php esc_html_e( 'paste image URL - OR:', 'kontur-copy-code-button' ); ?><br> </small>


                                <input id="kontur_copy_button_logo_upload_image_button" type="button" class="button-secondary" style="width:100%;" value="<?php esc_html_e( 'Select icon from media library', 'kontur-copy-code-button' ); ?>" />
                                <br><small class="d-block py-2"><?php esc_html_e( 'OR click to select icon:', 'kontur-copy-code-button' ); ?>

                                </small>
                                <div class="kntr-row flex-row d-flex align-items-start justify-content-start">

                                    <div class="kntr-col-auto ps-2 p-0">
                                        <input type="radio" id="konturradiobtn1" name="iconitem" class="Send_data  kntr-icon-select input-hidden" value="<?php echo KONTURCOPYCODEBUTTON_IMG_URL . '/kontur_us-code-button-01.svg'; ?>" />

                                        <label class="d-inline" for="konturradiobtn1">

                                            <div id="kontur-btn-clipboard-preview01" style="width:30px; height:auto; padding:8px;  " class="kontur-btn-clipboard-preview mt-0 mb-1">

                                                <div style="min-height:30px; max-width:30px; background-image: url(<?php echo KONTURCOPYCODEBUTTON_IMG_URL . '/kontur_us-code-button-01.svg'; ?>); background-size:cover;"></div>



                                            </div>
                                        </label>

                                    </div>



                                    <div class="kntr-col-auto ps-2 p-0">
                                        <input type="radio" id="konturradiobtn2" name="iconitem" class="Send_data  kntr-icon-select input-hidden" value="<?php echo KONTURCOPYCODEBUTTON_IMG_URL . '/kontur_us-code-button-02.svg'; ?>" />

                                        <label class="d-inline" for="konturradiobtn2">

                                            <div id="kontur-btn-clipboard-preview02" style="width:30px; height:auto; padding:8px;  " class="kontur-btn-clipboard-preview mt-0 mb-1">

                                                <div style="min-height:30px; max-width:30px; background-image: url(<?php echo KONTURCOPYCODEBUTTON_IMG_URL . '/kontur_us-code-button-02.svg'; ?>); background-size:cover;"></div>



                                            </div>
                                        </label>

                                    </div>





                                    <div class="kntr-col-auto ps-2 p-0">
                                        <input type="radio" id="konturradiobtn3" name="iconitem" class="Send_data  kntr-icon-select input-hidden" value="<?php echo KONTURCOPYCODEBUTTON_IMG_URL . '/kontur_us-code-button-03.svg'; ?>" />

                                        <label class="d-inline" for="konturradiobtn3">

                                            <div id="kontur-btn-clipboard-preview03" style="width:30px; height:auto; padding:8px;  " class="kontur-btn-clipboard-preview mt-0 mb-1">

                                                <div style="min-height:30px; max-width:30px; background-image: url(<?php echo KONTURCOPYCODEBUTTON_IMG_URL . '/kontur_us-code-button-03.svg'; ?>); background-size:cover;"></div>



                                            </div>
                                        </label>

                                    </div>



                                    <div class="kntr-col-auto ps-2 p-0">
                                        <input type="radio" id="konturradiobtn4" name="iconitem" class="Send_data  kntr-icon-select input-hidden" value="<?php echo KONTURCOPYCODEBUTTON_IMG_URL . '/kontur_us-code-button-04.svg'; ?>" />

                                        <label class="d-inline" for="konturradiobtn4">

                                            <div id="kontur-btn-clipboard-preview04" style="width:30px; height:auto; padding:8px;  " class="kontur-btn-clipboard-preview mt-0 mb-1">

                                                <div style="min-height:30px; max-width:30px; background-image: url(<?php echo KONTURCOPYCODEBUTTON_IMG_URL . '/kontur_us-code-button-04.svg'; ?>); background-size:cover;"></div>



                                            </div>
                                        </label>

                                    </div>


                                    <div class="kntr-col-auto ps-2 p-0">
                                        <input type="radio" id="konturradiobtn5" name="iconitem" class="Send_data  kntr-icon-select input-hidden" value="<?php echo KONTURCOPYCODEBUTTON_IMG_URL . '/kontur_us-code-button-05.svg'; ?>" />

                                        <label class="d-inline" for="konturradiobtn5">

                                            <div id="kontur-btn-clipboard-preview05" style="width:30px; height:auto; padding:8px;  " class="kontur-btn-clipboard-preview mt-0 mb-1">

                                                <div style="min-height:30px; max-width:30px; background-image: url(<?php echo KONTURCOPYCODEBUTTON_IMG_URL . '/kontur_us-code-button-05.svg'; ?>); background-size:cover;"></div>



                                            </div>
                                        </label>

                                    </div>



                                    <div class="kntr-col-auto ps-2 p-0">
                                        <input type="radio" id="konturradiobtn6" name="iconitem" class="Send_data  kntr-icon-select input-hidden" value="<?php echo KONTURCOPYCODEBUTTON_IMG_URL . '/kontur_us-code-button-06.svg'; ?>" />

                                        <label class="d-inline" for="konturradiobtn6">

                                            <div id="kontur-btn-clipboard-preview06" style="width:30px; height:auto; padding:8px;  " class="kontur-btn-clipboard-preview mt-0 mb-1">

                                                <div style="min-height:30px; max-width:30px; background-image: url(<?php echo KONTURCOPYCODEBUTTON_IMG_URL . '/kontur_us-code-button-06.svg'; ?>); background-size:cover;"></div>



                                            </div>
                                        </label>

                                    </div>



                                </div>

                               





                                <?php submit_button( __( 'Save Icon settings', 'kontur-copy-code-button' ),'button button-primary' ); ?>


                            </div>


                        </div>
                    </div>

                </div>
                <div id="postbox-container-2" class="postbox-container">
                    <div id="konturTwo" class="postbox meta-box-sortables ">
                        <h2 class="hndle ui-sortable-handle">
                            <span class="dashicons d30er dashicons-welcome-view-site"></span> <?php esc_html_e( 'You got the looks', 'kontur-copy-code-button' ); ?>
                        </h2>
                        <div class="inside">
                            <p>
                                <?php esc_html_e( 'This is how it would look like right now:', 'kontur-copy-code-button' ); ?>
                                <br><small><?php esc_html_e( 'Yep. That\'s really an ugly preview - we know ;-)', 'kontur-copy-code-button' ); ?></small>
                            </p>
                            <div class="konturPreCodeWrapper" style="border: 1px dashed black;">

                                <?php if ( 1 != $kontur_copy_button_use_logo_checked ): ?>
                                <div id="kontur_copy_code_button_background_preview" class="kontur-btn-clipboard" style="color:<?php echo esc_attr( get_option('kontur_copy_code_button_color') ); ?>; background-color:<?php echo esc_attr( get_option('kontur_copy_code_button_background') ); ?>" title="" data-original-title="Copy me to clipboard"><?php echo esc_attr( get_option('kontur_button_text') ); ?></div>


                                <?php else : ?>
                                <div class="kontur-btn-clipboard" style="color:<?php echo esc_attr( get_option('kontur_copy_code_button_color') ); ?>; background-color:<?php echo esc_attr( get_option('kontur_copy_code_button_background') ); ?>" title="" data-original-title="Copy me to clipboard">
                                    <div id="kontur-btn-admin-icon-preview" style="width:30px; height:auto; padding:8px; margin-left:auto; margin-right:auto; background:<?php echo esc_attr( get_option('kontur_copy_code_button_background') ); ?> " class="my-3">
                                        <div style="min-height:30px; max-width:30px; background-image: url('<?php echo esc_attr( get_option('kontur_copy_button_logo') ); ?>'); background-size:cover;"></div>
                                    </div>
                                </div>
                                <?php endif ?>


                                <pre class="wp-block-code" style="padding: 2.75rem; margin-bottom:0; background:<?php echo esc_attr( get_option('kontur_pre_background') ); ?>; color:<?php echo esc_attr( get_option('kontur_pre_text') ); ?> "><code style="color:<?php echo esc_attr( get_option('kontur_pre_text') ); ?>">    
     &lt;a href="https://kontur.us/" 
    aria-label="vistit kontur.us" class="btn button"&gt;
    &lt;img src="https://kontur.us/demo-button.png" 
    alt="vistit kontur.us"
    target="_blank"
    style="max-width:100%;width:341px;height:auto;"&gt;
&lt;/a&gt;</code></pre>
                            </div>


                        </div>
                    </div>



                </div>

                <div id="postbox-container-3" class="postbox-container">







                    <div id="konturThree" class="postbox meta-box-sortables ">
                        <h2 class="hndle ui-sortable-handle"><span class="dashicons d30er dashicons-admin-customizer"></span><?php esc_html_e( 'Style it Baby', 'kontur-copy-code-button' ); ?> </h2>
                        <div class="inside">
                            <div class="kntr-row flex-row d-flex align-items-center justify-content-between">



                                <div class="kntr-col-auto kntr-col-6" style="margin-top: 5px;">
                                    <?php _e('Button <strong>Background Color</strong>:', 'kontur-copy-code-button') ?>


                                    <div id="kontur_copy_code_button_background_set">
                                        <input type="text" id="kontur_copy_code_button_background" class="color-field" name="kontur_copy_code_button_background" value="<?php echo esc_attr( get_option('kontur_copy_code_button_background') ); ?>" />
                                    </div>

                                    <small><?php esc_html_e( 'Current color: ', 'kontur-copy-code-button' ); ?> <?php echo esc_attr( get_option('kontur_copy_code_button_background') ); ?></small>
                                    <br>
                                    <?php submit_button( __( 'Save Background Color', 'kontur-copy-code-button' ) ,'button mt-1 button-primary ', 'submit', 0 ); ?>




                                </div>





                                <div class="kntr-col-auto kntr-col-6" style="margin-top: 5px;">
                                    <?php _e('Button <strong>Text Color</strong>:', 'kontur-copy-code-button') ?>
                                    <br>

                                    <div id="kontur_kontur_copy_code_button_color_set">
                                        <input type="text" id="kontur_copy_code_button_color" class="color-field" name="kontur_copy_code_button_color" value="<?php echo esc_attr( get_option('kontur_copy_code_button_color') ); ?>" />
                                    </div>


                                    <small><?php esc_html_e( 'Current color: ', 'kontur-copy-code-button' ); ?><?php echo esc_attr( get_option('kontur_copy_code_button_color') ); ?></small>
                                    <br>
                                    <?php submit_button( __( 'Save Text Color', 'kontur-copy-code-button' ) ,'button mt-1 button-primary ', 'submit', 0 ); ?>
                                </div>



                                <hr class="mt-3">

                                <div class="kntr-col-auto kntr-col-6 align-self-end" style="margin-top: 15px;">

                                    <?php _e('Code "pre" Block Background', 'kontur-copy-code-button') ?>
                                    <br>

                                    <div class="" id="kontur_pre_background_set">

                                        <input type="text" id="kontur_pre_background" class="color-field" name="kontur_pre_background" value="<?php echo esc_attr( get_option('kontur_pre_background') ); ?>" />

                                    </div>

                                    <small class="kntr-col-12"><?php esc_html_e( 'Current color: ', 'kontur-copy-code-button' ); ?><?php echo esc_attr( get_option('kontur_pre_background') ); ?></small>

                                    <br>
                                    <?php submit_button( __( 'Save Box Background', 'kontur-copy-code-button' ),'button mt-1 button-primary ', 'submit', 0 ); ?>

                                </div>
                                <div class="kntr-col-auto kntr-col-6 align-self-end" style="margin-top: 15px;">

                                    <small><?php esc_html_e( 'Hint: You can change the color of the actual code text within the Gutenberg block!', 'kontur-copy-code-button' ); ?></small>

                                    <div id="kontur_pre_text_set">

                                        <input type="text" id="kontur_pre_text" class="color-field" name="kontur_pre_text" value="<?php echo esc_attr( get_option('kontur_pre_text') ); ?>" />

                                    </div>

                                    <small><?php esc_html_e( 'Current color: ', 'kontur_pre_text' ); ?><?php echo esc_attr( get_option('kontur_pre_text') ); ?></small>


                                    <?php submit_button( __( 'Save "Code" text color', 'kontur-copy-code-button' ),'button mt-1 d-block button-primary ', 'submit', 0 ); ?>


                                </div>



                            </div>
                        </div>
                    </div>



                </div>




                <div id="postbox-container-4" class="postbox-container">
                    <div id="konturFour" class="postbox meta-box-sortables ">
                        <h2 class="hndle ui-sortable-handle"><span class="dashicons d30er dashicons-admin-tools"></span> <?php esc_html_e( 'Get Classy', 'kontur-copy-code-button' ); ?></h2>
                        <div class="inside">
                            <p>
                                <?php esc_html_e( 'Add your custom class(es) to make the button match your theme.', 'kontur-copy-code-button' ); ?><br>
                                <small><?php esc_html_e( ' Input goes like this for multiple classes: "class1 class2 class3"', 'kontur-copy-code-button' ); ?>?</small>
                            </p>

                            <input type="text" class="kntr-col-12" name="kontur_copy_button_class" value="<?php echo esc_attr( get_option('kontur_copy_button_class') ); ?>" />

                            <?php submit_button( __( 'Save added classes', 'kontur-copy-code-button' ),'button mt-1 button-primary ', 'submit', 0 ); ?>



                        </div>
                    </div>



                </div>


            </div>

        </div>







        <hr>
        <?php submit_button( __( 'Save all settings', 'kontur-copy-code-button' ),'button button-primary button-hero konturSubmitter' ); ?>
        <hr>
    </form>

</div>

<?php }