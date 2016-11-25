<html>
<head>
	<title>Dogadaji</title>
</head>
<body>
<div class="dogadaji">



<?php
include("simple_html_dom.php");
$db = mysqli_connect("mysql.hostinger.hr", "u524126283_pula", pulaplus, "u524126283_pula");
mysqli_query($db, 'TRUNCATE TABLE dog');
$query = mysqli_prepare($db, "INSERT INTO dog (naziv, vrijeme_odrzavanja, adresa) VALUES (?, ?, ?)");



$html = file_get_html("http://www.istra.hr/hr/regije-i-mjesta/pula-medulin/kalendar-dogadanja?filterPojam=&filterCity1=7&filterCity=&filterRegion=7&filterVrste=&datum_pocetka=&datum_zavrsetka=&search=Tra%C5%BEi");

$dog = $html->find('.itemEvent');

array_shift($dog);



foreach ($dog as $dogad) {
	$naziv = $dogad->find('h3', 0)->plaintext;
	$vrijeme_odrzavanja = $dogad->find('p.itemDateTime',0)->plaintext;
	$adresa = $dogad->find('p',1)->plaintext;

	mysqli_stmt_bind_param($query, 'sss', $naziv, $vrijeme_odrzavanja, $adresa);
	mysqli_stmt_execute($query);

	echo $naziv . "<br>\n";
	echo $vrijeme_odrzavanja . "<br>\n";
	echo $adresa . "<br>\n";
}

?>
</div>
</body>
</html>