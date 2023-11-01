<?php
session_start();
$productos = array( "platanos" => 3, "fresas" => 6, "kiwis" => 4 );
?>


<html>
<body>
<form method="POST">

<?php
 foreach ($productos as $producto => $precio) {
	 echo "<p><label for=\"$producto\">$producto ($precio)</label>";
	 echo "<input type=\"number\" name=\"$producto\" /></p>";
 }

?>

<input type="submit" name="actualizar" value="Actualizar" />
</form>
<?php
 if (isset($_POST["actualizar"])) {
    echo "<p>Estado del carrito:</p>";
    foreach($productos as $producto => $precio) {
        $valor = $_SESSION["$producto"] ?? 0;
        $valor = $valor + (intval($_POST["$producto"]) ?? 0);
        echo "<p>$producto : $valor</p>";
        $_SESSION[$producto] = $valor;

        
    }


 }
?>


</body>
</html>
