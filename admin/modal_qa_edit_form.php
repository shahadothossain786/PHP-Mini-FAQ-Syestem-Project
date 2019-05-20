<!-- Modal -->
<form class="form-horizontal" role="form" action="" id="qa_edit_form">
    <div id="qaEditModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">QuestionAnswer Edit Form</h4>
                    <!-- Hidden alert content -->
                    <div class="alert alert-danger" id="edit_error_section" style="display: none;">
                        <strong><span id="edit_error_message_show"></span></strong>
                    </div>
                    <div class="alert alert-success" id="edit_success_section" style="display: none;">
                        <strong><span id="edit_success_message_show"></span></strong>
                    </div>
                </div>
                <div class="modal-body">
                    <h5>Admin Panel QA Edit </h5>
                    <div class="form-group">
                        <label for="sel1" class="control-label col-sm-2">Category:</label>
                        <div class="col-sm-10"> 
                            <select class="form-control" name="category" id="edit_category">
                                <option value="">Select A Category..</option>
                                <?php
                                if (isset($categories) && !empty($categories)) {
                                    foreach ($categories ['data'] as $cat) {
                                        ?>
                                        <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="question">Question:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="edit_questions" placeholder="Enter Question Here" name="questions">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="answer">Answer:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="5" name="answers" id="edit_answers" placeholder="Type Your Question Answer..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-default btn-success" onclick="qaOperation('update');">Update</button>
                </div>
            </div>
            <input type="hidden" name="qa_edit_id" id="qa_edit_id">
            <input type="hidden" name="operation_type" value="qa_edit">
        </div>
    </div>
</div>
</form>