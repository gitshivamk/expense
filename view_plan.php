<?php 
include "include/common.php";
if(!isset($_SESSION['user_id'])){
    header('location: index.php');
} 
if(!isset($_SESSION['plan_id'])){
    $user_id= $_SESSION['user_id'];
    $query0 = "SELECT id FROM plan WHERE user_id='$user_id'";
    $result0 = mysqli_query($con,$query0) or die("Query0 failed");
    $row0 = mysqli_fetch_array($result0);
    $_SESSION['plan_id']= $row0['id'];
}
$plan_id = $_SESSION['plan_id'];
$query = "SELECT * FROM person WHERE plan_id='$plan_id'";
$result = mysqli_query($con,$query) or die(mysqli_error($con));

$query4 = "SELECT * from plan where id='$plan_id'";
$result4 = mysqli_query($con,$query4) or die (mysqli_error($con));
$row4 = mysqli_fetch_array($result4);


?>
<!Doctype html>
<html>
<head>
    <title>View Plan Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

    <!--jQuery library--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!--Latest compiled and minified JavaScript--> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="indexstyle.css">
    <style>
        .panel1{
            margin-top:100px;
        }
        button{
            margin-top:100px;
        }

        .btn-default{
            border:1px solid green;
            color: green;
        }
        
    </style>
</head>
<body>
        <?php include "include/header.php"; ?>
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <div class="panel panel-success panel1">
                        <div class="panel-heading">
                            <center>
                            <h3>My First Plan
                            <span class="glyphicon glyphicon-user"></span>
                            </h3>
                            </center>
                        </div>
                        <div class="panel-body">
                            <p><b>Budget</b> <span><?php echo $row4['initial_budget'] ?></span></>
                            <p><b>Remaining amount</b></p>
                            <p><b>Date </b> <?php echo $row4['starting_date']. " to  " . $row4['ending_date'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6">
                    <a href="expense_distribution.php"><button type="submit" class="btn btn-default btn-lg">Expense Distribution</button></a>
                </div>
                </div>
                    <?php
                    $query3 = "SELECT * FROM expense WHERE plan_id='$plan_id'";
                    $result3 = mysqli_query($con,$query3) or die(mysqli_error($con));
                    $row3 = mysqli_fetch_array($result3);
                    if(mysqli_num_rows($result3)>0){ 
                        $expense_id= $_SESSION['expense_id'];
                        $query2 = "SELECT * FROM expense JOIN person ON expense.person_id=person.id";
                        $result2 = mysqli_query($con,$query2) or die(mysqli_error($con));
                        
                    while($row2 = mysqli_fetch_array($result2)){ ?> 
                    <div class="row">
                    <div class="col-xs-3 col-xs-offset-2">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h2>
                                <center> <?php echo $row2['title'] ;?>
                                <span class="glyphicon glyphicon-user"></span>
                                 </center>
                                </h2>
                            </div>
                            <div class="panel-body">
                            <b>Amount: &nbsp &nbsp &nbsp &nbsp &nbsp <?php echo $row2['amount_spent'] ?></b></br> 
                            <br>
                            <b>Paid by: &nbsp &nbsp &nbsp &nbsp &nbsp <?php echo $row2['name'] ?></br>
                            <br>
                            <b>Paid on:&nbsp &nbsp &nbsp &nbsp &nbsp <?php echo $row2['date'] ?></br>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                <div class="col-xs-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3>Add New Expenses</h3>
                        </div>
                        <div class="panel-body">
                            <form action= "view_plan_script.php" method="GET">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Expense Name">
                                </div>
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control" name="date" id="date">
                                </div>
                                <div class="form-group">
                                    <label for="amountSpent">Amount Spent</label>
                                    <input type="text" class="form-control" name="amountSpent" id="amountSpent" placeholder="Amount Spent">
                                    <br>
                                    <select id="choose" name="choose" class="form-control" placeholder="choose">
                                    <?php
                                        while($row=mysqli_fetch_array($result))
                                        { ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo  $row['name'] ;?></option>
                                    <?php  } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="uploadBill">Upload Bill</label>
                                    <input type="file" class="form-control" name="uploadBill" id="uploadBill">
                                </div>
                                <button type="submit" class="btn btn-default btn-block">ADD</button>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "include/footer.php"; ?>
    </body>
</html>