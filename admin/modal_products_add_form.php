<!-- Modal -->
<form class="form-horizontal" role="form" action="" id="products_add_form" enctype="multipart/form-data">
    <div id="productsAddModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Products Add Form</h4>
                    <!-- Hidden alert content -->
                    <div class="alert alert-danger" id="add_error_section" style="display: none;">
                        <strong><span id="add_error_message_show"></span></strong>
                    </div>
                    <div class="alert alert-success" id="add_success_section" style="display: none;">
                        <strong><span id="add_success_message_show"></span></strong>
                    </div>
                </div>
                <div class="modal-body">
                    <h5>Admin Panel Products Add</h5>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="images">Product Image</label>
                        <div class="col-sm-10">
                            <input style="border: 0px;" type="file" class="form-control" id="images" name="images">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="title">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" placeholder="Enter Product Title" name="titles">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="title">Categories</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="categories" placeholder="Enter Product Categories" name="categories">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="price">Price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="price" placeholder="Enter Product Price" name="prices">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sel1" class="control-label col-sm-2">Availability:</label>
                        <div class="col-sm-10"> 
                            <select class="form-control" name="availabilities">
                                <option value="">Select Type..</option>
                                <option value="1">In Stock</option>
                                <option value="2">Not In Stock</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="answer">Products Details</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="5" name="productsDetailes" id="pdetails" placeholder="Enter Product Details"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">AddToCart:</label>
                        <div class="col-sm-10"> 
                            <label class="radio-inline">
                                <input type="radio" name="addToCart" value="1" checked="">Active
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="addToCart" value="2">Inactive
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-default btn-success" onclick="productsOperation('add');">Save</button>
                    </div>
                </div>
            </div>
            <input type="hidden" name="operation_type" value="products_add">

        </div>
    </div>
</div>
</form>