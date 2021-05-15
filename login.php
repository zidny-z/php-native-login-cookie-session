<?php

session_start();

include("db.php");

if(isset($_POST["login"])){
    $p_username = $_POST["username"];
    $p_password = $_POST["password"];
    $p_kata = $_POST["kata"];
    // var_dump($_POST);
    $querySelect = $conn->prepare("select * from users where username='$p_username' AND password='$p_password'");
    $querySelect->execute();
    $control=$querySelect->fetch(PDO::FETCH_OBJ);
    // echo "<br>";
    // echo ($control->userID);
    // echo ($control->username);
    // echo ($control->password);
    if($control->username===$p_username && $control->password===$p_password){
        $_SESSION['username']=$p_username;
        setcookie('kata', $p_kata, time() + (86400 * 30), "/"); // 86400 = 1 hari
        header("location:index.php");
    }else{
        echo '<script>alert("Username atau Password salah!")</script>';
        // header("location:index.php");
    }
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
            <br>
            <div class="panel panel-default">
                <div class="panel-body">
                <form method="POST" >
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label for="kata">Kata Mutiara Hari Ini</label>
                        <input type="text" name="kata" id="kata" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="login" id="login" class="btn btn-info" value="Login" />
                    </div>
                </form>
            </div>
        </div>
        <br>
        <p>username : admin</p>
        <p>password : adminGanteng</p>
        </div>
    </body>
</html>