jQuery(document).ready(function () {

    var kontur_button_text = '';
    var kontur_button_text_copied = copyScript.kontur_button_text_copied;
    var kontur_button_text_safari = copyScript.kontur_button_text_safari;
    var kontur_button_text_other_browser = copyScript.kontur_button_text_other_browser;
    var kontur_copy_button_class = copyScript.kontur_copy_button_class;
    var kontur_copy_button_logo = copyScript.kontur_copy_button_logo;
    var kontur_aria_button_text = copyScript.kontur_button_text;
    var kontur_copy_button_use_logo = copyScript.kontur_copy_button_use_logo;



    if (kontur_aria_button_text == '') {
        var kontur_aria_button_text = 'Copy';
    }
    if (kontur_button_text_copied == '') {
        var kontur_button_text_copied = 'Copied';
    }
    if (kontur_button_text_safari == '') {
        var kontur_button_text_safari = 'Press "⌘ + C" to copy';
    }
    if (kontur_button_text_other_browser == '') {
        var kontur_button_text_other_browser = 'Press "Ctrl + C" to copy';
    }



    if (kontur_copy_button_use_logo == '1') {
        kontur_button_text += '<div class="kontur-btn-clipboard-icon" style="min-height:30px; max-height:30px; margin-left: auto; margin-right: auto;  min-width:30px; max-width:30px; background-image: url(' + kontur_copy_button_logo + '); background-size:cover;"></div>';
    } else {
        var kontur_button_text = copyScript.kontur_button_text;
        if (kontur_button_text == '') {
            var kontur_button_text = 'Copy';
        }

    }
    if (kontur_copy_button_class == '') {
        var kontur_copy_button_class = 'kontur';
    }


    var copyButton = '<div id="showitem" class="ets kontur-btn-clipboard ' + kontur_copy_button_class + '" title="" data-original-title="Copy me to clipboard"  aria-label="' + kontur_aria_button_text + '">' + kontur_button_text + '</div>';
    jQuery('pre').each(function () {

        jQuery(this).wrap('<div class="konturPreCodeWrapper"/>');
        jQuery(this).css('padding', '2.75rem');



    });
    jQuery('div.konturPreCodeWrapper').prepend(jQuery(copyButton)).children('.kontur-btn-clipboard').show();


    // Run Clipboard
    var copyCode = new ClipboardJS('.kontur-btn-clipboard', {
        target: function (trigger) {
            return trigger.nextElementSibling;
        }
    });

    // On success:
    // - Change the "Copy" text to "Copied".
    // - Swap it to "Copy" in 2s.
    // - Lead user to the "contenteditable" area with Velocity scroll.

    copyCode.on('success', function (event) {
        event.clearSelection();
        event.trigger.innerHTML = kontur_button_text_copied;
        window.setTimeout(function () {
            event.trigger.innerHTML = kontur_button_text;
        }, 2000);
        /* $.Velocity(pasteContent, 'scroll', { 
          duration: 1000 
        }); */
    });
    // On error (Safari):
    // - Change the  "Press Ctrl+C to copy"
    // - Swap it to "Copy" in 2s.
    copyCode.on('error', function (event) {
        var is_safari = /^((?!chrome|android).)*safari/i.test(navigator.userAgent);

        if (is_safari) {
            event.trigger.innerHTML = kontur_button_text_safari;
        } else if (navigator.userAgent.match(/ipad|ipod|iphone/i)) {
            event.trigger.innerHTML = kontur_button_text_other_browser;
        } else {
            event.trigger.innerHTML = kontur_button_text_other_browser;
        }

        window.setTimeout(function () {
            event.trigger.innerHTML = kontur_button_text;
        }, 5000);
    });

});