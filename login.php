<?php
session_start();

		
	include_once('..//connection/db.php');

	if(!isset($_SESSION['username'])){
	header('location:../index.php');
	}
	
else{	
	$credit = 0;
	$msg = "";
	$Agent_id= $_SESSION['agent_id'];
	$sql="select * from  profile where A='$Agent_id'";
	$val1 = mysqli_query($db,$sql);
	$row = mysqli_fetch_array($val1);
	$credit = $row['credit'];
	if(isset($_POST['submit'])){
	$business = $_POST['business'];
	$mobile = $_POST['mobile'];
	
	    
		$name = $_SESSION['username'];
	 $series=substr($mobile,0,4);
	$series_query = mysqli_query($db,"select * from series where series='$series'");
	  $find1=mysqli_num_rows($series_query);
	  
	//$db = mysqli_connect("localhost","root","","data");
	
	
	
	$query=mysqli_query($db,"SELECT * from business where mobile='$mobile'");
	  
    $find2= mysqli_num_rows($query);
	
	if($find2>0){
	echo '<script>alert("number already exists")</script>';
	//$msg="number already exists";
	
		}
	
	
		if($find1==1)
	  {
		  $lines=explode(",",$_POST["submit"]);
			foreach($lines as $line)
			{
				list($mobile)=explode(",",$line);
		  
	$sql = "Insert into business(mobile) values('$mobile')";
	
	$res = mysqli_query($db,$sql);
	if($res)
	{		
			$sql="select * from  profile where A='$Agent_id'";
			$val1 = mysqli_query($db,$sql);
			$row = mysqli_fetch_array($val1);
			$credit = $row['credit'];
			$credit= $credit+1;
			$update = "update profile set credit='$credit' where A ='$Agent_id'";
			$val1 = mysqli_query($db,$update);
			echo $credit;
		
		echo '<script> alert("number inserted successfully")</script>';
		
	}
			
	  
	
	
		else
			{
				
		$sql = "insert into invalid(Agent_id,mobile,business) values('$Agent_id','$mobile','$business')";
		$res = mysqli_query($db,$sql);
		echo '<script>alert("invalid series")</script>';
	
		}
		}
	}
	}
	
	
		
	

	}
	


?>


<html>


<head>
<title>SMS PANEL</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>

.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
.form {
  position: relative;
  z-index: 1;
  background: #FFFFFF;
  max-width: 360px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
.form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: #76b852; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #76b852, #8DC26F);
  background: -moz-linear-gradient(right, #76b852, #8DC26F);
  background: -o-linear-gradient(right, #76b852, #8DC26F);
  background: linear-gradient(to left, #76b852, #8DC26F);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}
</style>
<script>
$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});

</script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">SMS PANEL</a>
    </div>
    <ul class="nav navbar-nav ">
     
      <li><a href="Profile.php">Update Profile</a></li>
      <li><a href="form.php">Bank Details</a></li>
	    <li><a href="">Your Credits</a></li>
	  <li><?php  echo '<h3> '.$GLOBALS['credit'].'</h3>' ?><li>
      <li><a href="logout.php">Log Out</a></li>
    </ul>
  </div>
</nav>



<div class="login-page">

  <div class="form">
  
  <div class="jumbotron text-center">

<?php  echo '<h3>Logged in as '.$_SESSION["username"].'</h3>' ?>
</div>
   <div>
    <form class="login-form" method="post" action="" onsubmit="return valid()" required>
	<div>
      <input type="text" placeholder="Enter mobile number" name="mobile" id="mobile" required>
	  <div><?php echo'<h6>'.$GLOBALS['msg'].'</h6>'?></div>
	  </div>
      <input type="text" placeholder="Enter business" name="business"/>
      <button type="submit" name="submit">Submit Data</button>
    
    </form>
	</div>
  </div>
</div>



</body>
</html>