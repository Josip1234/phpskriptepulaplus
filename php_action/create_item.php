<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$item = $_POST['item'];
	$description = $_POST['description'];
	$quantity = $_POST['quantity'];
	

	$sql = "INSERT INTO items (item, description, quantity) VALUES ('$item', '$description', '$quantity')";
	$query = $connect->query($sql);

	if($query === TRUE) {			
		$validator['success'] = true;
		$validator['messages'] = "Successfully Added";		
	} else {		
		$validator['success'] = false;
		$validator['messages'] = "Error while adding  information";
	}

	// close the database connection
	$connect->close();

	echo json_encode($validator);

}