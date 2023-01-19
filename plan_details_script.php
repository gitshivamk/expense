<?php
include "include/common.php";
$plan_id = $_SESSION['plan_id'];
$user_id=$_SESSION['user_id'];
$title = $_GET['title'];
$starting_date = $_GET['from'];
$ending_date = $_GET['to'];
$no_of_people = $_SESSION['no_of_people'];
for($i=0;$i<$no_of_people;$i++){
    $person=$_GET['person'][$i];
    $query = "INSERT INTO person(name,plan_id) VALUES('$person','$plan_id')";
    $result = mysqli_query($con,$query) or die(mysqli_error($con));
}
if(isset($_SESSION['plan_id'])){
    echo $_SESSION['plan_id'];
}

$query1 = "UPDATE plan SET title= '$title' WHERE id='$plan_id'";
$result1 = mysqli_query($con,$query1) or die("Query can't execute" . mysqli_error($con));

$query2 = "UPDATE plan SET starting_date= '$starting_date' WHERE id='$plan_id'";
$result2 = mysqli_query($con,$query2) or die("Query can't execute" . mysqli_error($con));

$query3 = "UPDATE plan SET ending_date= '$ending_date' WHERE id='$plan_id'";
$result3 = mysqli_query($con,$query3) or die("Query can't execute" . mysqli_error($con));

echo "(<script>location.href='homepage.php'</script>)";
?>
