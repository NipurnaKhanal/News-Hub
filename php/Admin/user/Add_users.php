<?php 
include '../../link.php';
if(isset($_REQUEST['submit'])){
	$name=$_REQUEST['name'];
	$email=$_REQUEST['email'];
	$role=$_REQUEST['role'];
	$password=$_REQUEST['password'];
		$sql="select Email from user where Email='$email'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			echo "Provided Email address is already used..";
		}
		else{
			$sqli="insert into user (Name,Email,Password,Role)values('$name','$email','$password','0')";
			if (mysqli_query($conn,$sqli)) {
				header("location: http://localhost/online news portal/php/Admin/allusers.php");
			}
			else{
				echo "Query Failed";
			}
		}
		}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../../CSS/PHP/Admin/AddUsers.css">

		<style type="text/css">

body{   
    background: rgb(211, 211, 211);  
}  
#frm{  
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    border: solid rgb(63, 63, 63) 0px;  
    width:25%;  
    align-content: center;
    border-radius: 20px;  
    margin: 120px auto;  
    background: rgb(255, 255, 255);  
    padding: 50px;  
} 
#input-group{
    text-align: center;
}

#box{
        width: 240px;
        height: 40px;
        border-radius: 10px;
        padding-left: 10px;
        opacity: 50%;

}
#box:hover{
    box-shadow: #303030 1px 1px 1px 1px;
    opacity: 100%;
}
.button{
    background: #3d5a80;  
    color: #fff;  
    padding: 7px;  
    margin-left: 0%; 
    border-radius: 5px; 
    text-decoration: none;
}
.button:hover{
    background:#ed6b4d ;

}
</style>

</head>
<body>
<a href="http://localhost/online news portal/php/Admin/allusers.php"><i class="fa-solid fa-arrow-left-long"></i>Back</a>
		<div class="AddUsers" id="input-group">
		<form id="frm" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">

	

	 <h3 align="center">Add User</h3>
	 
				<input id="box" type="text" name="name" placeholder="Name" required onfocus><br><br>
				<input id="box" type="email" name="email" id="emailadd" placeholder="Valid Email Address" required autocomplete="off"><br><br>
				<input id="box" type="password" name="password" placeholder="password" required autocomplete="off"><br><br>
				<input class="button" type="submit" value="Add" name="submit">
				<a href="../index.php" class="button">Cancel</a>
				
			</form>
	</div>
</body>
</html>