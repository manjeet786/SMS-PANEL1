<?php 
	include_once('..//connection/db.php');

	if(isset($_GET['submit'])){
	
	$bussiness = $_GET['bussiness'];
	$mobile = $_GET['mobile'];
	
	//$db = mysqli_connect("localhost","root","","data");
	
	
	
	$query=mysqli_query($db,"SELECT * from business where mobile='$mobile' LIMIT 1");
    $find=mysqli_num_rows($query);
	if($find>0){
		
		echo "<script>alert("number already exists");</script>";
		
	}
	
	else{
	
	$sql = "insert into business(mobile,bussiness) values( '$bussiness', '$mobile')";
	
	$res = mysqli_query($db,$sql);
	if($res)
	{
		echo "<script>alert(" Number added sucessfully");</script>";
	}
	else{
		data_inserted("200","data not insered",null);
	}
	
	}
	
	}

function data_inserted($status,$message,$bussiness){
	
	$response['status'] = $status;
	$response['message'] = $message;
	$response['bussiness'] = $bussiness;
	
	$res = json_encode($response);
	echo $res;
}



?>