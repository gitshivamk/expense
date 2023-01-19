<?php
include "include/common.php";
?>
<!DOCTYPE html>
    <html>
    <head>
        <title>Login Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

        <!--jQuery library--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

        <!--Latest compiled and minified JavaScript--> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="indexstyle.css">
        
    </head>
    <body>
            <?php include "include/header.php"; ?>
            <div class="panel panel-default login_panel">
                <div class="panel-heading">
                    <center><h1>Login</h1></center>
                </div>
                <div class="panel-body">
                    <form action="login_script.php" method="POST">
                        <div class="form-group">
                            <label for="email">Email:</label> <br>
                            <input type="email" name="email" id="email" class=" form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label> <br>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        </div>
                        <button value="submit" class="btn btn-success btn-block">Login</button>
                    </form>
            
                </div>
                <div class="panel-footer">
                    <p>Don't have an account? <a href="signup.php">Cilck here to Sign Up</a></p>
                </div>
            </div>
            <?php include "include/footer.php"; ?>
    </body>
</html>