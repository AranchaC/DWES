<?php

include "stock.php";

echo "<p>Precios:</p><ol>";
foreach ($productos as $producto => $precio) {
	echo "<li>$producto - $precio</li>";
}
echo "</ol>";
echo "<p>Stock:</p><ol>";
foreach ($stock as $producto => $cantidad) {
	echo "<li>$producto - $cantidad</li>";
}
echo "</ol>";

if (file_put_contents(RUTA_ARCHIVO_STOCK,serialize($stock))>0) {
	echo "Stock grabado en disco correctamente, archivo: " . RUTA_ARCHIVO_STOCK;
} else {
	echo "Problemas al grabar el stock a disco " . RUTA_ARCHIVO_STOCK;
}

?>
