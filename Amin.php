<?php
			session_start();
			include_once('..//connection/db.php');
			
			
			if(!isset($_SESSION['username'])){
			header('location:../index.php');
			}
			
			else{
				if (isset($_POST['submit'])){
			$username=$_POST['username'];  
			$usertype=$_POST['usertype'];
			$status=$_POST['status'];
			$password=md5($_POST['password']);
			
			
			$query = "select username from login where username= '$username' ";
			$res1 = mysqli_query($db,$query);
		   $find=mysqli_num_rows($res1);
			if($find>0){
				echo '<script>alert("Username already exists")</script>';
		
			}
			else{
			$sql = "insert into login(username,password,status,usertype) values('$username','$password','$status','$usertype')";
	
			$res = mysqli_query($db,$sql);
			
			if($res>0){
				
				echo '<script>alert("User inserted")</script>';
				
			}
			else{
				echo '<script>alert("not inserted")</script>';
				
			}
				}
				}
			}
			?>



<html>
<head>

<title>Admin Panel</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">



<style>

*{
	margin:0;
	padding:0;
	
	
}
#header{
	
	height:50px;
	width:100%;
	color:white;
	
	
	
}
.brand{
	font-size:20px;
	font-weight:bold;
	padding:.5em;
	
	
}

#navbar{
	height:100%;
	width:250px;
	float:right;
	
	
}
#content{
	
	width:1050px;
	height:100%;
	display:none;
	padding:2em;
	float:left;
}

#add_user{
	
	width:1050px;
	height:100%;
	display:none;
	padding:2em;
	float:left;
}
#business_table{
	
	width:1050px;
	height:100%;
	display:none;
	padding:2em;
	float:left;
}
#navbar ul{
	list-style:none;
	font-size:1.2em;
	margin-bottom:10px;
	padding:.5em;
	
}

#navbar ul li a{
	
	color:white;
	
	
}


#navbar ul li :hover{
	
	color:white;
	background-color:blue;
	
	
}


</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#users").click(function(){
		$('#content').css('display','block');
		$('#add_user').css('display','none');
		$('#business_table').css('display','none');
		
    });
	
	 $("#business").click(function(){
		 $('#content').css('display','none');
		$('#add_user').css('display','block');
		$('#business_table').css('display','none');
		
    });
	
	 $("#bs_table").click(function(){
		 $('#content').css('display','none');
		$('#add_user').css('display','none');
		$('#business_table').css('display','block');
		
    });
});



</script>

</head>
<body>


	 <div class="brand"><center>Admin Panel</center> </div>



<div class="container-fluid">



<ul>
<li><span><a id="users">Users</a></span></li>
<li><a id="business">Add user</a></li>
<li><a id="bs_table">Business</a></li>
<li><a href="series.php">New Mobile Series</a></li>
<li><a href="index1.php">Agent Account</a></li>
<li><a href="logout.php">Log Out</a></li>

</ul>




<div class="container-fluid">
<div id="content">


<table class="table table-hover">

<thead>
<tr>
	<th>Agent_id</th>
	<th>username</th>
	<th>password</th>
	<th>Status</th>
	<th>Type</th>
	
</tr>
</thead>
<?php  
include_once('..//connection/db.php');


$query=mysqli_query($db,"SELECT * from login ");

	while($row=mysqli_fetch_array($query)): ?>
	
	<tbody>
<tr>

<td><?php  echo $row['id']?></td>
<td><?php  echo $row['username'] ?></td>
<td><?php  echo $row['password'] ?></td>
<td><?php  echo $row['status'] ?></td>
<td><?php  echo $row['usertype'] ?></td>



</tr>
</tbody>
<?php endwhile; ?>
</table>

</div>

<div id="add_user">
<form class="login-form" method="post" action="">

	
      <input type="text" placeholder="username" name="username"/>
      <input type="password" placeholder="password" name="password"/>
	  
	  <select name="usertype">
	   <option value="3">Agent</option>
	  <option value="1">Admin</option>
	  <option value="2">Manager</option>
	 
	  </select>
	  
	    <select name="status">
	   <option value="0">Activate</option>
	  <option value="1">Deactivate</option>
	  
	 
	  </select>
	<button type="submit" name="submit">login</button>
    
    </form>



</div>


<div id="business_table">


<table class="table table-hover">

<thead>
<tr>
	<th>B_id</th>
	<th>Agent_id</th>
	<th>mobile</th>
	<th>business</th>
	<th>Added_at</th>
</tr>
</thead>
<?php  
include_once('C:/wamp/www/SMS/connection/db.php');


$query=mysqli_query($db,"SELECT * from business");

	while($row=mysqli_fetch_array($query)): ?>
	
	<tbody>
<tr>

<td><?php  echo $row['B_id']?></td>
<td><?php  echo $row['Agent_id']?></td>
<td><?php  echo $row['mobile'] ?></td>
<td><?php  echo $row['business'] ?></td>
<td><?php  echo $row['Added_at'] ?></td>

</tr>
</tbody>
<?php endwhile; ?>
</table>

</div>
</div>
</div>
</div>
</body>
<html>

