<?php 

require_once 'db_connect.php';

$output = array('success' => false, 'messages' => array());

$itemId = $_POST['item_id'];

$sql = "DELETE FROM items WHERE id = {$itemId}";
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