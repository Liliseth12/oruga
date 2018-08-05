<?php
	mysql_connect("localhost", "root", "") or die("No connection");
	mysql_select_db("orugastudio");
	$resultado = mysql_query("SELECT * FROM participantes");

	while($row = mysql_fetch_array($resultado)){
		echo $row['id']." ".$row['nombre']." ".$row['apellido'];
	}
mysql_close();
?>