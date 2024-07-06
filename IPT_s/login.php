<?php

if(isset($_POST['login_btn'])){
    require('validation.php');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $UserLogin = new MainClass($username, $password);
    $UserLogin->login();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/login_style.css">
    <script type="text/javascript" src="js/jquery-3.7.1-jquery.min.js"></script>
    <title>Admin Page</title>
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
    <section class="login">
        <h2>Admin Page</h2> 
        <form action="login.php" method="POST" class="login_form">
            <label for="username">Username</label>
            <input type="text" name="username" required>
            <label for="password">Password</label>
            <input type="password" name="password" required>
            <input type="submit" name="login_btn" value="Log In">
            <a href="index.php">Back</a>
        </form>
    </section>
</body>
</html>
