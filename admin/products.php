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
                $user_list = getAllProducts();
                ?>
                <h2 style="color: #fff;">Products List</h2>
                <p style="color: #fff;" class="pull-right"><a href="#" title="Add Products" data-toggle="modal" data-target="#productsAddModal">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                </p>            
                <table class="table table-striped">
                    <thead>
                        <tr style="color: #fff;">
                            <th>SL No.</th>
                            <th>ID</th>
                            <th>Image Path</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Availability</th>
                            <th>Product Details</th>
                            <th>Add to Cart</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sl = 1;
                        if (isset($user_list['status']) && $user_list['status'] == true) {
                            foreach ($user_list['data'] as $user) {
                                ?>
                                <tr style="color: #fff; background: #353a40; text-align: center;">
                                    <td style="border: 2px solid #fff;" class="col-md-1"><?php echo $sl; ?></td>
                                    <td style="border: 2px solid #fff;" class="col-md-1"><?php echo "<span style='color:#36dada;'>$user->id</span>"; ?></td>
                                    <td style="border: 2px solid #fff;" class="col-md-1"><?php echo "<span style='color:#e081ff;'>$user->images</span>"; ?></td>
                                    <td style="border: 2px solid #fff;" class="col-md-1"><?php echo "<span style='color:#d3df97;'>$user->titles</span>"; ?></td>
                                    <td style="border: 2px solid #fff;" class="col-md-1"><?php echo "<span style='color:#d3df97;'>$user->categories</span>"; ?></td>
                                    <td style="border: 2px solid #fff;" class="col-md-1"><?php echo "<span style='color:#d3df97;'>$$user->prices</span>"; ?></td>
                                    <td style="border: 2px solid #fff;" class="col-md-1">
                                        <?php
                                        switch ($user->availabilities) {
                                            case 1:
                                                echo"<span style='color:#ff6565;'>In Stock</span>";
                                                break;
                                            case 2:
                                                echo"<span style='color:green;'>Not In Stock</span>";
                                                break;
                                            default :
                                                echo"User Type Not Found";
                                                break;
                                        }
                                        ?>
                                    </td>
                                    <td style="border: 2px solid #fff;" class="col-md-3"><?php echo "<span style='color:#d3df97;'>$user->productsDetailes</span>"; ?></td>
                                    <td style="border: 2px solid #fff;" class="col-md-1">
                                        <?php
                                        switch ($user->addToCart) {
                                            case 1:
                                                echo"<span style='color:#ffc800;'>Active</span>";
                                                break;
                                            case 2:
                                                echo"<span style='color:#b3ae9b;'>In-Active</span>";
                                                break;
                                            default :
                                                echo"Status Not Found";
                                                break;
                                        }
                                        ?>
                                    </td>
                                    <td style="border: 2px solid #fff;" class="col-md-1">
                                        <a href="#" title="Details" onclick="showUserDetails(<?php echo $user->id; ?>);">
                                            <span class="glyphicon glyphicon-list" style="margin: 4px;"></span>
                                        </a>
                                        <a href="#" title="Edit" onclick="showUserEditForm(<?php echo $user->id; ?>);">
                                            <span class="glyphicon glyphicon-pencil" style="margin: 4px;"></span>
                                        </a>
                                        <a href="#" title="Delete" onclick="showDeleteConfirm(<?php echo $user->id; ?>, 'products');">
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
                                <td colspan="10">Data Not Found</td>
                            </tr>           
                        <?php } ?>
                    </tbody>
                </table>

            </div>
            <div class="col-lg-12 col-xs-12 col-md-12">
                <button class="pull-right btn btn-danger btn-lg" title="Clear All Entries" onclick="showDeleteAllConfirm('products');">Clear All</button>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include "modal_details_form.php";
include "modal_delete_form.php";
include "modal_products_add_form.php";
include "modal_user_edit_form.php";
include "modal_all_delete_form.php";
include "footer.php";
?>