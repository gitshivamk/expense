<?php
include "include/common.php";

$email = mysqli_real_escape_string($con,$_POST['email']);
$password = md5(mysqli_real_escape_string($con,$_POST['password']));

$query = "SELECT email,id FROM users WHERE email='$email' && password='$password'";
$result = mysqli_query($con,$query) or die(mysqli_error($con));
if(mysqli_num_rows($result)==0){
    echo "Invalid User";
}
else{
    $row = mysqli_fetch_array($result) or die(mysqli_error($con));
    $_SESSION['email']=$row['email'];
    $_SESSION['user_id']=$row['id'];

    echo ("<script> location.href='homepage.php' </script>");
}