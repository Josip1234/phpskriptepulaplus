<?php 

require_once 'db_connect.php';

$output = array('success' => false, 'messages' => array());

$restoranId = $_POST['restoran_id'];

$sql = "DELETE FROM restorani WHERE id = {$restoranId}";
$query = $connect->query($sql);
if($query === TRUE) {
	$output['success'] = true;
	$output['messages'] = 'Successfully removed';
} else {
	$output['success'] = false;
	$output['messages'] = 'Error while removing information';
}

// close database connection
$connect->close();

echo json_encode($output);