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

    var type = 'categorias';

    var IMAGES_CATEGORY = IMAGES + type + '/';

    var data = {id_categoria: 2};
    var url = BASE_ROOT + 'productos/getByCategory';

    var products = jQuery('.productos');
    var products_array = [];
    var IMAGES_PRODUCT = IMAGES_CATEGORY + 'system-x/productos/';
    jQuery.ajax({
        url: url,
        type: "POST",
        cache: false,
        data: data,
        dataType: 'json',
        async: false,
        success: function (response) {
            jQuery.each(response.data, function (key, value) {
                var src = getImage(IMAGES_PRODUCT + value.key_nombre + '/',value.key_nombre, 0);
                products_array = [
                    '<div class="product-links-left">',
                    '<a href="',BASE_ROOT + 'system-x/' + value.key_nombre,'">',
                    '<span>',value.nombre,'</span>',
                    '<img alt="',value.nombre,'"',
                    'src="',src,'" width="352" height="116">',
                    '</a>',
                    '</div>'];
                products.append(products_array.join(''));
            });
        }
    });
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