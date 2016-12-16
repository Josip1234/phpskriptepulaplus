<?php 

require_once 'db_connect.php';

$restoranId = $_POST['restoran_id'];

$sql = "SELECT * FROM restorani WHERE id = $restoranId";
$query = $connect->query($sql);
$result = $query->fetch_assoc();

$connect->close();

echo json_encode($result);

