<html>
<head>
    <title>Create New Plan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

    <!--jQuery library--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <!--Latest compiled and minified JavaScript--> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="indexstyle.css">
    <style>
        .panel{
            height:300px;
            margin-top:150px;
            margin-left: 250px;
            margin-right:250px;
            margin-bottom: 250px;;
        }
        .btn-default:hover{
            background-color: green;
        }
    </style>
</head>
<body>
        <?php include "include/header.php" ; ?>
        <div class="container">
        
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h1>Create new plan</h1>
                </div>
                <div class="panel-body">
                    <form action="create_new_plan_script.php" method="GET">
                    <div class="form-group">
                        <label for="initial_budget">Initial Budget</label>
                        <input type="text" class="form-control" name="initial_budget" id="initial_budget" placeholder="Initial Budget(Ex:4000)">
                    </div>
                    <div class="form-group">
                        <label for="people">How many you want to add in your group</label>
                        <input type="text" class="form-control" name="people" id="people" placeholder="No. of people">
                    </div>
                    <button value="submit" class="btn btn-default btn-block">Next</button>
                    </form>
                </div>
            </div>
        </div>
        <?php include "include/footer.php"; ?>
    </body>
</html>