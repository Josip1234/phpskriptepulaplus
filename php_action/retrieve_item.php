<?php 

require_once 'db_connect.php';

$output = array('data' => array());

$sql = "SELECT * FROM items";
$query = $connect->query($sql);

$x = 1;
while ($row = $query->fetch_assoc()) {
	


	$actionButton = '
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a type="button" data-toggle="modal" data-target="#editItemModal" onclick="editItem('.$row['id'].')"> <span class="glyphicon glyphicon-edit"></span> Edit</a></li>
	    <li><a type="button" data-toggle="modal" data-target="#removeItemModal" onclick="removeItem('.$row['id'].')"> <span class="glyphicon glyphicon-trash"></span> Remove</a></li>	    
	  </ul>
	</div>
		';

	$output['data'][] = array(
		$x,
		$row['item'],
		$row['description'],
	    $row['quantity'],
		$actionButton
	);

	$x++;
}

// database connection close
$connect->close();

echo json_encode($output);