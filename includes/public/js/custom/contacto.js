/**
 * Created by mario on 03/09/2016.
 */
jQuery(document).ready(function () {
    jQuery('#contactForm').submit(function(){
        jQuery('#mensaje_servidor').slideUp();
        jQuery.ajax({
            url: "contacto/sendMessage",
            type: "POST",
            cache: false,
            data: {
                mensaje: jQuery('#mensaje').val(),
                email: jQuery('#email').val()
            },
            dataType: 'json',
            async: false,
            success: function (data) {
                jQuery('#mensaje_servidor').html('El mensaje fue enviado correctamente');
                jQuery('#mensaje_servidor').slideDown();
                jQuery('#mensaje').val('');
                jQuery('#email').val('');
            }
        });
        return false;
    });
});