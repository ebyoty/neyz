<?php 
require('connection.php');
$id = $_POST['id'];

$sql_delete = "DELETE FROM `orders` WHERE `id`='$id'";
$sql_delete_con = mysqli_query($conn, $sql_delete);

?>

