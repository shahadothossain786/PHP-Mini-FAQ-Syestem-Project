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
                $user_list = getAllUsers();
                ?>
                <h2 style="color: #fff;">User List</h2>
                <p style="color: #fff;" class="pull-right"><a href="#" title="Add User" data-toggle="modal" data-target="#userAddModal">
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                </p>            
                <table class="table table-striped">
                    <thead>
                        <tr style="color: #fff;">
                            <th>SL No.</th>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>User Type</th>
                            <th>Status</th>
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
                                    <td style="border: 2px solid #fff;"><?php echo $sl; ?></td>
                                    <td style="border: 2px solid #fff;"><?php echo "<span style='color:#36dada;'>$user->id</span>"; ?></td>
                                    <td style="border: 2px solid #fff;"><?php echo "<span style='color:#e081ff;'>$user->full_name</span>"; ?></td>
                                    <td style="border: 2px solid #fff;"><?php echo "<span style='color:#d3df97;'>$user->email</span>"; ?></td>
                                    <td style="border: 2px solid #fff;">
                                        <?php
                                        switch ($user->type) {
                                            case 1:
                                                echo"<span style='color:#ff6565;'>Super Admin</span>";
                                                break;
                                            case 2:
                                                echo"<span style='color:green;'>User</span>";
                                                break;
                                            case 3:
                                                echo"<span style='color:#6cff2e;'>Client</span>";
                                                break;
                                            default :
                                                echo"User Type Not Found";
                                                break;
                                        }
                                        ?>
                                    </td>
                                    <td style="border: 2px solid #fff;">
                                        <?php
                                        switch ($user->is_active) {
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
                                    <td style="border: 2px solid #fff;">
                                        <a href="#" title="Details" onclick="showUserDetails(<?php echo $user->id; ?>);">
                                            <span class="glyphicon glyphicon-list" style="margin: 4px;"></span>
                                        </a>
                                        <a href="#" title="Edit" onclick="showUserEditForm(<?php echo $user->id; ?>);">
                                            <span class="glyphicon glyphicon-pencil" style="margin: 4px;"></span>
                                        </a>
                                        <a href="#" title="Delete" onclick="showDeleteConfirm(<?php echo $user->id; ?>, 'users');">
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
                                <td colspan="7">Data Not Found</td>
                            </tr>           
                        <?php } ?>
                    </tbody>
                </table>

            </div>
            <div class="col-lg-12 col-xs-12 col-md-12">
                <button class="pull-right btn btn-danger btn-lg" title="Clear All Entries" onclick="showDeleteAllConfirm('users');">Clear All</button>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include "modal_details_form.php";
include "modal_delete_form.php";
include "modal_user_add_form.php";
include "modal_user_edit_form.php";
include "modal_all_delete_form.php";
include "footer.php";
?>