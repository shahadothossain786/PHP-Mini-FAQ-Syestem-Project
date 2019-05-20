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
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?php echo getTotalEntry('users'); ?></h3>

              <p>Users</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
              <a href="users_list.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo getTotalEntry('categories'); ?></h3>

              <p>Categories</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
              <a href="category_list.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo getTotalEntry('products'); ?></h3>

              <p>Products</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
              <a href="products.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo getTotalEntry('question_answers'); ?></h3>

              <p>Questions Answer</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
              <a href="qa_list.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo getTotalEntry('histories'); ?></h3>

              <p>History</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
              <a href="history_list.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php 
    include "footer.php";
?>