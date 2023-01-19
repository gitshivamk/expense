<?php 
include "include/common.php";

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM plan WHERE user_id='$user_id'";
$result= mysqli_query($con,$query) or die(mysqli_error($con));

?>
<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
    <!--jQuery library--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!--Latest compiled and minified JavaScript--> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="indexstyle.css">
    <style>
        
        h2{
            margin-top: 100px;
        }

        .panel1{
            width: 250px;
            height: 200px;
            margin-bottom:19%;
        }
       
        .panel1 a{
            line-height: 160px; 
        } 

        .panel2{
            width: 250px;
            height:250px;
            margin-bottom: 19%;
        }
        p{
            padding:10px;
        }

        h1{
            font-size:66px;
        }
    </style>
</head>
<body>
        <?php include "include/header.php"; ?> 
        <div class="container">
        <?php if(mysqli_num_rows($result)==0){  ?>
            <h2>You don't have any active plans</h2>
            <div class="panel panel-default panel1">
                <div class="panel-body">
                    <center><a href="create_new_plan.php"><span class="glyphicon glyphicon-plus-sign"></span>Create a new plan</a></center>
                </div>
            </div>
        <?php }else{
            $row = mysqli_fetch_array($result) or die(mysqli_error($con));  
            ?>
            <h2>Your Plans</h2>
            <br>
            <div class="panel panel-success panel2">
                <div class="panel-heading">
                    <h3>My First Plan</h3>
                </div>
                <div class="panel-body">
                    <p>Budget   &nbsp  &nbsp  &nbsp  &nbsp <?php echo $row['initial_budget']; ?> </p>
                    <p>Date   &nbsp &nbsp &nbsp &nbsp <?php echo $row['starting_date']. " - ". $row['ending_date']; ?> </p>
                    <a href="view_plan.php"><submit type="submit" class="btn btn-default btn-block">View Plan</submit></a>
                </div>
            </div>
            <h1 style="margin-left:95%; margin-bottom: 30px;"><a style="color:green"><span class="glyphicon glyphicon-plus-sign"></span></a></h1>
            <?php } ?>
        </div>
        <?php include "include/footer.php"; ?>
    </body>
</html>