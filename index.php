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
		background-image: url("minimalist_art_design_ii-wallpaper-1440x900.jpg");
		text-align: left;
		margin: 0 auto;
		font-family: 'Coming Soon';
  	}
  	form{
 		margin-top: 50px;
 		margin-left: 200px;
   	}
	</style>
</head>
<body>
	<!--Encabezado-->
	<h1 align="center">Concurso de diseñadores</h1>
	<h3 align="center">Por favor, rellene el formulario</h3><br>
	<!--formulario-->
	<form method="post" action="proceso.php">
		Nombre: <input type="text" name="nombre" required><br>
		Apellido: <input type="text" name="apellido" required><br>
		<select type="button" name="nacionalidad" id="youarefrom" required>
			<option value="venezolano">V</option>
			<option value="extranjero">E</option>
		</select>
		C.I: <input type="text" name="ci" required><br>
		Fecha de Nacimiento:<input type="date" id="fecha" name="fecha" required onchange="probabilidad();"><br>
		Título de la imagen: <input type="text" name="titulo"><br>
		Descripción:<br> <textarea name="descripcion" rows="5" cols="40">Escriba una breve descripción</textarea><br>
		Imagen:<input type="file" name="imagen" required><br><br>
		<input type="submit" name="submit" value="Enviar">
	</form>
	<!--scripts-->
	<script type="text/javascript">
	function probabilidad(){
		var oblig = document.getElementById("fecha").value;
		var actual_date = new Date();
		actual_date = parseInt(actual_date.getFullYear());
		var year;
		year = parseInt(oblig.substr(0,4));
		if(year>1868){ 						//Una persona no puede tener más de 150 años
			edad = (actual_date-year);
			if (edad>=20){
				if (edad<=25){
					alert("Tienes 10% más probabilidad de ganar");
				}
			}
		}
	}	
	</script>
</body>
</html>