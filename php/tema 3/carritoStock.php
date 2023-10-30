<?php

include('carrito.php');

$ruta_archivo = "stock.dat";
file_put_contents($ruta_archivo, serialize($stock));
$stock = unserialize(file_get_contents($ruta_archivo));

?>