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
<input type=input name=nombre>
<br>
<label>Contraseña:</label>
<input type=password name=contrasena>
<br>
<input type=submit value=\"Enviar\">
</form>
";
} // muestraFormulario

?>
