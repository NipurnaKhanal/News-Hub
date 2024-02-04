<?php 
include '../Link.php';
//session_start();
/*if($_SESSION['Role'] == '1')
	header("location: http://localhost/online news portal/php/Admin/post.php");*/
  
 ?>
 <!DOCTYPE html>
 <html>
 <head>
	 <link rel="stylesheet" href="stylead.css">
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>User List</title>

	 <style type="text/css">

			body{   
				background: rgb(211, 211, 211);
			
        background: rgb(211, 211, 211);  
        font-family: Verdana, Geneva, Tahoma, sans-serif;
     
			}  
			#frm{  
				font-family: Verdana, Geneva, Tahoma, sans-serif;
				border: solid rgb(63, 63, 63) 0px;  
				width:50%;  
				align-content: center;
				border-radius: 20px;  
				margin: 120px auto;  
				background: rgb(255, 255, 255);  
				padding: 50px;  
			} 
			#frm:hover{
				border: #337ab7;
			}
			table{
				align-content: center;
			}
			.link{
				background: #3d5a80;  
				color: #fff;  
				padding: 7px;  
				margin-left: 0%; 
				border-radius: 5px; 
				text-decoration: none;
			}
			.link:hover{
 			   background:#ed6b4d ;
}
		 </style>

 </head>
 <body>
 <?php
 // include "header.php";
  ?>
	 <form id="frm">
	 

	 <h3 align="center">User Details</h3>

 	<?php
 	 $sql="select Id,Name,Email,Role from user";
 	$result=mysqli_query($conn,$sql);
 	if(mysqli_num_rows($result)>0){
		 
 	 ?>
    <div class="table">

 <table border="1px" cellspacing="0" cellpadding="10px">
 	<tr>
 		<th>ID</th>
 		<th>Name</th>
 		<th>Email</th>
 		<th>Role</th>
 		<th colspan="2">Action</th>
 	</tr>
 	<?php while ($rows=mysqli_fetch_assoc($result)) {
 	
 	 ?>
 	 <tr>
 	 	<td><?php echo "$rows[Id]."; ?></td>
 	 	<td><?php echo "$rows[Name]"; ?></td>
 	 	<td><?php echo "$rows[Email]"; ?></td>
 	 	<td>

			  <?php
			  if($rows["Role"]==1){
			  echo "Admin"; 
			}
			elseif($rows["Role"]==0){
				echo "User";
			}
			?>
			</td>
 	 	<td><a class="link" href="user/Update_user.php?id=<?php echo "$rows[Id]" ?>"> Update</a></td>
 	 	<td><a class="link" href="user/Delete_user.php?id=<?php echo "$rows[Id]" ?>"> Delete</a></td>
 	 </tr>
<?php } ?>
 </table>
 <?php } ?>
 <br><br>
 <a class="link" href="user/Add_Users.php" class="adduser">Add Users</a>
 <a class="link" href="../../web/logout.php" class="logout">Logout</a>
 </div>
	 </form>
 </body>
 </html>