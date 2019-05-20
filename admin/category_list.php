<?php
include "header.php";
include "left_menu.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="background-color: #20242a;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="color: #fff;">
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-12 col-xs-12 col-md-12">
                <?php
                //try to get all users
                $cat_list = getAllCategories();
                ?>
                <h2 style="color: #fff;">Category List</h2>
                <p style="color: #fff;" class="pull-right"><a href="#" title="Add Category User" data-toggle="modal" data-target="#CategoryAddModal">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                </p>            
                <table class="table table-striped">
                    <thead>
                        <tr style="color: #fff;">
                            <th>SL No.</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sl = 1;
                        if (isset($cat_list['status']) && $cat_list['status'] == true) {
                            foreach ($cat_list['data'] as $cat) {
                                ?>
                                <tr style="color: #fff; background: #353a40; text-align: center;">
                                    <td style="border: 2px solid #fff;"><?php echo $sl; ?></td>
                                    <td style="border: 2px solid #fff;"><?php echo "<span style='color:#36dada;'>$cat->id</span>"; ?></td>
                                    <td style="border: 2px solid #fff;"><?php echo "<span style='color:#e081ff;'>$cat->name</span>"; ?></td>
                                    <td style="border: 2px solid #fff;">
                                        <a href="#" title="Details" onclick="showCategoryDetails(<?php echo $cat->id; ?>);">
                                            <span class="glyphicon glyphicon-list" style="margin: 4px;"></span>
                                        </a>
                                        <a href="#" title="Edit" onclick="showCategoryEditForm(<?php echo $cat->id; ?>);">
                                            <span class="glyphicon glyphicon-pencil" style="margin: 4px;"></span>
                                        </a>
                                        <a href="#" title="Delete" onclick="showDeleteConfirm(<?php echo $cat->id; ?>, 'categories');">
                                            <span class="glyphicon glyphicon-remove" style="margin: 4px;"></span>
                                        </a> 
                                    </td>
                                </tr>
                                <?php
                                $sl++;
                            }//end of foreach loop
                        } else {//end if
                            ?>
                            <tr style="text-align: center; color: #cc0000;">
                                <td colspan="4">Data Not Found</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>           
            <div class="col-lg-12 col-xs-12 col-md-12">
                <button class="pull-right btn btn-danger btn-lg" title="Clear All Entries" onclick="showDeleteAllConfirm('categories');">Clear All</button>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include "modal_user_category_form.php";
include "modal_category_edit_form.php";
include "modal_category_details_form.php";
include "modal_delete_form.php";
include "modal_all_delete_form.php";
include "footer.php";
?>