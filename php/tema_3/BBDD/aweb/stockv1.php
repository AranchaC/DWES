<?php

/*
 * Prueba de concepto de programa que consulta una base de datos
 * y resta un stock solo si hay existencias.
 * El tiempo entre ver si hay existencias y restar deja la posibilidad
 * de que otras peticiones hagan lo mismo y terminen restando
 * de más. Ejemplo:
 * - tres peticiones hacen la consulta y el stock que leeen es 3
 * - las tres restan 3, con lo cual dejan el stock en -6
 */

 $pdo = new PDO("mysql:dbname=frutas;host=localhost","frutero","frutero");
 $query1 = "SELECT stock from stock where fruta='kiwi' and stock>=3";
 $query2 = "UPDATE stock SET stock=stock-3 WHERE fruta='kiwi';";

 if ($resultado = $pdo->query($query1)) {
//		 echo $registro["fruta"] . ":" . $registro["stock"];
	$registro = $resultado->fetch();
	if ($registro) { 
		$resultado = $pdo->query($query2);
		if ($resultado) {
			echo "Decremento correcto";
		}
		else {
			echo "Problemas";
		}
	}
	else { print "No hay stock suficiente"; }
 }
 else {
	 echo "Problema accediendo a la base de datos";
 }


?>


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
