<?php
define('HOST','mysql.hostinger.hr'); // change your IP address or Default enter as localhost
define('USER','u524126283_pula');  // change your user name
define('PASS','pulaplus');  // change your Password
define('DB','u524126283_pula'); // change your Database Name
$con = mysqli_connect(HOST,USER,PASS,DB);
$sql = "select * from dog";
$res = mysqli_query($con,$sql);
$result = array();
while($row = mysqli_fetch_array($res)){
array_push($result,
array('naziv'=>$row[1],'adresa'=>$row[3],'vrijeme_odrzavanja'=>$row[2]));
}
echo json_encode(array("dog"=>$result));
mysqli_close($con);
?>