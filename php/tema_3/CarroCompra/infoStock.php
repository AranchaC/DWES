<?php

include('stock.php');

//Muestro el stock disponible en una lista, el cual se va actualizando según las compras.
//aquí se muestra el nombre del producto con su precio por ud, y las unidades disponibles.
echo "<h3>Stock disponible (precios y uds): </h3><ol>";
foreach ($stock as $nombre => $unidades){
    //el precio lo cogemos del array productos.
    $precio = $productos[$nombre];
    echo "<li>$nombre ($precio € /ud): $unidades uds.</li>";       
}
echo "</ol>";

?>