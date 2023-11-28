<?php
$nombre = $_REQUEST["nombre"] ? $_REQUEST["nombre"] : "";

?>

<html>
    <head>
        <title>Ejercicio 2.2</title>
    </head>
    <body>
        <h1>Ejercicio 2 Etapa 2</h1>
        <form action="Ejercicio2-3.php">
            <p>
            <label for="ciudad">Ciudad:</label>
            <input type="text" name="ciudad" />
            </p>
            <p><input type="submit" name="siguiente" value="Siguiente" /></p>
            <input type="hidden" name="nombre" value="<?php echo $nombre ?>">
        </form>
    </body>
</html>
