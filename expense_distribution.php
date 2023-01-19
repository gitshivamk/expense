<?php 
include "include/common.php";
$plan_id= $_SESSION['plan_id'];
//for displaying upper names
$query = "SELECT * FROM plan JOIN person ON plan.id=person.plan_id WHERE plan_id='$plan_id'";
$result = mysqli_query($con,$query) or die(mysqli_error($con));

//for displaying titles
$query1 = "SELECT * FROM plan JOIN person ON plan.id=person.plan_id WHERE plan_id='$plan_id'";
$result1 = mysqli_query($con,$query1) or die(mysqli_error($con));
$row1 = mysqli_fetch_array($result1);

//for displaying lower names
$query2 = "SELECT * FROM plan JOIN person ON plan.id=person.plan_id WHERE plan_id='$plan_id'";
$result2 = mysqli_query($con,$query2) or die(mysqli_error($con));
//for operation purposes 
$query4 = "SELECT * FROM expense JOIN person ON expense.person_id=person.id";
$result4 = mysqli_query($con,$query4) or die(mysqli_error($con));

?>
<!DOCTYPE html>
    <html>
    <head>
        <title>Index Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

        <!--jQuery library--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <!--Latest compiled and minified JavaScript--> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="indexstyle.css">
        <style type="text/css">
            .panel{
                position: absolute;
                top: 100px;
                width: 800px;
                left: 300px;
            }
            span{
                text-align: center;
            }
        </style>
    </head>
    <body>
            <?php include "include/header.php"; ?>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <center><h2>
                        <?php echo $row1['title']; ?>
                    </h2></center>
                </div>
                <div class="panel-body">
                    <b>Initial Budget</b>  <span><?php echo $row1['initial_budget']; ?> </span></br>
                    <b><?php 
                    while($row = mysqli_fetch_array($result)){
                       echo $row['name']. "</br>";
                       $sum=0;

                       while($row4 = mysqli_fetch_array($result4)){
                       $sum=$sum + $row4['amount_spent'];
                       echo $sum . "<br>";
                       } }?></b> 
                    <b>Total amount spent</b> </br>
                    <b>Remaining amount  <?php $remaining_amount ?></b> </br>
                    <b>Individual Share</b> </br>
                    <b><?php 
                    while($row2 = mysqli_fetch_array($result2)){
                       echo $row2['name']. "</br>"; } ?></b> </br>

                    <a href="view_plan.php"><button class="btn btn-default">Go Back</button></a>
                </div>
            </div>
            <?php include "include/footer.php"; ?>
    </body>
</html>
