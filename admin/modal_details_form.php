<!-- Modal -->
<form class="form-horizontal" role="form" action="" id="user_details_form">
    <div id="userDetailsModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">User Details Form</h4>
                </div>
                <div class="modal-body">
                    <h5>Admin Panel Users Details</h5>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="full_name">Full Name:</label>
                        <div class="col-sm-10 bg">
                            <p id="details_full_name" name="full_name"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10 bg">
                            <p id="details_email" name="email"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Password:</label>
                        <div class="col-sm-10 bg">          
                            <p id="details_pwd" name="password"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sel1" class="control-label col-sm-2">User Type:</label>
                        <div class="col-sm-10 bg"> 
                            <p id="deatails_type" name="type"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Status:</label>
                        <div class="col-sm-10 bg"> 
                            <p name="status" id="details_status"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            <input type="hidden" name="user_details_id" id="user_details_id">
        </div>
    </div>
</div>
</form>