<?php
session_start();
$email_address= $_SESSION['alogin'];
include("Database/config.php");
if(empty($email_address))
{
  header("location:index.php");
}

include('header.php');
?>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bg-facebook d-flex align-items-center" style="background: url('./assets/images/bbb.jpg');">
                <div class="card-body py-5">
                  <div
                    class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <i class="mdi mdi-basket text-white icon-lg"></i>
                    <div class="ml-3 ml-md-0 ml-xl-3">
                      <?php 
                        $totalStudents = "SELECT ohid FROM order_header ";
                        $totalStudentsResult = mysqli_query($conn, $totalStudents);
                        $rowcount = mysqli_num_rows( $totalStudentsResult );
                      ?>
                      <h5 class="text-white font-weight-bold"><?= $rowcount; ?></h5>
                      
                      <p class="mt-2 text-white card-text">Total Orders</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bg-google d-flex align-items-center" style="background: url('./assets/images/red.jpg');">
                <div class="card-body py-5">
                  <div
                    class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <i class="mdi mdi-format-list-bulleted text-white icon-lg"></i>
                    <div class="ml-3 ml-md-0 ml-xl-3">
                      <?php 
                        $totalStudents = "SELECT pid FROM product ";
                        $totalStudentsResult = mysqli_query($conn, $totalStudents);
                        $rowcount = mysqli_num_rows( $totalStudentsResult );
                      ?>
                      <h5 class="text-white font-weight-bold"><?= $rowcount; ?></h5>
                      <p class="mt-2 text-white card-text">Total Products</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bg-twitter d-flex align-items-center" style="background: url('./assets/images/blue.jpg');">
                <div class="card-body py-5">
                  <div
                    class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <i class="mdi mdi-account text-white icon-lg"></i>
                    <div class="ml-3 ml-md-0 ml-xl-3">
                      <?php 
                        $totalStudents = "SELECT uid FROM user ";
                        $totalStudentsResult = mysqli_query($conn, $totalStudents);
                        $rowcount = mysqli_num_rows( $totalStudentsResult );
                      ?>
                      <h5 class="text-white font-weight-bold"><?= $rowcount; ?></h5>
                      <p class="mt-2 text-white card-text">Total Customers</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- row end -->
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Latest Orders</h4>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> SR NO </th>
                          <th> Name  </th>
                          <th>Mobile</th>
                          <th>Address</th>
                          <th>Added On</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                            $getCollege = "SELECT u.uname, u.umobile, u.address, oh.addedon FROM order_header oh JOIN user u ON oh.uid = u.uid ORDER BY oh.ohid DESC LIMIT 5";
                            $getCollegeResult = mysqli_query($conn, $getCollege);
                            $i = 1;
                           while ($row = mysqli_fetch_array($getCollegeResult, MYSQLI_ASSOC))
                            {
                        ?>
                      <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $row['uname']; ?></td>
                        <td><?= $row['umobile']; ?></td>
                        <td><?= $row['address']; ?></td>
                        <td><?= $row['addedon']; ?></td>
                      </tr>
                      <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- row end -->
          
        </div>
        <!-- content-wrapper ends -->
      <?php include('footer.php'); ?>