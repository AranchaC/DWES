<?php

session_start();

$ciudad = isset($_REQUEST['ciudad']) ? trim($_REQUEST['ciudad']) : "" ;

//SI SE HAN ENVIADO DATOS
if (isset($_REQUEST['enviar'])) {
    $_SESSION['ciudad'] = $ciudad;

}





?>




<html>
<head>
<title>Ejercicio 3.1</title>
</head>
<body>
<h1>Ejercicio 3 Etapa 1</h1>
<form action="Ejercicio3-3.php">
<p>
<label for="ciudad">Ciudad:</label>
<input type="text" name="ciudad" value=
    "<?php echo isset($_POST['ciudad']) ? $_POST['ciudad'] : '' ?>"/>
</p>
<p><input type="submit" name="siguiente" value="Siguiente" /></p>
</form>
<p><a href="Ejercicio3-1.php">Anterior</a>
(pierde modificaciones de esta pantalla)
</form>
</body>
</html>
