<?php

 $pdo = new PDO("mysql:dbname=frutas;host=localhost","frutero","frutero");

 if ($consulta = $pdo->query("SELECT * from stock")) {
	 while ($registro = $consulta->fetch()) {
		 echo $registro["fruta"] . ":" . $registro["stock"];
		 echo "<br>";
	 }

 }
 else {
	 echo "Problema accediendo a la base de datos";
 }

?>
