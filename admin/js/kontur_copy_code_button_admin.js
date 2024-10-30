(function( $ ) {
 
    // Add Color Picker to all inputs that have 'color-field' class
    $(function() {
        $('.color-field').wpColorPicker();
    });
    
   

     
})( jQuery );

//back
                       
               jQuery(document).ready(function() {
                                    jQuery('#kontur_copy_code_button_background').iris({
                                        hide: true,
                                        change: function(event, ui) {
                                            var idcolor = jQuery( 
                                            ui.color.toString());
                                            
                      
                                         jQuery(document).ready(function() {
                                            
                                            var mycolor_kontur_copy_code_button_background_color_info = ui.color.toString();
                                            jQuery("#dashboard-widgets-wrap").append('<style>  #kontur_copy_code_button_background_preview, #konturTwo > div > div > div > div  , .kontur-btn-clipboard,#kontur-btn-clipboard-preview, .kontur-btn-clipboard-preview {background: ' + mycolor_kontur_copy_code_button_background_color_info + '!important;} </style>').appendTo( "#kntr-admin-style-dashboard" );
                                                                        });
                                            
                                             jQuery(".kontur-btn-clipboard").css('background', ui.color.toString());

                                            jQuery("#kontur_copy_code_button_background_set > div > .wp-color-result.button").css('background-color', ui.color.toString());
                                          
                                        }
                                    });
                                });        
               
   //text

        jQuery(document).ready(function() {
            
         
                                    jQuery('#kontur_copy_code_button_color').iris({
                                        hide: true,
                                        change: function(event, ui) {
                                            var idcolor = jQuery( 
                                            ui.color.toString());
                                             jQuery("#kontur_copy_code_button_background_preview").css('color', ui.color.toString());
                                            

                                            jQuery("#kontur_kontur_copy_code_button_color_set > div > .wp-color-result.button").css('background-color', ui.color.toString());
                                          
                                        }
                                    });
                                });

//PRE

              jQuery(document).ready(function() {
                                    jQuery('#kontur_pre_background').iris({
                                        hide: true,
                                        change: function(event, ui) {
                                            var idcolor = jQuery( 
                                            ui.color.toString());
                                            
                      
                                    
                                            
                                             jQuery("pre.wp-block-code").css('background', ui.color.toString());

                                            jQuery("#kontur_pre_background_set > div > .wp-color-result.button").css('background-color', ui.color.toString());
                                          
                                        }
                                    });
                                });


//code
//PRE

              jQuery(document).ready(function() {
                                    jQuery('#kontur_pre_text').iris({
                                        hide: true,
                                        change: function(event, ui) {
                                            var idcolor = jQuery( 
                                            ui.color.toString());
                                            
                      
                                    
                                            
                                             jQuery("pre.wp-block-code code").css('color', ui.color.toString());

                                            jQuery("#kontur_pre_text_set > div > .wp-color-result.button").css('background-color', ui.color.toString());
                                          
                                        }
                                    });
                                });