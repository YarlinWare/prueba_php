<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link rel="stylesheet" type="text/css" href="css/formulario.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Bungee+Inline|Inconsolata|Baloo+Bhaina|Fjalla+One">
	<title>Prueba PHP</title>
</head>
<body>
	<nav id="barra_nav">
		<!-- logo -->
		<!--<a href="index.php"><img src="img/logo.jpg" class="logo"></a>-->

		<!-- Menu -->
		<nav class="navbar">
			<a href="index.php" name="inicio">Formulario</a>
			<a href="tabla.php" name="registro">Tablas</a>
		</nav>
	</nav>


<?php
$archivo = $_FILES['archivo_subir']['tmp_name'];

if($archivo != ""){
	$file_contents = file_get_contents($archivo);
	
	$conteo = 1;
	$mensaje = "";
	
	$arr_lines = explode("\n", $file_contents);
	foreach($arr_lines as $line){
		$arr_columns = explode(',', $line);
		if(empty($arr_columns[0]) == 1)
			$mensaje .= "Línea ".$conteo.": no posee correo. \n";
		if(empty($arr_columns[1]) == 1)
			$mensaje .= "Línea ".$conteo.": no posee nombre. \n";
		if(empty($arr_columns[2]) == 1)
			$mensaje .= "Línea ".$conteo.": no posee apellido. \n";
		if(empty($arr_columns[3]) == 1)
			$mensaje .= "Línea ".$conteo.": no posee código. \n";
		$conteo++;
	}
	
	if($mensaje != "")
		echo $mensaje;
	else{
		foreach($arr_lines as $line){
			$arr_columns = explode(',', $line);
			
			$email = $arr_columns[0];
			$nombr = $arr_columns[1];
			$apell = $arr_columns[2];
			$estado = $arr_columns[3];
			
			if (!$enlace = mysqli_connect('localhost', 'usuario1', '1234', 'prueba_php')) {
			echo 'No pudo conectarse a mysql';
			exit;
		}
		if (!mysqli_select_db($enlace, 'prueba_php')) {
			echo 'No pudo seleccionar la base de datos';
			exit;
		}

			$sql22 = 'INSERT INTO USUARIOS (email, nombre, apellido, estado)'
						  .'VALUES ("'.$email.'", "'.$nombr.'", "'.$apell.'", '.$estado.')';
			$resultado22 = mysqli_query($enlace, $sql22);					
		}
		header('Location: index.php');
	}
}

?>

	<form action="index.php" >
		<br>
		<input type="submit" name="submit"  value="Volver" >
		<br>
	</form>
	<br><br>
	<footer>
		<br>
		<center>
        <div class="pie_de-pagina">              
        	<p class="texto_cantactenos">Nuestra oficina</p>
        		<ul class="cont_cantactenos">
        			<li>Calle 74 No. 11-91, Bogot&aacute;, Colombia</li>
					<li>+(57 1) 5550325 - 5550326 - 2861766</li>
					<li>L&iacute;nea de atenci&oacute;n 01 8000 913082</li>
					<li>Lunes a Viernes</li>
					<li>8:00am a 5:00pm Jornada continua</li>
				</ul>
		</div>			
		<br>
		</center>
	</footer>
</body>
</html>