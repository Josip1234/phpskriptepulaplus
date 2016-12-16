<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$naziv = $_POST['naziv'];
	$mjesto = $_POST['mjesto'];
	$kontakt = $_POST['kontakt'];
	$mail = $_POST['mail'];
	

	$sql = "INSERT INTO restorani (naziv, mjesto, kontakt, mail) VALUES ('$naziv', '$mjesto', '$kontakt', '$mail')";
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