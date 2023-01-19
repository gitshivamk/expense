<?php 
include "include/common.php";
?>
<html>
<head>
    <title>Change Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

    <!--jQuery library--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!--Latest compiled and minified JavaScript--> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="indexstyle.css">
    <style>
        .panel{
            margin-top: 120px;
            margin-bottom: 200px;
        }
    </style>
</head>
<body>
        <?php include "include/header.php"; ?>
        <div class="container">
            <div class="row">
                <div class="col-xs-offset-3 col-xs-6 col-xs-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <center><h3>Change Password</h3></center>
                        </div>
                        <div class="panel-body">
                            <form method="POST" action="change_password_script.php">
                            <div class="form-group">
                                <label for="old_password">Old Password</label>
                                <input type="text" class="form-control" name="old_password" id="old_password" placeholder="Old Password" required>
                            </div>
                            <div class="form-group">
                                <label for="new_password">New Password</label>
                                <input type="text" class="form-control" name="new_password" id="new_password" placeholder="New Password(Min 6 characters)" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm_new_password">Confirm New Password</label>
                                <input type="text" class="form-control" name="confirm_new_password" id="confirm_new_password" placeholder="Retype New Password" required>
                                <?php 
                            if(isset($_GET['password_error'])){
                                echo $_GET['password_error'];
                            }
                            
                            if(isset($_GET['error'])){
                                echo $_GET['error'];
                            }
                            if(isset($_GET['success'])){
                                echo $_GET['success'];
                            }
                            ?>
                            </div>
                            <button type="submit" class="btn btn-success btn-block">Change</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "include/footer.php" ; ?>
    </body>
</html>