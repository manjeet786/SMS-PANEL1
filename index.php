<?php 

include_once('C:/wamp/www/SMS/connection/db.php');
session_start();
if(isset($_POST['submit'])){

	$username = $_POST['username'];
	$password = $_POST['password'];  
	
	
	$pass = md5($password);
	
	//$address = $GET['address'];
	
	//$db = mysqli_connect("localhost","root","","data");
	//$sql = "select * from register where firstname='$firstname' limit 1";
	
	$sql = "select * from login where username='$username' limit 1";
	$res = mysqli_query($db,$sql);
	
	
	$row = mysqli_fetch_array($res);
	$_SESSION['username'] = $row['username'];
	$_SESSION['agent_id'] = $row['id'];
	$db_type = $row['usertype'];
	$db_status = $row['status'];
	$db_username = $row['username'];
	if($username == $db_username)
	{
		if($db_status==1){
			header('Location: /SMS/html/logout.php');
			exit();
		}
		
		
		$_SESSION['username'] = $username;
		if($db_type == 3){
	header('Location: /SMS/html/login.php');
		}
		
		
		if($db_type == 1){
	header('Location: /SMS/html/Amin.php');
		}
		
	}
	else{
	
		header('Location: /SMS/html/logout.php');
	
	}
	
	

}

function data_inserted($status,$message,$username){
	
	$response['status'] = $status;
	$response['message'] = $message;
	$response['username'] = $username;
	
	$res = json_encode($response);
	echo $res;
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


<div class="login-page">


  <div class="form">
  
  <div class="jumbotron text-center">

<p>LOGIN</p>
</div>
   <div>
    
	<form class="login-form" method="post" action="">

	
      <input type="text" placeholder="username" name="username" id="username" required>
	  
      <input type="password" placeholder="password" name="password" id="password" required>
      <button type="submit" name="submit">login</button>
    
    </form>
	</div>
  </div>
</div>



</body>
</html>

