<!DOCTYPE html>
<html>
<head>

<title>Assignment 1</title>
<?php
    include 'app.php';
?>
</head>
<body>
    <header>
        <h1>Enhörningar</h1>
        <hr>
    </header>
    <div id="wrapper">
        <h3>Id på enhörning</h3>
        <form action="index.php">
            <input type="search" name="id" placeholder="id">
            <br/>
            <input type="Submit" name="oneUnicorn" value="Visa Enhörning">
            <input type="Submit" name="allUnicorns" value="Visa alla enhörningar">
        </form>
        <?php
            if(isset($oneUnicorn)){
                    foreach($oneUnicorn as $key => $value){
                        if($key != 'spottedWhere'){
                            echo $key, ': ',  $value, '<br/>';
                        }
                    }
                    echo '<br/>';

            } elseif(isset($allUnicorns)) {
                foreach($allUnicorns as $unicorn){
                    foreach($unicorn as $key => $value){
                        if($key != 'spottedWhere'){
                            echo $key, ': ',  $value, '<br/>';
                        }
                        
    
                    }
                    echo '<br/>';
                }
            } elseif(isset($errorMessage)){
                echo "<p>", $errorMessage ,"</p>";
            }
            

        ?>
    </div>
</body>
</html>