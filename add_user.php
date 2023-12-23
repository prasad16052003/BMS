<?php
  session_start();
  $email_address= $_SESSION['alogin'];
  include("Database/config.php");
  if(empty($email_address))
  {
    header("location:index.php");
  }
  
  include('header.php');
  if(isset($_POST['submit'])) {
    $user_name = $_POST['user_name'];
    $user_mobile = $_POST['user_mob'];
    $user_addr = $_POST['user_addr'];
    $sqlin = "INSERT into user (uname, umobile, address, addedon) VALUES ('".$user_name."', '".$user_mobile."', '".$user_addr."', '".$date."')";
            $insert = mysqli_query($conn,$sqlin);
            if($insert){
                $statusMsg = "The data has been uploaded successfully.";
            }else{
                $statusMsg = "Error, please try again.";
            } 

  }
?>
<div class="main-panel">        
  <div class="content-wrapper">
    <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <form class="forms-sample" method="POST" action="">
              <div class="form-group">
                <label for="exampleInputUsername1">Name</label>
                <input type="text" name="user_name" placeholder="Name" class="form-control" required="">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Mobile</label>
                <input type="text" name="user_mob" placeholder="Mobile" class="form-control" required="">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Address</label>
                <textarea class="form-control" rows="3" cols="5" placeholder="Address" name="user_addr" required=""></textarea>
              </div>
              <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include('footer.php'); ?>
  
