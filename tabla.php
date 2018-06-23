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
	<nav class="arriba" id="barra_nav">
		<!-- logo -->
		<!--<a href="index.php"><img src="img/logo.jpg" class="logo"></a>-->

		<!-- Menu -->
		<nav class="navbar">
			<a href="index.php" name="inicio">Formulario</a>
			<a href="tabla.php" name="registro">Tablas</a>
		</nav>
	</nav>

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

		$sql1       = 'SELECT * FROM USUARIOS WHERE estado = 1';
		$sql2       = 'SELECT * FROM USUARIOS WHERE estado = 2';
		$sql3       = 'SELECT * FROM USUARIOS WHERE estado = 3';

	?>
	<!-- Tablas para mostrar datos de la base de datos -->
	<div class="tablas">
	<h3>Usuarios Activos</h3>
	<table style="text-align:center">
        <tr>
            <th>Email</th>
            <th>Nombre</th>
            <th>Apellido</th>
        </tr>
        <?php
		if ($resultado = mysqli_query($enlace, $sql1)) {		    
		    while ($row = mysqli_fetch_assoc($resultado)) {
        ?>
		<tr>
			<td><?php echo $row["email"]; ?></td>
			<td><?php echo $row["nombre"]; ?></td>
			<td><?php echo $row["apellido"];?></td>
		</tr>
        <?php
    		} //fin while
		/* liberar el conjunto de resultados */
		mysqli_free_result($resultado);
		} //fin if
		?>
	</table>
	<br>
	<h3>Usuarios Inactivos</h3>
	<table style="text-align:center">
        <tr>
            <th>Email</th>
            <th>Nombre</th>
            <th>Apellido</th>
        </tr>
        <?php
		if ($resultado = mysqli_query($enlace, $sql2)) {		    
		    while ($row = mysqli_fetch_assoc($resultado)) {
        ?>
		<tr>
			<td><?php echo $row["email"]; ?></td>
			<td><?php echo $row["nombre"]; ?></td>
			<td><?php echo $row["apellido"];?></td>
		</tr>
        <?php
    		} //fin while
		/* liberar el conjunto de resultados */
		mysqli_free_result($resultado);
		} //fin if
		?>
	</table>
	<br>
	<h3>Usuarios en Espera</h3>
	<table style="text-align:center">
        <tr>
            <th>Email</th>
            <th>Nombre</th>
            <th>Apellido</th>
        </tr>
        <?php
		if ($resultado = mysqli_query($enlace, $sql3)) {		    
		    while ($row = mysqli_fetch_assoc($resultado)) {
        ?>
		<tr>
			<td><?php echo $row["email"]; ?></td>
			<td><?php echo $row["nombre"]; ?></td>
			<td><?php echo $row["apellido"];?></td>
		</tr>
        <?php
    		} //fin while
		/* liberar el conjunto de resultados */
		mysqli_free_result($resultado);
		} //fin if
		?>
	</table>
	</div>
    <?php		
		mysqli_close($enlace);
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