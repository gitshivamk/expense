<?php
require "include/common.php";
if(!isset($_SESSION['user_id'])){
    header('location: index.php');
}

$oldpassword=md5($_POST['old_password']);
$newpassword=$_POST['new_password'];
$retypenewpwd=$_POST['confirm_new_password'];


if(strlen($newpassword)!=strlen($retypenewpwd)){
    echo("<script>alert('password fields doesnot match')</script>");
    header('location: change_password.php?password_error=length not match');
}
$user_id=$_SESSION['user_id'];
$query="SELECT password FROM users WHERE id='$user_id'";
$result=mysqli_query($con,$query) or die(mysqli_error($con));
$row=mysqli_fetch_array($result);
$oldpassworddb= $row['password'];
if($oldpassword==$oldpassworddb){
    $query2 ="UPDATE users SET password='$newpassword' WHERE id='$user_id'";
    $result2=mysqli_query($con,$query2) or die(mysqli_error($con));
    echo("<script>alert('Password is updated successfully')</script>");
    header("location: change_password.php?success=Your password is updated");
}else{
    echo("<script>alert('Passwords doesnot match')</script>");
    header("location: change_password.php?error=password doesnot match");
    
}
?>