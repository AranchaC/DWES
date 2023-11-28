<?php
$nombre = $_REQUEST["nombre"] ? $_REQUEST["nombre"] : "";
$ciudad = $_REQUEST["ciudad"] ? $_REQUEST["ciudad"] : "";

?>

<html>

<head>
    <title>Ejercicio 2.3</title>
</head>

<body>
    <h1>Ejercicio 2 Etapa 3</h1>
    <form action="Ejercicio2-fin.php">
        <p>
            <label for="edad">Edad:</label>
            <input type="number" name="edad" />
        </p>
        <p><input type="submit" name="terminar" value="Terminar" /></p>
        <input type="hidden" name="nombre" value="<?php echo $nombre ?>">
        <input type="hidden" name="ciudad" value="<?php echo $ciudad ?>">
    </form>
    </form>
</body>

</html>