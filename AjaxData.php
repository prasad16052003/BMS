<?php
	//fetch.php
	include("Database/config.php");
	global $con;
	
	date_default_timezone_set('Asia/Kolkata');
	
	$action = isset($_REQUEST['action']) ? strtolower(trim($_REQUEST['action'])) : '';
	extract($_REQUEST);//die("ok");
	
	switch ($action)
	
	{
		
		case 'order_details':
		
		$arrResult = order_details($_REQUEST); 
		
		break;

		case 'update_order_status':
		
		$arrResult = update_order_status($_REQUEST); 
			
		break;
		
		default:
		
		$arrResult = array(
		
		'success' => 0,
		
		'msg' => "No Web services Found"
		
		);
		
	}
	
	
	
	$output = json_encode($arrResult,JSON_UNESCAPED_UNICODE);
	
	print_r($output);
	
	
	function order_details($data)
	{
		global $conn;
		$result  = array();
		$getOrderDetails = "SELECT * FROM order_details od JOIN product p ON od.pid = p.pid WHERE ohid = '".$data['order_id']."' ";
		//GET USER DETAILS
		$getUserDetails = "SELECT * FROM user u JOIN order_header oh ON u.uid = oh.uid WHERE oh.ohid = '".$data['order_id']."' ";
		$getUserDetailsResult = mysqli_query($conn, $getUserDetails);
		while($userrow = mysqli_fetch_array($getUserDetailsResult, MYSQLI_ASSOC)){
			     $userData[] = $userrow;
			}

		$getOrderDetailsResult = mysqli_query($conn, $getOrderDetails);
		$getOrderDetailsCount = mysqli_num_rows($getOrderDetailsResult);
		if($getOrderDetailsCount > 0)
		{
			while($row = mysqli_fetch_array($getOrderDetailsResult, MYSQLI_ASSOC)){
			     $json[] = $row;
			}
			$result['status']  = true;
			$result['msg']  = 'Data fetched';
			$result['data']  = $json;
			$result['userdata']  = $userData[0];
			}else{
			$result['status']  = false;
			$result['msg']  = 'Data not fetched';
		}
		return $result;
	}
	
	function update_order_status($data)
	{
		global $conn;
		$result  = array();
		//echo "<pre>";print_r($data);die('ok');
		$getEventDetails = "UPDATE order_header SET iostatus = '1' WHERE ohid = '".$data['order']."' ";
		$getEventDetailsResult = mysqli_query($conn, $getEventDetails);
		if($getEventDetailsResult == 1)
		{
			$result['status']  = true;
			$result['msg']  = 'Data updated';
			}else{
			$result['status']  = false;
			$result['msg']  = 'Data not updated';
		}
		return $result;
	}
	
?>
