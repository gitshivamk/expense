<?php 
include "include/common.php";

$title = $_GET['title'];
$date = $_GET['date'];
$amount_spent = $_GET['amountSpent'];
$choose = $_GET['choose'];
$bill = $_GET['uploadBill'];
$plan_id = $_SESSION['plan_id'];

$query = "INSERT INTO expense(plan_id,person_id,title,date,amount_spent,choose,upload_bill) VALUES('$plan_id','$choose','$title','$date','$amount_spent','$choose','$bill')";
$result = mysqli_query($con,$query) or die("query cannot be executed" . mysqli_error($con));
$_SESSION['expense_id']=mysqli_insert_id($con);



header('location:view_plan.php');
?>

