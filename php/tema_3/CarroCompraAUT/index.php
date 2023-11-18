<?php

//Include con stock.php que es donde están las variables generales.
include('stock.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
<h1>CROQUETERÍA CHICHARRO</h1>
        <h3>Acceso: </h3>
</body>
</html>

<?php
// Se verifica si la variable 'redir' está presente en la URL, indicando mensaje de error.
if (isset($_REQUEST["redir"])) { 
   echo "<p>Nombre o contraseña incorrectos.</p>";
}

// Se llama a la función 'muestraFormulario' con la URL 'auth.php' como parámetro.
muestraFormulario("auth.php");
?>

<?php
// Definición de la función 'muestraFormulario' que imprime un formulario de inicio de sesión.
function muestraFormulario($url) {
 echo "
<form method=POST action=\"$url\">
<label>Nombre:</label>
<input type=input name=nombre required>
<br>
<label>Contraseña:</label>
<input type=password name=contrasena required>
<br>
<input type=submit value=\"Enviar\">
</form>
";
} // muestraFormulario

?>
