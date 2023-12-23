<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>DN Agency</title>
  <!-- base:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

</head>

<body>
  <div class="container-scroller d-flex" >
    <!-- partial:./partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php">
            <i class="mdi mdi-view-quilt menu-icon"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="mdi mdi-basket menu-icon"></i>
            <span class="menu-title">All Orders</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="add_new_order.php">Add Order</a></li>
              <li class="nav-item"> <a class="nav-link" href="all_order.php">All Orders</a></li>
              <li class="nav-item"> <a class="nav-link" href="all_complete_order.php">Completed Orders</a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-Category" aria-expanded="false" aria-controls="ui-Category">
            <i class="mdi mdi-basket menu-icon"></i>
            <span class="menu-title">All Category</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-Category">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="category.php">Add Category</a></li>
              <li class="nav-item"> <a class="nav-link" href="all_category.php">All Category</a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-products" aria-expanded="false" aria-controls="ui-products">
            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            <span class="menu-title">All Products</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-products">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="product.php">Add Product</a></li>
              <li class="nav-item"> <a class="nav-link" href="all_product.php">All Products</a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-users" aria-expanded="false" aria-controls="ui-users">
            <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            <span class="menu-title">All Customers</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-users">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="add_user.php">Add Customer</a></li>
              <li class="nav-item"> <a class="nav-link" href="all_user.php">All Customers</a></li>
            </ul>
          </div>
        </li>

      </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:./partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 px-200 py-200 py-lg-4 d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
         
          <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1" >DN Agency, <?= ($_SESSION['name']) ? $_SESSION['name'] : 'User' ;?></h4>
          <ul class="navbar-nav navbar-nav-right">
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
            <li class="nav-item">
            <a class="btn btn-danger" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log Out</span>
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <!-- partial -->