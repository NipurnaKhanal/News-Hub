<?php 
include '../php/Link.php';

$name = $_REQUEST['uname'];
$email = $_REQUEST['email'];
$password = $_REQUEST['password_1'];
$cpassword = $_REQUEST['password_2'];


$sql = "SELECT Email FROM user WHERE Email='$email'";
$result = mysqli_query($conn, $sql);

$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$number    = preg_match('@[0-9]@', $password);
$specialChars = preg_match('@[^\w]@', $password);

if (empty($password)) {
    $error_message = "Password field is empty";
    header("location: http://localhost/online news portal/web/userlogin.php?error_message=" . urlencode($error_message));
}
elseif(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
    $error_message = "Password must be strong";
    header("location: http://localhost/online news portal/web/userlogin.php?error_message=" . urlencode($error_message));


}

elseif (mysqli_num_rows($result) > 0) {
	$error_message = "Passwords do not match.";
    echo "Provided Email address is already used..";
    header("location: http://localhost/online news portal/web/userlogin.php" . urlencode($error_message));
    exit();
} elseif ($password != $cpassword) {
    $error_message = "Passwords do not match.";
    header("location: http://localhost/online news portal/web/userlogin.php?error_message=" . urlencode($error_message));
    exit();
}
 

else {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);//
    $sqli = "INSERT INTO user(Name, Email, Password, role) VALUES ('$name', '$email', '$hashed_password', '0')";

    if (mysqli_query($conn, $sqli)) {
        header("location: http://localhost/online news portal/web/login.php");
        exit();
    } else {
        echo "Query Failed";
    }
}
?>