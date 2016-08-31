/**
 * Created by mario on 23/08/2016.
 */
jQuery(document).ready(function () {
    var url = (location.href).split('/');
    var name = url[url.length - 1];

    var category = url[url.length - 2];
    var type = 'productos';

    var IMAGES_CATEGORY = IMAGES + 'categorias/';
    var data = {key_nombre:category};
    url = BASE_ROOT + 'categorias/getByName';


    var product_name = jQuery('.product-name');
    var name_array = [];

    var product_collateral = jQuery('.product-collateral');
    var product_collateral_array = [];

    var image_products = jQuery('#image_product');
    jQuery.ajax({
        url: url,
        type: "POST",
        cache: false,
        data: data,
        dataType: 'json',
        async: false,
        success: function (response) {
            var data_products = {key_nombre: name, id_categoria: response.data.id};
            var url_products = BASE_ROOT + 'productos/getByName';
            jQuery.ajax({
                url: url_products,
                type: "POST",
                cache: false,
                data: data_products,
                dataType: 'json',
                async: false,
                success: function (response_products) {
                    var src = getImage(IMAGES_CATEGORY + response_products.data.categoria + '/' + type + '/' + response_products.data.key_nombre + '/', response_products.data.key_nombre, 1);
                    image_products.attr('src', src);
                    image_products.attr('title', response_products.data.nombre);
                    image_products.attr('alt', response_products.data.nombre);

                    jQuery('#title_product').text(response_products.data.nombre);
                    jQuery('#title-secondary').text(response_products.data.nombre);
                    name_array = ['<h1>', response_products.data.nombre, '</h1>'];
                    product_name.append(name_array.join(''));
                    
                    var descripcion = (response_products.data.descripcion).replace(/(?:\r\n|\r|\n)/g, '<br />');

                    product_collateral_array = [
                        '<div class="topSection">',
                        '<h1>', response_products.data.nombre, '</h1>',
                        '<div class="itemSection2" style="height: 270px;width: 330px;">',
                        '<div class="itemImgSection"',
                        'style="height: 110px;line-height: 110px;margin-bottom:15px;float:left">',
                        '<img width="100" src="', IMAGES_LOCAL, '15-minutes.jpg"',
                        'alt="', response_products.data.nombre, '" style="float:left">',
                        '<span style="font-size:15px;">Fast & Easy Application</span>',
                        '</div>',
                        '<div class="itemImgSection"',
                        'style="height: 110px;line-height: 110px;margin-bottom:15px;float:left">',
                        '<img width="100" src="', IMAGES_LOCAL, 'years-protection.png"',
                        'alt="', response_products.data.nombre, '" style="float:left">',
                        '<span style="font-size:15px;">Years of Protection</span>',
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
        }
    });
});