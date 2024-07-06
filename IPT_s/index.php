<?php
require('validation.php');

@$User = new MainExtends($_SESSION['user'], null);

if(@$_SESSION['status'] == "valid"){

    $_SESSION['user'] = $User->user();

    echo "<script>
        window.location.href = 'dashboard.php'
    </script>";
}else{
    $_SESSION['status'] = "";
    $_SESSION['user'] = "";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/main.css">
    <script type="text/javascript" src="js/jquery-3.7.1-jquery.min.js"></script>
    <title>Vape Cloud</title>
    <style>
    body {
            background-image: url('vape.gif');
            background-size: cover;
            background-repeat: none;
            height: 100vh;
        }
    </style>
</head>
<body>
    <nav>
        <h1><img src="" alt="">Vape Cloud</h1>
        <a href="login.php">LOG IN</a>
    </nav>
    <section>
        <img src="geekvape.jpg" alt="">
        <h2>Enjoy the brilliance of the best Vape Shop of the world!</h2>
        <a href="buy_now.php"><button class ="Take Order">Take Order</button></a>
    </section>
</body>
</html>