<?php
/*This is the page which receive the values form the create new plan page and store the into the database */

include "include/common.php";
$user_id = $_SESSION['user_id'];
$initial_budget = mysqli_real_escape_string($con,$_GET['initial_budget']);
$people = mysqli_real_escape_string($con,$_GET['people']);

$_SESSION['no_of_people'] = $people;
$query = "INSERT INTO plan(user_id,initial_budget,no_of_people) VALUES('$user_id','$initial_budget','$people')";
$result = mysqli_query($con,$query) or die("query can't be executed" . mysqli_error($con));
$_SESSION['plan_id'] = mysqli_insert_id($con);


echo ("<script>location.href='plan_details.php'</script>");
?>