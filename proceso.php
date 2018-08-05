<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href='https://fonts.googleapis.com/css?family=Clicker Script' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Coming Soon' rel='stylesheet'>
	<title>Concurso para diseñadores</title>
	<style type="text/css">
	h1{
		font-style: italic;
		font-family: 'Clicker Script';
		font-size: 70px;
	}
	body{
		background-image: url("122265929.jpg");
		text-align: center;
		margin: 0 auto;
		font-family: 'Coming Soon';
	}
	</style>
</head>
<body>
	<h1 align="center">¡Gracias por participar!</h1>
<?php

$name = $_POST["nombre"];
$lname = $_POST["apellido"];
$nac = $_POST["nacionalidad"];
$ci = $_POST["ci"];
$date = $_POST["fecha"];
$title = $_POST["titulo"];
$description = $_POST["descripcion"];
$photo = $_POST["imagen"];
$prob_total = 0;
probabilidades();

if($name && $lname && $nac && $ci && $date){
	mysql_connect("localhost", "root", "") or die("No connection");
	mysql_select_db("orugastudio");
	mysql_query("INSERT INTO participantes(nombre, apellido, nacionalidad, ci, fechan) VALUES('$name', '$lname', '$nac', '$ci', '$date')");
	mysql_query("INSERT INTO imagen(imagenombre, imagendescrip, archivo) VALUES('$title', '$description', '$photo')");

	//calcular numero id del participante
	$resultado = mysql_query("SELECT id FROM participantes ORDER BY id DESC LIMIT 0,1");
	$row = mysql_fetch_array($resultado);
	echo "<strong>Eres el participante número ".$row['id'];
	echo " y tienes ".$prob_total."% de probabilidades de ganar </strong>";
}else{
	echo "Hay algo mal";
}
	function probabilidades(){
		global $prob_total, $nac, $title, $description, $date;
		$edad = intval(substr($date, 0, 4));
		$today = getdate();
		$today = intval($today['year']);
		$edad = $today-$edad;
		if ($edad>=20) {
			if ($edad<=25) {
				$prob_total = 10;
			}
		}
		if($nac=="venezolano"){
			$prob_total = $prob_total+10;
		}
		if ($title && $description) {
			$prob_total = $prob_total+10;
		}
		return $prob_total;
	}
mysql_close();
?>
</body>
</html>