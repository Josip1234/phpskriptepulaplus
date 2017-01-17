<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("connection.php");

if(isset($_POST['Submit'])) {	
	$naziv = $_POST['naziv'];
	$mjesto = $_POST['mjesto'];
	$kontakt = $_POST['kontakt'];
	$mail = $_POST['mail'];
	$loginId = $_SESSION['id'];
		
	// checking empty fields
	if(empty($naziv) || empty($mjesto) || empty($kontakt) || empty($mail)) {
				
		if(empty($naziv)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($mjesto)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		
		if(empty($kontakt)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}

		if(empty($mail)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO restorani (naziv, mjesto, kontakt, mail, login_id) VALUES('$naziv','$mjesto','$kontakt','$mail', '$loginId')");
		
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='view.php'>View Result</a>";
	}
}
?>
</body>
</html>
