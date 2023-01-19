<?php
require "include/common.php";

$name = mysqli_real_escape_string($con,$_POST['name']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$password = md5(mysqli_real_escape_string($con,$_POST['password']));
$phone = mysqli_real_escape_string($con,$_POST['phone']);

$query = "SELECT id FROM users WHERE email='$email'";
$result = mysqli_query($con,$query) or die(mysqli_error($con));
if(mysqli_num_rows($result)>0){
    header("location: signup.php?error=email already exists");
}else{
    $query="INSERT INTO users ( name, email, password, phone) VALUES ('$name', '$email', '$password', '$phone')";
    $result=mysqli_query($con,$query) or die(mysqli_error($con));

    $_SESSION['email']=$email;
    $_SESSION['user_id']=mysqli_insert_id($con);

    header('location: homepage.php');
}

?>