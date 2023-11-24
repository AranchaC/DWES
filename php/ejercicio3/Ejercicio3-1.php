<?php

session_start();

$nombre = isset($_REQUEST['nombre']) ? trim($_REQUEST['nombre']) : "" ;

$_SESSION["nombre"] = $nombre;

?>

<html>
<head>
<title>Ejercicio 3.1</title>
</head>
<body>
<h1>Ejercicio 3 Etapa 1</h1>
<form action="Ejercicio3-2.php">
<p>
<label for="nombre">Nombre:</label>
<input type="text" name="nombre" />
</p>
<p><input type="submit" name="siguiente" value="Siguiente" 
    value=" <?php echo isset($_POST['nombre']) ? $_POST['nombre'] : '' ?>" /></p>
</form>
</body>
</html>
