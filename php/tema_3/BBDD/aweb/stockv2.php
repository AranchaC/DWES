<?php

/* Solución al stockv1.php metiendo la consulta y actualización
 * en una sola query de la base de datos que ésta trata de forma
 * atómica.
 * Una transacción no hubiera solucionado el problema sin un bloqueo
 * de lectura: no dejar leer el stock hasta actualizarlo.
 * Dejarlo en una sola sentencia SQL tiene ese efecto, la trata como
 * una transacción, de forma atómica, pero además nadie lee el valor 
 * hasta que termina, una vez que ha empezado.
 */
 
if (isset($_POST['cantidad'])) {
	$cantidad = $_POST['cantidad'];

	if ($pdo = new PDO("mysql:dbname=frutas;host=localhost","frutero","frutero")) {
		$update = "UPDATE stock SET stock=stock-$cantidad WHERE fruta='kiwi' and stock>=$cantidad;";
		if ( ($resultado = $pdo->query($update)) != null
			&& $resultado->rowCount()>0 )	
		{
			print "Decremento OK"; 
		}
		else { print "No hay stock suficiente"; }
	 }
	 else { echo "Problema accediendo a la base de datos"; }
}

?>

<form method=POST>
<label>Cantidad:</label>
<input type=text name=cantidad>
<input type=submit value=Enviar>
</form>
<?php
echo "<b>Stock actual:</b>";
$pdo = new PDO("mysql:dbname=frutas;host=localhost","frutero","frutero"
);

 if ($consulta = $pdo->query("SELECT * from stock")) {
	 while ($registro = $consulta->fetch()) {
		 echo "<br>";
		 echo $registro["fruta"] . ":" . $registro["stock"];
	 }

 }
 else {
	 echo "Problema accediendo a la base de datos";
 }
?>
