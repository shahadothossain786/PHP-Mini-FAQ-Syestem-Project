
<!-- Modal -->
<form class="form-horizontal" role="form" action="" id="delete_all_form">
    <div id="deleteallconfirmModal" class="modal fade" role="dialog">
        <div class="modal-dialog myModal">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Delete Confirmation</h4>
                </div>
                <!-- Hidden alert content -->
                <div class="alert alert-danger wh" id="delete_all_error_section" style="display: none;">
                    <strong><span id="delete_all_error_message_show"></span></strong>
                </div>
                <div class="alert alert-success wh" id="delete_all_success_section" style="display: none;">
                    <strong><span id="delete_all_success_message_show"></span></strong>
                </div>
                <div class="modal-body">
                    <strong>Are You Sure To Delete All Data?</strong>
                    <input type="hidden" name="table_name_all" id="table_name_all">
                </div>
                <div class="modal-footer" style="text-align: center;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-default btn-success" onclick="executeDeleteAllOperation();">Yes</button>
                </div>
            </div>
        </div>            
    </div>
</form>