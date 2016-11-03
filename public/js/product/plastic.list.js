$(function () {
    $('#AddForm').ajaxForm({
        url: url + '/plastic/save',
        beforeSubmit: function () {
            //$('#btnSave').button('loading');
        },
        success: function (obj) {
            if (obj.success) {
                $('#AddModal').modal('hide');
                swal({
                    title: '儲存成功!',
                    type: 'success',
                    showCancelButton: false,
                    confirmButtonClass: 'btn-success',
                    confirmButtonText: 'OK',
                    closeOnConfirm: false
                },
                function () {
                    $('#searchForm').submit();
                });
            } else {
                swal('儲存失敗!', obj.msg, 'error');
                $('#btnSave').button('reset');
            }
        },
        error: function (xhr) {
            swal('發生異常錯誤!', xhr.statusText, 'error');
            $('#BtnAdd').button('reset');
        }
    });
    
});

function detail(json) {
    json = JSON.parse(json);
    
    //載入圖片
    var picURL = url + '/storage/';
    var photo = json['photoLocation'];
    $('#photoShow').attr('src', '');
    $('#printShow').attr('src', '');
    if (photo != null) {
        $('#photoShow').attr('src', picURL + photo);
    }
    var print = json['printLocation'];
    if (print != null) {
        $('#printShow').attr('src', picURL + print);
    }

    //顯示資訊
    $('#DetailModal #detailTitle').html('[' + json['referenceNumber'] + ']詳細資訊');
    $('#DetailModal #referenceNumber').html(json['referenceNumber']);
    $('#DetailModal #alias').html(json['alias']);
    $('#DetailModal #description').html(json['description']);
    $('#DetailModal #material').html(json['material']);
    $('#DetailModal #weight').html(json['weight']);
    $('#DetailModal #cavity').html(json['cavity']);
    $('#DetailModal #cycleTime').html(json['cycleTime']);
    $('#DetailModal #unitCost').html(json['unitCost']);
    $('#DetailModal').modal('show');
}

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
        title: '刪除資料?',
        text: '此動作將會刪除資料!',
        type: 'warning',
        showCancelButton: true,
        cancelButtonText: '取消',
        confirmButtonClass: 'btn-danger',
        confirmButtonText: '刪除',
        closeOnConfirm: false
    },
    function(){
        var data = {'ind': ind};
        $.ajax({
            url: url + '/plastic/delete',
            type: 'POST',
            headers: { 'X-CSRF-TOKEN': $('meta[name=\'csrf-token\']').attr('content') },
            data: JSON.stringify(data),
            dataType: 'JSON',
            error: function (xhr) {
                swal('刪除失敗!', xhr.statusText, 'error');
            },
            success: function (result) {
                if (result.success) {
                    swal({
                        title: '刪除資料成功!',
                        text: result.msg,
                        type: 'success',
                        showCancelButton: false,
                        confirmButtonClass: 'btn-success',
                        confirmButtonText: 'OK',
                        closeOnConfirm: false
                    },
                    function () {
                        $('#searchForm').submit();
                    });
                } else {
                    swal('刪除資料失敗!', obj.msg, 'error');
                }
            }
        })
    });
}

function fileSet(category, src) {
    if (src != null) {
        picURL = url + '/storage/' + src;
        var img = '<img src=\'' + picURL + '\' class=\'kv-preview-data file-preview-image\' style=\'width:auto;height:160px;\'>';
        $('#' + category + 'Set').val(src);
    } else {
        var img = null;
    }
    $('#' + category + 'Div').empty();
    $('#' + category + 'Div').html('<input id=\'' + category + '\' name=\'' + category + '\' type=\'file\' class=\'file-loading\' data-show-upload=\'false\' accept=\'image/*\'>');
    $('#' + category).fileinput({
        language: 'zh-TW',
        previewFileType: 'image',
        allowedFileExtensions: ['jpg', 'jpeg', 'png', 'gif'],
        previewClass: 'bg-warning',
        browseClass: 'btn btn-success',
        browseLabel: '選擇圖片',
        browseIcon: '<i class=\'glyphicon glyphicon-picture\'></i> ',
        removeClass: 'btn btn-danger',
        removeLabel: '移除',
        removeIcon: '<i class=\'glyphicon glyphicon-trash\'></i> ',
        fileActionSettings: {
            showZoom: false,
            showDrag: false,
        },
        initialPreview: 
            [img]
    });
    $('#photo').on('filebatchselected', function(event) {
        resetAddModal()
    });
    $('#photo').on('filecleared', function(event) {
        resetAddModal()
    });
    $('#print').on('filebatchselected', function(event) {
        resetAddModal()
    });
    $('#print').on('filecleared', function(event) {
        resetAddModal()
    });
    $('#photo').on('fileclear', function(event) {
        $('#photoSet').val('clear');
    });
    $('#print').on('fileclear', function(event) {
        $('#printSet').val('clear');
    });
}
function resetAddModal() {
    var modalHeight = $('#AddModal .modal-dialog').height() + 30;
    if ($('#AddModal').height() > modalHeight) {
        $('#AddModal .modal-backdrop').height($('#AddModal').height());
    } else {
        $('#AddModal .modal-backdrop').height(modalHeight);
    }
    
}
