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
    $itemNames = json_decode($_POST['all_items']);
     $pname = $_POST['pname'];
     $price = $_POST['price'];
     $category = $_POST['category'];
    $sqlin = "INSERT into product (pname,pcid, pprice, addedon) VALUES ('".$pname."', '".$category."','".$price."', '".$date."')";
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
              
              <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Select category</label>
                          <div class="col-sm-9">
                            <select name="category" class="form-control"  id="categoryList">
                              <option value="">--Select category--</option>
                              <?php 
                                $getCollege = "SELECT cid, cname FROM category  ";
                                $getCollegeResult = mysqli_query($conn, $getCollege);
                                $i = 1;
                                while ($row = mysqli_fetch_array($getCollegeResult, MYSQLI_ASSOC))
                                {
                                ?>
                                <option value="<?= $row['cid']; ?>"><?= $row['cname']; ?></option>
                              <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Product Name</label>
                          <div class="col-sm-9">
                           <input type="text" name="pname" class="form-control" required="" placeholder="Name">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Product price</label>
                          <div class="col-sm-9">
                           <input type="text" name="price" class="form-control"  placeholder="Price">
                          </div>
                        </div>
                      </div>
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

  
