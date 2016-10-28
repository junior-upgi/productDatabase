<div class="modal fade" id="AddModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="modalTitle"></h4>
            </div>
            <form id="AddForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
                    <input type="hidden" id="type" name="type" value="">
                    <input type="hidden" id="ind" name="ind" value="">
                    <input type="hidden" id="fileSet" name="fileSet" value="">
                    <div class="form-group">
                        <label for="referenceNumber" class="col-md-4 control-label">產品代號</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="referenceNumber" name="referenceNumber" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alias" class="col-md-4 control-label">別號</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="alias" name="alias" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-md-4 control-label">描述</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="description" name="description" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="material" class="col-md-4 control-label">材質</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="material" name="material" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="weight" class="col-md-4 control-label">weight</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="weight" name="weight" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cavity" class="col-md-4 control-label">cavity</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="cavity" name="cavity" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cycleTime" class="col-md-4 control-label">cycleTime</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="cycleTime" name="cycleTime" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="unitCost" class="col-md-4 control-label">unitCost</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="unitCost" name="unitCost" value="" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">照片</label>
                        <div class="col-md-6">
                            <div id="photoDiv">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">圖面</label>
                        <div class="col-md-6">
                            <div id="printDiv"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
                    <button type="submit" class="btn btn-primary" data-loading-text="資料送出中..." autocomplete="off" 
                        id="btnSave">Save</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->