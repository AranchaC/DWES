<?php

include('stock.php');

echo "<h3>Stock disponible (precios y uds): </h3><ol>";
foreach ($productos as $producto => $precio){
    if (isset($stock[$producto])){
        $cantidad = $stock[$producto];
        echo "<li>$producto ($precio € /ud): $cantidad uds.</li>"; 
    }
      
}
echo "</ol>";

//muestra stock


?>