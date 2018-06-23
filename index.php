<?php	
$datos_archivo_validos = file_get_contents('./valido.txt');
$datos_archivo_invalidos = file_get_contents('./invalido.txt');

?>

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
	<!-- Mostrando el contenido del archivo 	
	<?php echo $datos_archivo_validos; ?>-->	

	<h4>GEMA SAS</h4>
	<div class="container">		
		<form action="enviar.php" method="POST"  enctype='multipart/form-data' id="form-id-subir">
		<label> Cargar archivo</label>
		<br>
		<input name="archivo_subir" type="file" id="archivo_subir" />
		<br>
	  <input type="submit" name="submit" id="archivo" value="Subir" ">
		<br>
	</form>	 
	</div>

	<?php
		//array mysqli_fetch_assoc ( mysqli_result $result );
		if (!$enlace = mysqli_connect('localhost', 'usuario1', '1234', 'prueba_php')) {
			echo 'No pudo conectarse a mysql';
			exit;
		}
		if (!mysqli_select_db($enlace, 'prueba_php')) {
			echo 'No pudo seleccionar la base de datos';
			exit;
		}

	?>
	
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