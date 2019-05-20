<aside class="main-sidebar" style="background-color: #111111;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
            <img src="dist/img/shr01.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['login']['logged_full_name'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="users_list.php"><i class="fa fa-circle-o text-blue"></i> <span>Users</span></a></li>
        <li><a href="category_list.php"><i class="fa fa-circle-o text-red"></i> <span>Categories</span></a></li>
        <li><a href="products.php"><i class="fa fa-circle-o text-red"></i> <span>Products</span></a></li>
        <li><a href="qa_list.php"><i class="fa fa-circle-o text-yellow"></i> <span>QuestionAnswer</span></a></li>
        <li><a href="history_list.php"><i class="fa fa-circle-o text-aqua"></i> <span>History</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->