/**
 * Created by mario.cuevas on 5/12/2016.
 */
$(document).ready(function () {
    $("#id_imagen").fileinput({
        uploadUrl: "imagenes/add",
        allowedFileExtensions: ["jpg", "png"],
        maxFileCount: 2,
        minFileCount: 2,
        uploadAsync: false,
        language: "es",
        showUpload: false,
        fileActionSettings: {showUpload: false, showZoom: false},
        previewSettings: {image: {width: "auto", height: "100px"}},
        overwriteInitial: false,
        purifyHtml: true,
        uploadExtraData: function (previewId, index) {
            var info = {"type": "categorias", "name": $("#id_nombre").val()};
            return info;
        }
    }).on('filebatchuploadsuccess', function (event, data) {
        var out = '';
    });

    $('#reset_button').click(function () {
        $("#id_imagen").fileinput("refresh");
        $('#form_global').trigger("reset");
        $('#submit_type').val('categorias/add');
        $('#submit_id').val('');

        return false;
    });

    var url = 'categorias/getAll';
    var columns = [{data: 'nombre'}];

    var table = masterDatatable(url, columns);

    $('#datatable tbody').on('click', '#btn_edit', function () {

        $("#form_alert").slideUp();
        var id = table.row($(this).parents('tr')).data().id;

        var data = {id: id};
        var url = 'categorias/getById';

        $('#submit_type').val('categorias/edit');

        $.post(url, data, function (response, status) {
            if (status == 'success') {
                var IMAGES_CATEGORY = IMAGES + 'categorias' + '/' + response.key_nombre + '/';
                var images = [];
                var initialPreviewConfigObj = [];

                for (var i = 0; i < CATEGORY_NUM_IMAGES; i++) {
                    var dataImage = getImage(IMAGES_CATEGORY, response.key_nombre, i);
                    images[i] = '<img src="' + dataImage.url + '" class="file-preview-image" alt="Desert" title="Desert" style="width:auto; height:160px;">';

                    var initialPreviewConfigItem = {};
                    initialPreviewConfigItem['caption'] = dataImage.name;
                    initialPreviewConfigObj.push(initialPreviewConfigItem);
                }

                $('#id_imagen').fileinput('refresh', {
                    initialPreview: images,
                    initialPreviewFileType: 'image',
                    fileActionSettings: {showDrag: false},
                    initialPreviewShowDelete: true,
                    maxFileCount: 2,
                    minFileCount: 2,
                    initialPreviewConfig: initialPreviewConfigObj,
                    layoutTemplates: {actionDelete: '<button type="button" class="kv-file-remove btn btn-xs btn-default delete" title="Eliminar Archivo"><i class="glyphicon glyphicon-trash text-danger"></i></button>\n'}
                });

                $.each(response, function (key, val) {

                    $("input[name=" + key + "]").val(val);
                    $("textarea[name=" + key + "]").val(val);
                });
            }

            $('#submit_id').val(response.id);

            $('.delete').click(function () {
                var frame = $(this).closest('.file-preview-frame');
                frame.fadeOut(800, function () {
                    $(this).remove();
                    if ($.trim($(".file-initial-thumbs").html())=='') {
                        var file_drop_zone = $(".file-drop-zone");
                        var file_drop_zone_title = '<div class="file-drop-zone-title">Arrastre y suelte aquí los archivos …</div>';
                        file_drop_zone.append(file_drop_zone_title);
                    }
                });
            });
        }, 'json');
        return false;
    });

    $('#datatable tbody').on('click', '#btn_delete', function () {
        var id = table.row($(this).parents('tr')).data().id;
        bootbox.confirm("Eliminar elemento?", function (result) {
            if (result == true) {
                var data = {id: id, active: 0};
                var url = 'categorias/delete';
                $.post(url, data, function (response, status) {
                    if (status == 'success') {
                        bootbox.alert(response.message);
                        table.ajax.reload();
                    }
                }, 'json');
            }
        });
        return false;
    });

    var form = $('#form_global').submit(function () {
        if ($('#id_submit').hasClass('disabled')) {
            return false;
        }

        var type = $('#submit_type').val();
        if(type == 'categorias/add') {
            var url = 'categorias/checkDuplicatedName';
            var data_name = {nombre: $('#id_nombre').val()}

            var checkDuplicated = $.ajax({
                url: url,
                type: "POST",
                cache: false,
                data: data_name,
                dataType: 'json',
                async: false,
                success: function (data) {
                    return data;
                }
            });

            if (checkDuplicated.responseJSON.status == 200) {
                submit_response(form, checkDuplicated.responseJSON, 'categorias/add');
                return false;
            }
        }

        if ($('#id_imagen').fileinput('upload') == null) {
            return false;
        }

        var data = $(this).serialize();

        if (type == 'categorias/edit') {
            var id = $('#submit_id').val();
            data = data + '&' + $.param({'id': id});
        }

        $.ajax({
            url: type,
            type: "POST",
            cache: false,
            data: data,
            dataType: 'json',
            async: false,
            success: function (data) {
                table.ajax.reload();
                submit_response(form, data, 'categorias/add');
            }
        });
        return false;
    });
});