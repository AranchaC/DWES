<?php

session_start();
$ciudad = isset($_REQUEST['ciudad']) ? trim($_REQUEST['ciudad']) : "";
$_SESSION['ciudad'] = $ciudad;

$edad = isset($_REQUEST['edad']) ? trim($_REQUEST['edad']) : "";

if (isset($_REQUEST["ciudad"])) {
    $_SESSION["ciudad"] = $_REQUEST["ciudad"];
}


?>

<html>

<head>
    <title>Ejercicio 3.1</title>
</head>

<body>
    <h1>Ejercicio 3 Etapa 3</h1>
    <form action="Ejercicio3-fin.php">
        <p>
            <label for="edad">Edad:</label>
            <input type="number" name="edad" <?php ?> />
        </p>
        <p><input type="submit" name="terminar" value="Terminar" /></p>
    </form>
    <p><a href="Ejercicio3-2.php">Anterior</a>
        (pierde modificaciones de esta pantalla)
        </form>
</body>

</html>