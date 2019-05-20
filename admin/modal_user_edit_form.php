<!-- Modal -->
<form class="form-horizontal" role="form" action="" id="user_edit_form">
    <div id="userEditModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">User Edit Form</h4>
                    <!-- Hidden alert content -->
                    <div class="alert alert-danger" id="edit_error_section" style="display: none;">
                        <strong><span id="edit_error_message_show"></span></strong>
                    </div>
                    <div class="alert alert-success" id="edit_success_section" style="display: none;">
                        <strong><span id="edit_success_message_show"></span></strong>
                    </div>
                </div>
                <div class="modal-body">
                    <h5>Admin Panel Users Edit Form</h5>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="full_name">Full Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="edit_full_name" placeholder="Enter full name" name="full_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="edit_email" placeholder="Enter email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Password:</label>
                        <div class="col-sm-10">          
                            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sel1" class="control-label col-sm-2">User Type:</label>
                        <div class="col-sm-10"> 
                            <select class="form-control" id="edit_type" name="type">
                                <option value="">Select Type..</option>
                                <option value="1">Super Admin</option>
                                <option value="2">User</option>
                                <option value="3">Client</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Status:</label>
                        <div class="col-sm-10"> 
                            <label class="radio-inline">
                                <input type="radio" name="status" id="status_1" value="1" checked="">Active
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="status" id="status_2" value="2">Inactive
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-default btn-success" onclick="userOperation('update');">Update</button>
                    </div>
                </div>
            </div>
            <input type="hidden" name="user_edit_id" id="user_edit_id">
            <input type="hidden" name="operation_type" value="user_edit">

        </div>
    </div>
</div>
</form>