<?php
include "include/common.php";
$user_id= $_SESSION['user_id'];
$query = "SELECT initial_budget,no_of_people FROM plan WHERE user_id='$user_id' ";
$result = mysqli_query($con,$query) or die(mysqli_error($con));
$row = mysqli_fetch_array($result);
$initial_budget = $row['initial_budget'];
$no_of_people = $row['no_of_people'];


?>
<html>
<head>
    <title>Plan Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

    <!--jQuery library--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!--Latest compiled and minified JavaScript--> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="indexstyle.css">
    <style>
        .panel{
            margin:100px 300px 120px 300px;
        }

        
    </style>
</head>
<body>
        <?php include "include/header.php"; ?> 
        <div class="container">
        <div class="panel panel-default">
            <div class="panel-body">
                <form action= "plan_details_script.php" method="GET">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter title(Ex:Trip to Goa)" required>
                    </div>
                    
                        <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="from">From</label>
                                <input type="date" class="form-control" name="from" id="from" min="2020/06/10" max="2020/12/31" required>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                 <label for="to">To</label>
                                <input type="date" class="form-control" name="to" id="to" min="2020/06/11" max="2021/01/01" required>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8">
                                <div class="form-group">
                                    <label for="initialBudget">Initial Budget</label>
                                    <input type="text" value="<?php echo $initial_budget; ?>" readonly class="form-control" name="initialBudget" id="initialBudget" placeholder="1000" required>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label for="people">No. of People</label>
                                    <input type="text" value="<?php echo $no_of_people; ?>" readonly class="form-control" name="people" id="people" placeholder="2" required>
                                </div>
                            </div>
                        </div>
                    <?php for($i=1;$i<=$no_of_people;$i++) { ?>
                    <div class="form-group">
                        <label for="person">Person <?php echo $i ?></label>
                        <input type="text" class="form-control" name="person[]" id="person" placeholder="Person <?php echo $i ?> Name" required>
                    </div>
                    <?php } ?>
                    
                    <button value="submit" class="btn btn-default btn-block">Submit</button>
                </form>
            </div>
        </div>
        </div>
        <?php include "include/footer.php"; ?>
       
    </body>
</html>