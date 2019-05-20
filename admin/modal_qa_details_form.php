<!-- Modal -->
<form class="form-horizontal" role="form" action="" id="qa_details_form">
    <div id="qaDetailsModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">QA Details Form</h4>
                </div>
                <div class="modal-body">
                    <h5>Admin Panel QA Details</h5>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="category_name">Category:</label>
                        <div class="col-sm-10 bg">
                            <p id="details_category_id" name="category_id"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="questions">Questions:</label>
                        <div class="col-sm-10 bg">
                            <p id="details_questions" name="questions"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="answers">Answers:</label>
                        <div class="col-sm-10 bg">          
                            <p id="details_answers" name="answers"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            <input type="hidden" name="qa_details_id" id="qa_details_id">
        </div>
    </div>
</div>
</form>