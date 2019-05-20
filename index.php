<?php include 'header.php'; ?>

<div class="row">
    <div class="col-md-8">
        <h2 style="color:#cccccc;">Popular Questions <span id="categoryNameShow"></span></h2>
        <div class="accordion-container" id="accdr">
            <?php
            $qa_list = getAllqa();
            if (isset($qa_list['status']) && $qa_list['status'] == true) {
                foreach ($qa_list['data'] as $qa) {
                    ?>
                    <div class="accordion"><?php echo $qa->questions; ?></div>
                    <div class="texto"><?php echo $qa->answers; ?></div>
                <?php
                }
            }
            ?>
        </div>
    </div>
    <div class="col-md-4">
        <h2 class="demoHeaders" style="color:#cccccc;">Search Topics</h2>
        <form class="form-inline" id="any_search_form" method="post">
            <div class="form-group">
                <input type="text" name="search_key" class="form-control" id="search_key">
            </div>
            <input type="hidden" name="any_search" value="1">
            <button type="button" class="btn btn-default" onclick="searchQuestions();">Search</button>
        </form>
        <h2  style="color:#cccccc;">Categories</h2>
        <div class="form-group">
            <select class="form-control" name="category" id="category" onchange="getCategoryWiseQa(this.value,this.text);">
                <option value="" id="selectAllCat" onclick="window.location.reload();">Select A Category..</option>
                <?php
                $categories = getAllCategories();
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
</div>

<?php include 'footer.php'; ?>
    