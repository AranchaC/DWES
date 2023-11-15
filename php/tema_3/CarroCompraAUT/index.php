<?php

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
if (isset($_REQUEST["redir"])) { 
   echo "<p>Nombre o contraseña incorrectos.</p>";
}
muestraFormulario("auth.php");
?>

<?php
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
