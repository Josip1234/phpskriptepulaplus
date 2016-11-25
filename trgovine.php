<html>
<head>
	<title>Trgovine</title>
</head>
<body>
<meta charset="utf-8">
<div class="dogadaji">



<?php
include("simple_html_dom.php");

$db = mysqli_connect("mysql.hostinger.hr", "u524126283_pula",pulaplus, "u524126283_pula");
mysqli_query($db, 'TRUNCATE TABLE trgovine');
$query = mysqli_prepare($db, "INSERT INTO trgovine(naziv, kontakt, adresa) VALUES (?, ?, ?)");




$html = file_get_html("https://telefonski-imenik.cybo.com/HR/pula/du%C4%87ani-s-odje%C4%87om/");

$ducani = $html->find('.res-yo');

array_shift($ducani);

foreach ($ducani as $ducan) {
	$naziv = $ducan->find('h2[itemprop="name"]', 0)->plaintext;
	$kontakt = $ducan->find('span[itemprop="telephone"]',0)->plaintext;
	$adresa = $ducan->find('span[itemprop="streetAddress"]',0)->plaintext;

	mysqli_stmt_bind_param($query, 'sss', $naziv, $kontakt, $adresa);
	mysqli_stmt_execute($query);

	echo $naziv . "<br>\n";
	echo $kontakt . "<br>\n";
	echo $adresa . "<br>\n";


}

?>
</div>
</body>
</html>