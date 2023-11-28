<?php

session_start();
//para recordar datos: 
//si recibe sesión de nombre, se pone esa variable, si no, nada.
$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : "";

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
        <p><input type="submit" name="siguiente" value="Siguiente" value=" <?php echo $nombre ?>" /></p>
    </form>
</body>

</html>