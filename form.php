<?php 


session_start();
include_once('..//connection/db.php');	
if(!isset($_SESSION['username'])){
	header('location:../index.php');
	}
 else{
if(isset($_POST['submit'])){


$Agent_id= $_SESSION['agent_id'];	
$bank_ac = $_POST['ac_number'];
$bank_name = $_POST['bank_name'];
$bank_add = $_POST['bank_add'];
$ifsc_code = $_POST['ifsc_code'];


$sql="insert into form(Agent_id,bank_name,bank_address,acc_number,ifsc_code) values('$Agent_id','$bank_name','$bank_add','$bank_ac','$ifsc_code')";
	$row=mysqli_query($db,$sql);
	if($row>0){
		
		echo '<script type="text/javascript">'; 
		echo 'alert("Details Saved");'; 
		echo 'window.location.href = "login.php";';
		echo '</script>';
		
	}
	else{
		echo ' <script>alert("Details not Saved ")</script>';
		
	}
	
}
 }
?>
<html>
<head><title>Form</title>




<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style>
.container1{
	
	
	padding:10px;
	
}
#err{
	color:blue;
	
}
</style>



</head>
<body>

<div class="container">
<div class="jumbotron text-center">
<p>Form</p>


</div>


<form class="form-horizontal" action="" method="post" onsubmit="return validate()">

<? 
$Agent_id= $_SESSION['agent_id'];
$sql="select * from the form where Agent_id ='$Agent_id'";
$exe=mysqli_query($db,$sql);
$row1=mysqli_fetch_array($exe);
$acc_number = $row1['acc_number'];

?>


   <div class="form-group">
    <label class="control-label col-sm-2" for="email">Bank Name: </label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder="Bank name" value="">
	   <div id="err"><span class=text-center></span></div>
	</div>
  </div>
  
    
   <div class="form-group">
    <label class="control-label col-sm-2" for="email">Bank Address:</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="bank_add" id="bank_add" placeholder="Bank Address" >
	    <div id="erre"><span class=text-center></span></div>
    </div>
  </div>
 
   <div class="form-group">
    <label class="control-label col-sm-2" for="email">A/C Number:</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="ac_number" 
	  name="ac_number" placeholder="Bank A/C Number" required>
	   
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">IFSC Code:</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="ifsc_code" id="ifsc_code" placeholder="IFSC Code" required>
	   
    </div>
  </div>
  
  <!--div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label><input type="checkbox"> Remember me</label>
      </div>
    </div>
  </div-->
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="submit" class="btn btn-default">Submit Data</button>
	  <button type="submit" name="LogOut" class="btn btn-default">LogOut</button>
	
    </div>
	 
  </div>
  <a href="login.php">Back</a>

</div>
  
</div>

</body>
</html>
<script type="text/javascript">
var bank_name=document.getElementById('bank_name');
 
var bank_address=document.getElementById('bank_add');
var acc_no=document.getElementById('ac_number').value;
var code=document.getElementById('ifsc_code').value;

bank_name.addEventListener("blur",nameverify,true);
bank_address.addEventListener("blur",nameverify,true);
function validate(){
	
	
	
	if(bank_name.value ==""){
		err.style.color="red";
		err.textContent = "enter the bank name";
		return false;
	}
	
	if(bank_address.value == ""){
		erre.style.color="red";
		erre.textContent = "number is required";
		return false;
	}
	
}


function nameverify(){
	if(bank_name.value!= ""){
		
		err.innerHTML="";
		
	}
	if(bank_address.value!= ""){
		
		erre.innerHTML="";
		
	}
}
</script>

