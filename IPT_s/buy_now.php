<?php
require('connection.php');
session_start();


if($_SESSION['status'] == "valid"){
    echo "<script>
        window.location.href = 'dashboard.php'
    </script>";
}

if(isset($_POST['take_order_btn'])){
    $name = $_POST['name'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $color = $_POST['color'];

    if(empty($name) || empty($model)){

    }else{
        $sql_insert_order = "INSERT INTO `orders`(`name`, `model`, `price`,`color`) VALUES ('$name','$model','$price','$color')";
        $sql_insert_con = mysqli_query($conn, $sql_insert_order);

        echo "<script>
            alert('Thank you for your order! :>')
            window.location.href = 'index.php'
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/buy_now_style.css">
    <script type="text/javascript" src="jquery/jquery-3.7.1-jquery.min.js"></script>
    <title>Take Order</title>
</head>
<body>
    <section>
        <div class="image">
            <img src="Olark.png" alt="">
        </div>
        <div class="order_form">
            <h2>Order a VAPE</h2>
            <form action="buy_now.php" method="POST">
                <div class="container">
                    <label for="name">Name</label>
                    <input type="text" name="name" required>
                </div>
                <div class="container">
                    <label for="model">Choose a MODEL</label>
                    <select name="model" required>
                        <option value="Vape1">Aegis Legend V2 MOD</option>
                        <option value="Vape2">Aegis X MOD</option>
                        <option value="Vape3">Aegis Legend MOD</option>
                        <option value="Vape4">Voopoo Drag V3 With Atomizer</option>
                    </select>
                </div>
                <div class="container">
                    <label for="price">Size and Prices </label>
                    <select name="price">
                        <option value="$55 Large">$55 (Large)</option>
                        <option value="$35 Medium">$35 (Medium)</option>
                        <option value="$20 Mini">$20 (Mini)</option>
                        
                    </select>
                </div>
                <div class="container">
                    <label for="color">Colors</label>
                    <select name="color">
                        <option value="Mint Green">Mint Green</option>
                        <option value="Sky Blue">Sky Blue</option>
                        <option value="Dark Violet">Dark Violet</option>
                        <option value="Dark Chocolate">Dark Chocolate</option>
                    </select>
                </div>
                <input type="submit" name="take_order_btn" value="Take Order">
                <a href="index.php">Cancel</a>
            </form>
        </div>
    </section>
</body>
</html>