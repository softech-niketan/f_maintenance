<?php

if (!$this->session->userdata('login_check')) {

  redirect('login');
}

// echo $this->session->userdata('email');
?>

<style>
  p {
    text-transform: capitalize
  }
</style>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Assets Management</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('') ?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('') ?>/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('') ?>/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('') ?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('') ?>/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('') ?>/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="<?php echo base_url('') ?>/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url('') ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url('') ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('') ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url('') ?>plugins/jqvmap/jqvmap.min.css">


  <link rel="stylesheet" href="<?php echo base_url('') ?>plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url('') ?>plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">


  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('') ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('') ?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url('') ?>plugins/summernote/summernote-bs4.min.css">

  <link rel="stylesheet" href="<?php echo base_url('') ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo base_url('index'); ?>" class="nav-link">Home <?php echo $user_role = trim($this->session->userdata('user_role')); ?></a>
        </li>
        <?php
        if ($user_role == "admin") {
        ?>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="https://softechsolutions.in/new_asset/dashboard.php?login=asd79123574031812394" class="btn btn-danger">Go Dashboard</a>
          </li>
        <?php
        }

        ?>
        <li class="nav-item d-none d-sm-inline-block">
        </li>
      </ul>


      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->

        <!-- Notifications Dropdown Menu -->

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?php echo base_url('index') ?>" class="brand-link">
        <img src="<?php echo base_url('') ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Assets Management</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo base_url('') ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <h6 class="text-secondary"> <?php echo $this->session->userdata('user_email'); ?></h6>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?php echo base_url('index') ?>" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
              <a href="<?php echo base_url('main_page') ?>" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Main Page
                </p>
              </a>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Charts
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <!-- <li class="nav-item">
                  <a href="<?php echo base_url('instruments') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Instruments</p>
                  </a>
                </li> -->
                <li class="nav-item">
                  <a href="<?php echo base_url('chart_bd_occrance') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>BREAKDOWN OCCURRENCE</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?php echo base_url('chart_bd_hourse') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>BREAKDOWN HOURS</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('chart_bd_cost') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>BD COST</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('chart_pm_cost') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>PM COST</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('chart_improvement_cost') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>IMPROVEMENT COST</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('chart_mttr') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>MTTR</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('chart_mtbf') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>MTBF</p>
                  </a>
                </li>

              </ul>
            </li>


            <?php
            if ($user_role == "admin" || $user_role == "machine_shop_maintenance_admin" ||  $user_role == "maintenance_user") {
            ?>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-table"></i>
                  <p>
                    Asset Management
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <!-- <li class="nav-item">
                  <a href="<?php echo base_url('instruments') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Instruments</p>
                  </a>
                </li> -->
                  <li class="nav-item">
                    <a href="<?php echo base_url('check_list_groups') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Machine Groups</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="<?php echo base_url('machines') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Machine</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url('erp_users') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Users</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url('dashboard_master') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Dashboard Master</p>
                    </a>
                  </li>

                </ul>
              </li>
            <?php

            }

            ?>


            <!-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p>
                  Maintaince master
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('pm_request') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>PM type</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('pm_check_list') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>ADD PM check list</p>
                  </a>
                </li>

              </ul>
            </li> -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p>
                  Spare Management
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <?php
                if ($user_role == "admin" || $user_role == "stores_user") {
                ?>
                  <li class="nav-item">
                    <a href="<?php echo base_url('item_master') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Item Master</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo base_url('spare_grn') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>GRN Details</p>
                    </a>
                  </li>
                <?php
                }
                ?>
                <li class="nav-item">
                  <a href="<?php echo base_url('spare_store') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Spare store </p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?php echo base_url('store_pending_request') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pending Request </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('store_complete_request') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Completed Request </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('spare_store_min') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Safety Stock Alert </p>
                  </a>
                </li>

                <!-- <li class="nav-item">
                  <a href="<?php echo base_url('predictive_request') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Predictive Request</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('#') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Breakdown Request</p>
                  </a>
                </li> -->

              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p>
                  PM Requests
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('pending/pm_request') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pending</p>
                  </a>
                </li>
                <?php
                if ($user_role != "production_user") {
                ?>
                  <li class="nav-item">
                    <a href="<?php echo base_url('completed/pm_request') ?>" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Complete</p>
                    </a>
                  </li>
                <?php
                }

                ?>
                <!-- <li class="nav-item">
                  <a href="<?php echo base_url('spare_grn') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Rejected</p>
                  </a>
                </li> -->

              </ul>
            </li>
            <!-- <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p>
                  Predictive Requests
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('pending/predictive_request') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pending</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('completed/predictive_request') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Complete</p>
                  </a>
                </li>
               
              </ul>
            </li> -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p>
                  Breakdown Requests
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('breakdown_pending') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pending</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('breakdown_complete') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Complete</p>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a href="<?php echo base_url('spare_grn') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Rejected</p>
                  </a>
                </li> -->

              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p>
                  Improvement Work
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo base_url('i_work_request_pending') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pending</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('i_work_request_completed') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Complete</p>
                  </a>
                </li>
                <!-- <li class="nav-item">
                  <a href="<?php echo base_url('spare_grn') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Rejected</p>
                  </a>
                </li> -->

              </ul>
            </li>
            <li class="nav-item" style="text-transform: capitalize;">
              <a href="#" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p>
                  Reports
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview" style="text-transform: capitalize;">
                <li class="nav-item">
                  <a href="<?php echo base_url('asset_master') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Asset Masters</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('annual_preventive') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>ANNUAL PM</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('monthly_preventive') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>MONTHLY PM</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('preventive_performance') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>PM PERFORMANCE </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('breakdown_register') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>BREAKDOWN REGISTER </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('break_down_day_wise') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>BREAKDOWN DAY WISE </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('break_down_month_wise') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p> BREAKDOWN MONTH WISE </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('breakdown_time_lost') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>TIME LOST DAY </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('breakdown_time_lost_month') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>TIME LOST Month </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('machine_history') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>MACHINE HISTORY CARD </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('mtbf') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>MTBF </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('mttr') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>MTTR</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('why_why') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Why Why Analysis</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo base_url('why_why_view') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>View Why Why Analysis</p>
                  </a>
                </li>

                <!-- <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Complete</p>
                  </a>
                </li> -->
                <!-- <li class="nav-item">
                  <a href="<?php echo base_url('spare_grn') ?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Rejected</p>
                  </a>
                </li> -->

              </ul>
            </li>
            <!-- <li class="nav-item">
            <a href="<?php echo base_url('main_page') ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Maintenance </p>
            </a>
          </li> -->
            <li class="nav-item ">
              <a href="<?php echo base_url('logout') ?>" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Logout
                  <!-- <i class="right fas fa-angle-left"></i> -->
                </p>
              </a>
              <!-- <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul> -->
            </li>
            <!--
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/examples/invoice.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/profile.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/e-commerce.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>E-commerce</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/projects.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Projects</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-add.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-edit.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Edit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/project-detail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Project Detail</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/contacts.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contacts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/faq.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>FAQ</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/contact-us.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact us</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Extras
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Login & Register v1
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="pages/examples/login.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Login v1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/register.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Register v1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/forgot-password.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Forgot Password v1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/recover-password.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Recover Password v1</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Login & Register v2
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="pages/examples/login-v2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Login v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/register-v2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Register v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/forgot-password-v2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Forgot Password v2</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/examples/recover-password-v2.html" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Recover Password v2</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="pages/examples/lockscreen.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lockscreen</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Legacy User Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/language-menu.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Language Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/404.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 404</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/500.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Error 500</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/pace.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pace</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/examples/blank.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blank Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="starter.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Starter Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-search"></i>
              <p>
                Search
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/search/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Search</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/search/enhanced.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Enhanced</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a href="iframe.html" class="nav-link">
              <i class="nav-icon fas fa-ellipsis-h"></i>
              <p>Tabbed IFrame Plugin</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="https://adminlte.io/docs/3.1/" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Documentation</p>
            </a>
          </li>
          <li class="nav-header">MULTI LEVEL EXAMPLE</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Level 1
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Level 2
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li> -->
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>