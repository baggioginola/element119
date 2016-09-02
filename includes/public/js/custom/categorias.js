/**
 * Created by mario on 21/08/2016.
 */
jQuery(document).ready(function () {
    var url = (location.href).split('/');
    var name = url[url.length - 1];
    var type = 'categorias';

    var IMAGES_CATEGORY = IMAGES + type + '/';

    var data = {key_nombre: name};
    url = BASE_ROOT + 'categorias/getByName';
    var category_name = jQuery('.product-name');
    var name_array = [];

    var product_collateral = jQuery('.product-collateral');
    var product_collateral_array = [];

    var image_category = jQuery('#image_category');

    jQuery.ajax({
        url: url,
        type: "POST",
        cache: false,
        data: data,
        dataType: 'json',
        async: false,
        success: function (response) {
            var src = getImage(IMAGES_CATEGORY + response.data.key_nombre + '/', response.data.key_nombre, 1);
            image_category.attr('src', src);
            image_category.attr('title', response.data.nombre_descripcion);
            image_category.attr('alt', response.data.nombre_descripcion);

            jQuery('#category_title').text(response.data.nombre);
            name_array = ['<h1>', response.data.nombre_descripcion, '</h1>'];
            category_name.append(name_array.join(''));
            var descripcion = (response.data.descripcion).replace(/(?:\r\n|\r|\n)/g, '<br />');

            product_collateral_array = [
                '<div class="topSection">',
                '<h1>', response.data.nombre_descripcion, '</h1>',
                '<div class="itemSection2" style="height: 270px;width: 330px;">',
                '<div class="itemImgSection"',
                'style="height: 110px;line-height: 110px;margin-bottom:15px;float:left">',
                '<img width="100" src="', IMAGES_LOCAL, '15-minutes.jpg"',
                'alt="', response.data.nombre_descripcion, '" style="float:left">',
                '<span style="font-size:15px;">Fácil y Rápida Aplicación</span>',
                '</div>',
                '<div class="itemImgSection"',
                'style="height: 110px;line-height: 110px;margin-bottom:15px;float:left">',
                '<img width="100" src="', IMAGES_LOCAL, 'years-protection.png"',
                'alt="', response.data.nombre_descripcion, '" style="float:left">',
                '<span style="font-size:15px;">Años de protección</span>',
                '</div>',
                '</div>',
                '</div>',
                '<div class="topSection">',
                '<p class="txtPage">',
                '', descripcion, '',
                '</p>',
                '</div>'];
            product_collateral.append(product_collateral_array.join(''));

            var data_products = {id_categoria: response.data.id};
            var url_products = BASE_ROOT + 'productos/getByCategory';

            var products = jQuery('#productos');
            var products_array = [];
            var IMAGES_PRODUCT = IMAGES_CATEGORY + response.data.key_nombre + '/productos/';
            jQuery.ajax({
                url: url_products,
                type: "POST",
                cache: false,
                data: data_products,
                dataType: 'json',
                async: false,
                success: function (response_products) {
                    jQuery.each(response_products.data, function (key, value) {
                        var src = getImage(IMAGES_PRODUCT + value.key_nombre + '/',value.key_nombre, 0);
                        products_array = [
                            '<div class="product-links-left">',
                            '<a href="',BASE_ROOT + response.data.key_nombre + '/' + value.key_nombre,'">',
                            '<span>',value.nombre,'</span>',
                            '<img alt="',value.nombre,'"',
                            'src="',src,'" width="352" height="116">',
                            '</a>',
                            '</div>'];
                        products.append(products_array.join(''));
                    });
                }
            });

        }
    });
});