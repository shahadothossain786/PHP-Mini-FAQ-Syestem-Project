<!-- Modal -->
<form class="form-horizontal" role="form" action="" id="category_add_form">
    <div id="CategoryAddModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Category Add Form</h4>
                    <!-- Hidden alert content -->
                    <div class="alert alert-danger" id="add_error_section" style="display: none;">
                        <strong><span id="add_error_message_show"></span></strong>
                    </div>
                    <div class="alert alert-success" id="add_success_section" style="display: none;">
                        <strong><span id="add_success_message_show"></span></strong>
                    </div>
                </div>
                <div class="modal-body">
                    <h5>Admin Panel Users Add</h5>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="name">Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" placeholder="Enter Category name" name="name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-default btn-success" onclick="categoryOperation('add');">Save</button>
                    </div>
                </div>
            </div>
            <input type="hidden" name="operation_type" value="category_add">

        </div>
    </div>
</div>
</form>