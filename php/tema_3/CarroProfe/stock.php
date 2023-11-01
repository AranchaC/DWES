<?php
define ('RUTA_ARCHIVO_STOCK',"stock.data");
$productos = array( "platanos" => 3, "fresas" => 6, "kiwis" => 4 );
// intento leer el archivo
if (!file_exists(RUTA_ARCHIVO_STOCK) || !($stock = unserialize(file_get_contents(RUTA_ARCHIVO_STOCK)))) {
    // si falla la lectura del stock genero uno por defecto y lo grabo a disco
    echo "Error leyendo archivo";
    $stock = array( "platanos" => 0, "fresas" => 0, "kiwis" => 0 );
    file_put_contents(RUTA_ARCHIVO_STOCK,serialize($stock));
}
?>

