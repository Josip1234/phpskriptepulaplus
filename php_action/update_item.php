<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$id = $_POST['item_id'];
	$item=$_POST['editItem'];
	$description = $_POST['editDescription'];
	$quantity = $_POST['editQuantity'];


	$sql = "UPDATE items SET item='$item', description = '$description', quantity = '$quantity'  WHERE id = $id";
	$query = $connect->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Successfully Added";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Error while adding the information";
	}

	// close the database connection
	$connect->close();

	echo json_encode($validator);

}