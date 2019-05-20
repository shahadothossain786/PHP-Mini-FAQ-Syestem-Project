<!-- Modal -->
<form class="form-horizontal" role="form" action="" id="category_edit_form">
    <div id="categoryEditModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Category Edit Form</h4>
                    <!-- Hidden alert content -->
                    <div class="alert alert-danger" id="edit_error_section" style="display: none;">
                        <strong><span id="edit_error_message_show"></span></strong>
                    </div>
                    <div class="alert alert-success" id="edit_success_section" style="display: none;">
                        <strong><span id="edit_success_message_show"></span></strong>
                    </div>
                </div>
                <div class="modal-body">
                    <h5>Admin Panel Category Edit Form</h5>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="edit_name" placeholder="Enter Category name" name="name">
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-default btn-success" onclick="categoryOperation('update');">Update</button>
                    </div>
                </div>
            </div>
            <input type="hidden" name="category_edit_id" id="category_edit_id">
            <input type="hidden" name="operation_type" value="category_edit">

        </div>
    </div>
</div>
</form>