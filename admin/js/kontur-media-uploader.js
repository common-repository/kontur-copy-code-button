

   // media uploader
                                    jQuery(document).ready(function($) {
                                        var mediaUploader;
                                        $('#kontur_copy_button_logo_upload_image_button').click(function(e) {
                                            e.preventDefault();
                                            if (mediaUploader) {
                                                mediaUploader.open();
                                                return;
                                            }
                                            mediaUploader = wp.media.frames.file_frame = wp.media({
                                                title: 'Choose Image',
                                                button: {
                                                    text: 'Choose Image'
                                                },
                                                multiple: false
                                            });
                                            mediaUploader.on('select', function() {
                                                var attachment = mediaUploader.state().get('selection').first().toJSON();
                                                var backprev = attachment.url;
                                                $('#kontur_style_admin_logo2').val(attachment.url);
                                                $('#kontur_copy_button_logo').val(attachment.url);
                                                $('#adminbarbackgroundcolorpreview').val(attachment.url);

                                                $("#kontur-btn-clipboard-preview").html('<div class="mediafromlib" style="min-height:30px; max-width:30px; background-image: url(' + backprev + '); background-size:cover;"></div>');
                                                
                                                 $("#kontur-btn-admin-icon-preview").html('<div class="mediafromlib" style="min-height:30px; max-width:30px; background-image: url(' + backprev + '); background-size:cover;"></div>');


                                            });
                                            mediaUploader.open();
                                        });
                                        // input or paste URL
                                        $("#kontur_copy_button_logo").on("input", function() {


                                            var urlbackprev = $(this).val();


                                            $("#kontur-btn-clipboard-preview").text($(this).val());
                                            $("#kontur-btn-clipboard-preview").html('<div style="min-height:30px; max-width:30px; background-image: url(' + urlbackprev + '); background-size:cover;"></div>');
                                        });



                                    });