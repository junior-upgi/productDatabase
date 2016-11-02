<div class="modal fade" id="DetailModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="detailTitle"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 col-xs-6">
                        <img id="photoShow" class="img-responsive img-thumbnail" src="">
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <img id="printShow" class="img-responsive img-thumbnail" src="">
                    </div>
                </div>
                <p>
                    <div class="table-responsive">
                        <table class="table table-bordered table-condensed">
                            <tbody>
                                <tr>
                                    <td class="col-md-2 col-xs-3">產品代號</td>
                                    <td><span id="referenceNumber"></span></td>
                                </tr>
                                <tr>
                                    <td>別號</td>
                                    <td><span id="alias"></span></td>
                                </tr>
                                <tr>
                                    <td>描述</td>
                                    <td><span id="description"></span></td>
                                </tr>
                                <tr>
                                    <td>材質</td>
                                    <td><span id="material"></span></td>
                                </tr>
                                <tr>
                                    <td>weight</td>
                                    <td><span id="weight"></span></td>
                                </tr>
                                <tr>
                                    <td>cavity</td>
                                    <td><span id="cavity"></span></td>
                                </tr>
                                <tr>
                                    <td>cycle time</td>
                                    <td><span id="cycleTime"></span></td>
                                </tr>
                                <tr>
                                    <td>unit cost</td>
                                    <td><span id="unitCost"></span></td>
                                </tr>
                            </tbody>
                        </table>                
                    </div>
                </p>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->