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
                  <h4 class="card-title">All users</h4>
                  <div class="table-responsive">
                    <table class="table" id="datatable">
                      <thead>
                        <tr>
                          <th>Profile</th>
                          <th>VatNo.</th>
                          <th>Created</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 

                          $getUsers = "SELECT * FROM user ";
                            $getUsersResult = mysqli_query($conn, $getUsers);
                            $i = 1;
                           while ($row = mysqli_fetch_array($getUsersResult, MYSQLI_ASSOC))
                            {
                        ?>
                        <tr>
                          <td scope="row"><?= $i++; ?></td>
                           <td><?= $row['uname']; ?></td>
                          <td><?= $row['umobile']; ?></td>
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
