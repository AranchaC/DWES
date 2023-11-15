<?php
session_start();

$frutas = [];

$pdo = new PDO("mysql:dbname=frutas;host=localhost","frutero","frutero");

if ($consulta = $pdo->query("SELECT * from stock")) {
	 while ($registro = $consulta->fetch()) {
		$fruta = $registro["fruta"];
		$stock = $registro["stock"];
		$almacen[$fruta] = $stock;
		array_push($frutas,$fruta);
	 }
}
else {
	 die("Problema accediendo a la base de datos");
}

foreach ($frutas as $fruta) {
 if (! isset($_SESSION["$fruta"])) $_SESSION["$fruta"] = 0;
}

if (isset($_REQUEST["enviar"]) || isset($_REQUEST["finalizar"])) {
	foreach ($frutas as $fruta) {
		if ($_REQUEST["$fruta"] == "") {
			$_REQUEST["$fruta"] = 0;
		}
		$_SESSION["$fruta"] += $_REQUEST["$fruta"];
	}
}


if (isset($_REQUEST["finalizar"])) {
 $sentencia = $pdo->prepare("UPDATE stock SET stock=stock-:restaStock WHERE fruta=:fruta AND stock>=:restaStock");
 $sentencia->bindParam(':restaStock', $valor);
 $sentencia->bindParam(':fruta', $nombre);

 foreach ($frutas as $fruta) {
  if ($_SESSION["$fruta"] >0) {
	$nombre = $fruta;
	$valor = $_SESSION["$fruta"];
	$sentencia->execute();
	if ($sentencia->rowCount()==0) {
		echo "<br>No se pudieron comprar las $fruta por falta de stock";
	}
	else {
		echo "<br> " . $_SESSION["$fruta"] . " " . "$fruta compradas correctamente";
		$almacen["$fruta"] -= $_SESSION["$fruta"];
	}

	$_SESSION["$fruta"] = 0;

  } // if session

 } // foreach
} // if isset finalizar
?>

<html>
<body>
<form method=POST>

<?php

foreach ($frutas as $fruta) {
?>

	<label><?=$fruta?></label><input type=number name=<?=$fruta?> max=
<?= $almacen["$fruta"] ?>
 />
<br>

<?php
} // foreach
?>
<input type=submit name=enviar value="Actualizar carrito" />
<input type=submit name=finalizar value="Finalizar compra" />
</form>
<br>
<ul>
<?php
if (isset($_REQUEST["enviar"])) {
  echo "<p>Estado carrito:</p>";
  foreach ($frutas as $fruta) {
	  echo "$fruta: " . $_SESSION["$fruta"] . "<br>";
  }
}
echo "<p>Stock actual:</p><ul>";
	 foreach ( $almacen as $clave => $valor) {
		 echo "<li>$clave : $valor</li>";
	 }
echo "</ul>";


?>
</ul>
</body>
</html>

