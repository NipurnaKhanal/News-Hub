<?php
session_start();
if($_SESSION['Role']==0){
	header("location: http://localhost/online news portal/web/");
}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device=width, initial-scale=1.0">
		<title>news</title>
		<link rel="stylesheet" href="css\style.css">
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<style>
.menu {
  background-color:grey;
  display: flex;
    justify-content: center;
  height: 50px;
}

/* Style the links inside the navigation bar */
.menu  a {
  float: center;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  width: 20%;
}

.menu  a:hover {
  background-color:black;
  color: white;
}

/* Add a color to the active/current link */
.menu  a.active {
  background-color: #04AA6D;
  color: white;
}

    </style>
</head>
<body>

        <div class="menu">    
			<a href="index.php" > <span style="color:orange">News Hub </span></a>
					<a href="index.php"><i class ="fa fa-fw fa-user"></i>Home</a>  
					<a href="allpost.php"><i class ="fa fa-fw fa-user"></i>Post</a>
                	<a href="allcategory.php"><i class ="fa fa-fw fa-sign-out"></i>Category</a>
                    <a href="allusers.php"><i class ="fa fa-fw fa-user"></i>Users</a>
               		<!-- <a href="..\..\web\logout.php"><i class ="fa fa-fw fa-sign-out"></i>Log out</a> -->
					 <?php 
					  if(isset($_SESSION['Email'])){
						 echo '<a href="..\..\web\logout.php"><i class ="fa fa-fw fa-sign-out"></i> ' .$_SESSION['Name'].' '.'<span style="color:red; font-type:bold;">Log Out </span>'. '</a>';
					   }
					   else{
						echo '<a href="..\..\web\logout.php"><i class ="fa fa-fw fa-sign-out"></i>Log out</a>';
					   }
					   ?>

				</div>
					 
						</div>
					</div>