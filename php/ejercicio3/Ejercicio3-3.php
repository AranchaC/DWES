<?php

session_start();

$edad = isset($_REQUEST['edad']) ? trim($_REQUEST['edad']) : "" ;

//SI SE HAN ENVIADO DATOS
if (isset($_REQUEST['enviar'])) {
    $_SESSION['edad'] = $edad;

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
<input type="number" name="edad" <?php echo $_SESSION['edad'] ?>/>
</p>
<p><input type="submit" name="terminar" value="Terminar" /></p>
</form>
<p><a href="Ejercicio3-2.php">Anterior</a>
(pierde modificaciones de esta pantalla)
</form>
</body>
</html>
