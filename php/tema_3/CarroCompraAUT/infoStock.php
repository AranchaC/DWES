<?php

include('stock.php');
include ('check-auth.php');

//Muestro el stock disponible en una lista, el cual se va actualizando según las compras.
//aquí se muestra el nombre del producto con su precio por ud, y las unidades disponibles.
echo "<h3>Stock disponible (precios y uds): </h3><ol>";
foreach ($stock as $nombre => $unidades){
    //el precio lo cogemos del array productos.
    $precio = $productos[$nombre];
    echo "<li>$nombre ($precio € /pack): $unidades uds.</li>";       
}
echo "</ol>";
//creo enlace de cerrar sesión que dirige a logout.php:
echo "<p></p><a href=\"logout.php\">Cerrar sesión</a></p>";

?>