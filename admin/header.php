<?php
include 'function/function.php';
if (!isset($_SESSION['login']['logged_status']) && $_SESSION['login']['logged_status'] != true) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo $_SESSION['login']['logged_full_name']; ?> | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css"> 
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <style>
            th{
                text-align: center;
            }
            .bg{
                background: #c4bfbf;
                width: 270px;
            }
            p{
                margin-top: 7px;
                display: inline-block;
            }
            h5{
                margin-bottom: 30px;
            }
            .myModal{
                position: fixed;
                left: 0;
                right: 0;
                top: 30%;
                bottom: 0;
                margin: auto;
                display: table;
                width: 360px;
                height: 180px;
                text-align: center;
            }
            .wh{
                width: 240px;
                margin-left: 56px;
                margin-top: 15px;
                height: 48px;

            }
            .myModal > .modal-content{
                display: table-cell;
            }
        </style>
    </head>
    <body class="hold-transition skin-blue sidebar-mini" style="background-color:#080b0f;height: 100%;">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="dashboard.php" class="logo" style="background-color: #323232;">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>S</b>HR</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><p style="font-size:14px;">Dashboard-</p><?php echo $_SESSION['login']['logged_full_name']; ?></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" style="background: #2a2f32;">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="dist/img/shr01.jpg" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?php echo $_SESSION['login']['logged_full_name']; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="dist/img/shr01.jpg" class="img-circle" alt="User Image"><br>

                                        <p>
                                            <span>User Roll:</span> <?php echo getTypeNameByTypeId($_SESSION['login']['user_type']); ?>
                                            <small>Logged Time :<?php echo date("Y-m-d h:i:s"); ?></small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body hidden">
                                        <div class="row">
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Followers</a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Sales</a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Friends</a>
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left hidden">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="function/function.php?logout=1" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li class="hidden">
                                <a href="#" data-toggle=""><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>