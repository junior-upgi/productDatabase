$(function () {
    $("#AddForm").ajaxForm({
        url: url + '/plasticSave',
        beforeSubmit: function () {
            //$('#btnSave').button('loading');
        },
        success: function (obj) {
            if (obj.success) {
                $('#AddModal').modal('hide');
                swal({
                    title: "儲存成功!",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "OK",
                    closeOnConfirm: false
                },
                function () {
                    $("#searchForm").submit();
                });
            } else {
                swal("儲存敗!", obj.msg, "error");
                $('#btnSave').button('reset');
            }
        },
        error: function (xhr) {
            swal("發生異常錯誤!", xhr.statusText, "error");
            $('#BtnAdd').button('reset');
        }
    });
    $("#aaa tr").hover(
        function(){
            var picURL = picURL = url + '/storage/';
            var photo = $(this).children('td').children('#photoLocation').val();
            if (photo != '') {
                $('#photo').attr('src', picURL + photo);
            }
            var print = $(this).children('td').children('#printLocation').val();
            if (print != '') {
                $('#print').attr('src', picURL + print);
            }
        }
    );
});

function doAdd(json) {
    if (json == '') {
        $('#modalTitle').html('新增產品資料');
        $('#btnSave').html('新增');
        $('#type').val('add');
        $('#ind').val('');
        $('#fileSet').val('false');
        $('#referenceNumber').val('');
        $('#alias').val('');
        $('#description').val('');
        $('#material').val('');
        $('#weight').val('');
        $('#cavity').val('');
        $('#cycleTime').val('');
        $('#unitCost').val('');
        fileSet('photo', null);
        fileSet('print', null);
    } else {
        json = JSON.parse(json);
        $('#modalTitle').html('編輯產品資料');
        $('#btnSave').html('更新');
        $('#type').val('edit');
        $('#ind').val(json['ind']);
        $('#referenceNumber').val(json['referenceNumber']);
        $('#alias').val(json['alias']);
        $('#description').val(json['description']);
        $('#material').val(json['material']);
        $('#weight').val(json['weight']);
        $('#cavity').val(json['cavity']);
        $('#cycleTime').val(json['cycleTime']);
        $('#unitCost').val(json['unitCost']);
        fileSet('photo', json['photoLocation']);
        fileSet('print', json['printLocation']);
    }
    $('#AddModal').modal('show');
}

function doDelete(ind) {
    swal({
        title: "刪除資料?",
        text: "此動作將會刪除資料!",
        type: "warning",
        showCancelButton: true,
        cancelButtonText: '取消',
        confirmButtonClass: "btn-danger",
        confirmButtonText: "刪除",
        closeOnConfirm: false
    },
    function(){
        var data = {'ind': ind};
        $.ajax({
            url: url + '/plasticDelete',
            type: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: JSON.stringify(data),
            dataType: 'JSON',
            error: function (xhr) {
                swal("刪除失敗!", xhr.statusText, "error");
            },
            success: function (result) {
                if (result.success) {
                swal({
                    title: "刪除資料成功!",
                    text: result.msg,
                    type: "success",
                    showCancelButton: false,
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "OK",
                    closeOnConfirm: false
                },
                function () {
                    $("#searchForm").submit();
                });
            } else {
                swal("刪除資料失敗!", obj.msg, "error");
            }
        }
        })
    });
}

function fileSet(category, src) {
    if (src != null) {
        picURL = url + '/storage/' + src;
        var img = "<img src='" + picURL + "' class='kv-preview-data file-preview-image' style='width:auto;height:160px;'>";
        $('#fileSet').val('true');
    } else {
        var img = null;
    }
    $("#" + category + "Div").empty();
    $("#" + category + "Div").html("<input id='" + category + "' name='" + category + "' type='file' class='file-loading' data-show-upload='false' accept='image/*'>");
    $("#" + category).fileinput({
        language: 'zh-TW',
        previewFileType: "image",
        allowedFileExtensions: ["jpg", "jpeg", "png", "gif"],
        previewClass: "bg-warning",
        browseClass: "btn btn-success",
        browseLabel: "選擇圖片",
        browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i> ",
        removeClass: "btn btn-danger",
        removeLabel: "移除",
        removeIcon: "<i class=\"glyphicon glyphicon-trash\"></i> ",
        fileActionSettings: {
            showZoom: false,
            showDrag: false,
        },
        initialPreview: 
            [img]
    });

    //$("#editPreview").attr("src", img);
}

//action="{{ url('/') }}/plasticSave"