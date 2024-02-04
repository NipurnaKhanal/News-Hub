<?php 
include '../../link.php';
if(isset($_REQUEST['submit'])){
$id=$_REQUEST['id'];
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$Role=$_REQUEST['Role'];
$sqll="update user set Name='$name',Email='$email',Role='$Role'where Id='$id'";
if (mysqli_query($conn,$sqll)) {
	header("location: http://localhost/online news portal/php/Admin/allusers.php");
	}
else{
echo "Unable to update";

}
}
 ?>
 <!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../web/style.css">  
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update User</title>
	<style>
		body{   
    background: rgb(211, 211, 211);  
}  
	.input-group{
    text-align: center;
	}
 
.box{
        width: 240px;
        height: 40px;
        border-radius: 10px;
        padding-left: 10px;
        opacity: 50%;

}
.box:hover{
    box-shadow: #303030 1px 1px 1px 1px;
    opacity: 100%;

}
.frame{  
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    border: solid rgb(63, 63, 63) 0px;  
    width:25%;  
    align-content: center;
    border-radius: 20px;  
    margin: 120px auto;  
    background: rgb(255, 255, 255);  
    padding: 50px;  
} 
.frame:hover{
    border: #337ab7;
}
#btn{  
    color: #fff;  
    background: #1c53e7;  
    padding: 7px;  
    margin-left: 0%; 
    border-radius: 5px; 
}
#btn:hover{
	background:#ed6b4d;
}
		</style>	

</head>
<body>
<a href="http://localhost/online news portal/php/Admin/index.php"><i class="fa-solid fa-arrow-left-long"></i>Back</a>
	<?php 
	$id=$_REQUEST['id'];
	$sql="select Id,Name,Email,Role from user where Id='$id'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
		while ($rows=mysqli_fetch_assoc($result)) {
	 ?>
	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" class="frm">

		<div class="frame">
		<a href="../../web/index.html"></a> <br><br>
		<input type="hidden" name="uid" value="<?php echo "$rows[Id]" ?>">

		<div class="input-group">
		<label>Name</label><br>
		<input class="box" type="text" name="name" value="<?php echo "$rows[Name]" ?>">
		</div>

		<div class="input-group">
		<label>Email</label><br>
		<input class="box" type="text" name="email" value="<?php echo "$rows[Email]" ?>">
		</div>

		<div class="input-group">
		<label>Role</label><br>
		<input class="box" type="text" name="Role" value="<?php echo "$rows[Role]"; ?>">
		</div>
			<br><br>
		<div class="input-group">
		<input id="btn" type="submit" name="submit" value="Update">
		</div>
		</div>
	</form>
<?php 
}
} 
?>
</body>
</html>
