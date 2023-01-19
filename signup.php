<?php
include "include/common.php";
?>
<!DOCTYPE html>
    <html>
    <head>
        <title>Sign Up Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

        <!--jQuery library--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <!--Latest compiled and minified JavaScript--> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="indexstyle.css">
        <style>
            .panel{
                margin: 120px 500px;
            }
        </style>
        
    </head>
    <body>
            <?php include "include/header.php"; ?>  
            <div class="panel panel-default">
                <div class="panel-heading">
                    <center><h1>SignUp</h1></center>
                </div>
                <div class="panel-body">
                    <form action="signup_script.php" method="POST">
                        <div class="form-group">
                            <label for="name">Name:</label> <br>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label> <br>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter valid Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                            <p> <?php
                                if(isset($_GET['error'])){
                                echo $_GET['error'] ; 
                                } ?> </p>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label> <br>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password(Min 6 characters)" pattern=".{6,}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number:</label> <br>
                            <input type="number" name="phone" id="phone" class="form-control" placeholder="Enter Valid Phone Number(Ex:8867546730)" require>
                        </div>
                        <button value="submit" class="btn btn-success btn-block">Sign Up</button>
                    </form>
                
                </div>
            </div>
            <?php include "include/footer.php"; ?>
    </body>
</html>