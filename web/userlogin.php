<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
	
</head>
<body>
<span>

</span>
<form id="frm" method="post" action="register.php">



<h2><center>Register<center></h2>	<br>

<div class="input-group">
		<label>Username</label><br>
		<input class="box" type="text" id="uname" name="uname" value="">
	</div>

	<div class="input-group">
		<label>Email</label><br>
		<input class="box" type="email" id="email" name="email" value="">
	</div>

	<div class="input-group">
		<label>Password</label><br>
		<input class="box" type="password" id="password_1" name="password_1">
	</div>

	<div class="input-group">
		<label>Confirm password</label><br>
		<input class="box" type="password" id="password_2" name="password_2">
	</div>
<br>
	<div class="input-group">
	<input type =  "submit" id = "btn" value = "Register" />  
	</div>
	<p>
		<center>Already a member?   <a href="login.php">Sign in</a><center>
	</p>
    <?php
if(isset($_GET['error_message'])){
    $error_message = $_GET['error_message'];
    echo "<p style='color: red;'>$error_message</p>";
}
?>
</form>

<script>                
        </script>  

</body>
</html>

