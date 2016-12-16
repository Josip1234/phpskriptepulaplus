<?php 

require_once 'db_connect.php';

$itemId = $_POST['item_id'];

$sql = "SELECT * FROM items WHERE id = $itemId";
$query = $connect->query($sql);
$result = $query->fetch_assoc();

$connect->close();

echo json_encode($result);