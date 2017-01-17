<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$naziv = $_POST['naziv'];
	$mjesto = $_POST['mjesto'];
	$kontakt = $_POST['kontakt'];	
	$mail= $_POST['mail'];
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
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE restorani SET naziv='$naziv', mjesto='$mjesto', kontakt='$kontakt', mail='$mail' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: view.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM restorani WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$naziv = $res['naziv'];
	$mjesto = $res['mjesto'];
	$kontakt = $res['kontakt'];
	$mail = $res['mail'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a> | <a href="view.php">View Products</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Naziv</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Mjesto</td>
				<td><input type="text" name="qty" value="<?php echo $qty;?>"></td>
			</tr>
			<tr> 
				<td>Kontakt</td>
				<td><input type="text" name="price" value="<?php echo $price;?>"></td>
			</tr>
			<tr> 
				<td>Mail</td>
				<td><input type="text" name="price" value="<?php echo $price;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
