<!DOCTYPE html>
<html>
<head>

<title>Assignment 1</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<?php
    include 'app.php';
?>
</head>
<body>
    <div id="wrapper" class="container-fluid">
        <header>
            <h1>Enhörningar</h1>
            <hr>
        </header>
    
        <h3>Id på enhörning</h3>
        <form action="index.php">
        <div class="form-group ">
            <input type="search" name="id" placeholder="id" class="form-control">
            <br/>
            <input type="Submit" name="oneUnicorn" value="Visa Enhörning" class="btn btn-primary">
            <input type="Submit" name="allUnicorns" value="Visa alla enhörningar" class="btn btn-success">
        </div>
        </form>
        <?php
            if(isset($allUnicorns)) {
                echo '<h2>Alla enhörningar</h2>';
                foreach($allUnicorns as $unicorn){
                    echo '<form action="index.php">', 
                        "<p>" , $unicorn->{'id'} , 
                        '<input type="hidden" name="id" value="', $unicorn->{'id'} , '">' ,
                        ": " , $unicorn->{'name'} ,
                        '<input type="Submit" name="oneUnicorn" value="Läs mer..."' ,
                        'class="btn btn-default pull-right"></form>';
                    echo '<hr>';
                }
            }
        ?>
        </form>
        <hr>
        <?php
            if(isset($oneUnicorn)){
                    echo '<div class="col-sm-8"><h2>' , $oneUnicorn->{'name'} , '</h2>', '<p>' ,
                        date('Y-m-d', strtotime($oneUnicorn->{'spottedWhen'})), '</br>' ,
                        $oneUnicorn->{'description'},  '</p>' ,
                        '<b>Rapporterad av: </b>', $oneUnicorn->{'reportedBy'}, '</br></div>' ,
                        '<div class="col-sm-4"><img src="',
                        $oneUnicorn->{'image'}, '" alt="unicorn" style="width: 100%;">';
                    
                    echo '<br/>';

            } elseif(isset($errorMessage)){
                echo "<p>", $errorMessage ,"</p>";
            }
            

        ?>
    </div>
</body>
</html>