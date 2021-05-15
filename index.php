<?php

session_start();

if(!isset($_SESSION['username'])){
    header('location:logout.php');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     </head>
    <body>
        <br />
        <div class="container">
            <div align="right">
                <a href="logout.php" class="btn btn-info">Logout</a>
            </div>
            <br>
            <h2>Hai kakak <?php echo $_SESSION['username']. ", ". $_COOKIE["kata"]." :)";?></h1>
            <img src="aopalah.png" class="img-fluid" alt="Responsive image">
        </div>
    </body>
</html>