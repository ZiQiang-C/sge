<?php 
require('check_login.php');
//print_r($_COOKIE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <?php  
        if(isset($_COOKIE["idioma"])){
            echo  $_COOKIE["idioma"]== "eng" ?  "welcome" : "bienvenido";
        }else{
            echo "no hay cookier";
        }
    ?>
    <h1>BIENVENIDO!!!</h1>
    <a href="golfers.php">GOLFISTAS</a>
</body>
</html>