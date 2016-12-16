<?php 

require_once 'db_connect.php';

//if form is submitted
if($_POST) {	

	$validator = array('success' => false, 'messages' => array());

	$id = $_POST['restoran_id'];
	$naziv = $_POST['editNaziv'];
	$mjesto = $_POST['editMjesto'];
	$kontakt = $_POST['editKontakt'];
	$mail = $_POST['editMail'];
	

	$sql = "UPDATE restorani SET naziv='$naziv', mjesto = '$mjesto', kontakt = '$kontakt',  mail = '$mail',  WHERE id = $id";
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