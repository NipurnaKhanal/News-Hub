<?php
include "../php/link.php";
if (isset($_REQUEST['submit'])) {
    $conn=mysqli_connect('localhost','root','','newsportal') or die("Connection error"."".mysqli_connec_error());
    
$email=$_REQUEST['user'];
$password=$_REQUEST['pass'];
$sql="SELECT Id,Name,Email,role FROM user where Email='$email' and Password='$password'";

$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
	while ($rows=mysqli_fetch_assoc($result)) {
        $sql="SELECT role FROM user where Email='$email' and Password='$password'";
		session_start();
        $_SESSION['Email']=$rows['Email'];
        $_SESSION['Name']=$rows['Name'];
		$_SESSION['Role']=$rows['role'];
       if(!isset($_SESSION['Email'])){
           header("location: http://localhost/online news portal/web/login.php");
       }
       else{
        if($_SESSION['Role']==1){
            header("location: http://localhost/online news portal/php/Admin/index.php");
        }
        else{
		    header("location: http://localhost/online news portal/web/");
        }
       }
	}
}

else{
		echo "Email and password doesn't match";
	}}
?>
<html>  
<head>  
    <title>PHP login system</title>  

    <link rel="stylesheet" href="style.css">  
</head>  

<body style="background: #c2c2c2;">  
    <div id = "frm">  
       
        <center>
        <h1>Login</h1>  
        </center>
        <div class="input-group">
        <form name="f1" action = "<?php $_SERVER['PHP_SELF'];?>" onsubmit =validation() method = "POST">  
            <p>  
                <label> Email: </label>  <br>
                <input class="box"  type = "text" id ="user" name  = "user" />  
            </p>  
            <p>  
                <label> Password: </label>  <br>
                <input class="box" type = "password" id ="pass" name  = "pass" />  
            </p>  
            <p>     
                <input type =  "submit" id = "btn" value = "Login" name="submit" />  
            </p>  
            New User?  <a href="userlogin.php">Register</a>
        </form> 
    </div>
    </div>  
 
  
    <script>  
            function validation()  
            {  
                var id=document.f1.user.value;  
                var ps=document.f1.pass.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("User Name and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("User Name is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
        </script>  

</body>     
</html> 