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
<div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Products</h4>
                  <div class="table-responsive">
                    <table class="table" id="datatable">
                      <thead>
                        <tr>
                          <th>SR NO</th>
                          <th>Category Name</th>
                          <th>Product Name</th>
                          <th>Price</th>
                          <th>Added On</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php 

                          $getUsers = "SELECT p.pid, c.cname, p.pname, p.pprice,p.addedon FROM product p JOIN category c ON c.cid = p.pcid ";
                            $getUsersResult = mysqli_query($conn, $getUsers);
                            $i = 1;
                           while ($row = mysqli_fetch_array($getUsersResult, MYSQLI_ASSOC))
                            {
                        ?>
                        <tr>
                          <td scope="row"><?= $i++; ?></td>
                           <td><?= $row['cname']; ?></td>
                          <td><?= $row['pname']; ?></td>
                          <td><?= $row['pprice']; ?></td>
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
        </div>
      <?php include('footer.php'); ?>
