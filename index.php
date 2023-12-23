<?php
	session_start();
	include("Database/config.php");
	
	if(isset($_POST['submit']))
	{
		//echo "<pre>";print_r($_POST);die('okay');
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$CheckExist = "SELECT * FROM admin WHERE email = '".$email."' AND password = '".$password."' ";
		$CheckExistResult = mysqli_query($conn, $CheckExist);
		$CheckExistData = mysqli_fetch_array($CheckExistResult);
		$CheckExistCount = mysqli_num_rows($CheckExistResult);
		if($CheckExistCount == 0)
		{
			$_SESSION['errmsg']="Invalid username or password";
			header('Location: index.php');
			}else{
			$_SESSION['alogin']=$_POST['email'];    
      $_SESSION['name']=$CheckExistData['name'];
			$extra="dashboard.php";//
			$host=$_SERVER['HTTP_HOST'];//die('ok');
			$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
			header("location:http://$host$uri/$extra");
			exit();
		}
	}
	
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>BMS Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller d-flex">
   
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
              <center>  <img src="assets/images/logo1.jpg" alt="logo" style="width: 250px;"></center>
              </div>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" method="POST">
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="submit">SIGN IN</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/template.js"></script>
  <!-- endinject -->
</body>

</html>
