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
    $catName = $_POST['cat_name'];
    $sqlin = "INSERT into category (cname, addedon) VALUES ('".$catName."', '".$date."')";
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
                <label for="exampleInputUsername1">Category Name</label>
                <input type="text" name="cat_name" placeholder="Category name" class="form-control" required="">
              </div>
              
              <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
              <input type="hidden" name="all_items" id="all_items">
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include('footer.php'); ?>
  
