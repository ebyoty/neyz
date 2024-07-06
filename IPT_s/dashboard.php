<?php 
require('connection.php');
require('validation.php');

$UserLogout = new MainExtends(null,null);
$UserLogout->logout();

if($_SESSION['status'] == "invalid" || $_SESSION['status'] == ""){
    echo "<script>
        window.location.href = 'index.php'
    </script>";
}else{
    $_SESSION['status'] == "valid";
    
}

if(isset($_POST['logout'])){
    $_SESSION['status'] = "invalid";
}

if(isset($_POST['delete_order'])){
    $order_id = $_POST['order_id'];
    $sql_delete_order = "DELETE FROM orders WHERE id = $order_id";
    mysqli_query($conn, $sql_delete_order);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="css/dashboard.css">
    <title>Dashboard - VapeCloud</title>
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
        <h1><img src="assets/coffee-cup.png" alt="">Vape Cloud</h1>
        <form action="dashboard.php" method="POST">
            <?php 
                if($_SESSION['user'] == "admin"){
                    echo "<a href='add_staff.php'>ADD STAFF</a>";
                }
            ?>
            <input type="submit" value="LOG OUT" name="logout">
        </form>
    </nav>
    <section>
        <h1>List of Vape Orders</h1>
        <div class="order_list">
            <table>
                <tr>
                    <th>Name</th>
                    <th>Model</th>
                    <th>Price</th>
                    <th>Color</th>
                    <th>Order Date</th>
                    <th>Actions</th>
                </tr>
                <?php
                $sql_all_orders = "SELECT * FROM orders ORDER BY order_date DESC";
                $sql_all_con = mysqli_query($conn, $sql_all_orders);
                $rows = $sql_all_con->fetch_all(MYSQLI_ASSOC);

                $data = "";

                foreach($rows as $element){
                    $id = $element["id"];
                    $name = $element["name"];
                    $model = $element["model"];
                    $price = $element["price"];
                    $color = $element["color"];
                    $order_date = $element["order_date"];

                    $data .= "<tr>
                                <td>$name</td>
                                <td>$model</td>
                                <td>$price</td>
                                <td>$color</td>
                                <td>$order_date</td>
                                <td>
                                    <form action='dashboard.php' method='POST' style='display:inline-block;'>
                                        <input type='hidden' name='order_id' value='$id'>
                                        <input type='submit' name='delete_order' value='Delete' class='delete-button'>
                                    </form>
                                    <button id='complete' type='button' class='complete-button' onclick='completeOrder($id)'>Complete</button>
                                </td>
                            </tr>";
                }

                echo $data;
                ?>
            </table>
        </div>
    </section>

<script type="text/javascript" src="js/jquery-3.7.1-jquery.min.js"></script>
<script src="dashboard.js"></script>
<script>
function completeOrder(orderId) {
    alert('Order ' + orderId + ' marked as complete');
}
</script>
</body>
</html>
