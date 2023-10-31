<?php

include('carrito.php');

echo "<h2>Stock disponible: </h2><ol>";
foreach ($productos as $producto => $precio){
    if (isset($stock[$producto])){
        $cantidad = $stock[$producto];
        echo "<li>$producto - $precio € /ud - $cantidad uds.</li>"; 
    }
      
}
echo "</ol>";

//muestra stock

file_put_contents(RUTA_ARCHIVO, serialize($stock));

?>