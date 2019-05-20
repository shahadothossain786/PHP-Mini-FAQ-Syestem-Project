<!-- Modal -->
<form class="form-horizontal" role="form" action="" id="qa_add_form">
    <div id="qaAddModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">QuestionAnswer Add Form</h4>
                    <!-- Hidden alert content -->
                    <div class="alert alert-danger" id="add_error_section" style="display: none;">
                        <strong><span id="add_error_message_show"></span></strong>
                    </div>
                    <div class="alert alert-success" id="add_success_section" style="display: none;">
                        <strong><span id="add_success_message_show"></span></strong>
                    </div>
                </div>
                <div class="modal-body">
                    <h5>Admin Panel QA Add</h5>
                    <div class="form-group">
                        <label for="sel1" class="control-label col-sm-2">Category:</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="category">
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
                            <input type="text" class="form-control" id="question" placeholder="Enter Question Here" name="question">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="answer">Answer:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="5" name="answer" id="answer" placeholder="Type Your Question Answer..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-default btn-success" onclick="qaOperation('add');">Save</button>
                </div>
            </div>
        </div>
        <input type="hidden" name="operation_type" value="qa_add">

    </div>
</div>
</div>
</form>