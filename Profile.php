<?php
			session_start();
			include_once('..//connection/db.php');
			if(!isset($_SESSION['username'])){
	header('location:../index.php');
	}
			
			else{
			if (isset($_POST['submit'])){
				
			$Agent_id= $_SESSION['agent_id'];	
			$name=$_POST['name'];  
			$email=$_POST['email'];
			$mobile=$_POST['mobile'];
			$address=$_POST['address'];
			$sql = "insert into profile(A,Name,Email,Mobile,Address,credit) values('$Agent_id','$name','$email','$mobile','$address',0)";
			$res = mysqli_query($db,$sql);
			if($res>0){
					echo '<script type="text/javascript">'; 
					echo 'alert("Details Saved");'; 
					echo 'window.location.href = "login.php";';
					echo '</script>';
			}
			else{
				echo '<script>alert("not inserted")</script>';
				}
			}
			}
			?>
<html>
<head><title>Form</title>




<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<style>
.container1{
	

	padding: 10px;
	margin:0px;
}

</style>
</head>
<body>

<div class="container">
<div class="jumbotron text-center">
<p>Personal Details</p>


</div>


<form class="form-horizontal" action="" method="post">


	 <div class="form-group">
		<label class="control-label col-sm-2" for="name">Name:</label>
		<div class="col-sm-5">
		  <input type="text" class="form-control" name="name" placeholder="Enter Name" value=""  required >
		</div>
	  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email:</label>
    <div class="col-sm-5">
      <input type="email" class="form-control" name="email" placeholder="Enter Email" required >
    </div>
  </div>
  
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Mobile:</label>
    <div class="col-sm-5">
      <input type="mobile" class="form-control" name="mobile" placeholder="Enter Mobile" required>
    </div>
  </div>
   <div class="form-group">
    <label class="control-label col-sm-2" for="email">Address:</label>
    <div class="col-sm-5">
      <input type="mobile" class="form-control" name="address" placeholder="Enter Address" required>
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
	  <button type="submit" name="submit" class="btn btn-default">LogOut</button>
    </div>
  </div>
 
<a href="login.php">Previous Page</a>
</form>

</div>
</div>

</body>
</html>


