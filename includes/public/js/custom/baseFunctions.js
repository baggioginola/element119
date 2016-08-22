/**
 * Created by mario.cuevas on 7/14/2016.
 */
/* =================
global root variables
===================== */
jQuery(document).ready(function ()
{
    jQuery("#slider").easySlider({
        auto: true,
        continuous: true
    });

    var url = BASE_ROOT + 'categorias/getAll';

    jQuery.post(url, function (response, status) {
        if (status == 'success') {
            var categoryImages = [];
            var categories = jQuery('.categories');

            var type = 'categorias';

            var IMAGES_CATEGORY = IMAGES + type + '/';
            var i = 0;
            jQuery.each(response, function(key, value) {
                var src = getImage(IMAGES_CATEGORY + value.key_nombre + '/', value.key_nombre, 0);
                var style = '';
                if(i % 3 == 0) {
                    style = 'padding-right:10px;';
                }
                else if(i % 3 == 1){
                    style = 'padding-right:5px; padding-left:5px;';
                }
                else {
                    style = 'padding-left:10px;';
                }
                categoryImages = [
                    '<div class="application-div" style="',style,'">',
                    '<a href="',BASE_ROOT + value.key_nombre,'">',
                    '<h4>', value.nombre, '</h4>',
                    '<img alt="',value.nombre,'" src="',src,'">',
                    '</a>',
                    '</div>'];
                categories.append(categoryImages.join(''));
                i++;
            });
        }
    }, 'json');
});

function getImage(root_images, name, i)
{
    var url = root_images + name + '-' + i + '.jpg';
    var exists = jQuery.ajax({
        url: url,
        type: "POST",
        cache: false,
        dataType: 'json',
        async: false
    });

    if(exists.status != 200) {
        return root_images + name + '-' + i + '.png';
    }
    return url;
}