
<?php

//defino constante llamada RUTA_ARCHIVO que contiene el archivo donde almacenaré el stock:
define('RUTA_ARCHIVO', "stock.txt");

//array de productos con precio para comprar:
$productos = array(
    "jamón" => 5,
    "calabaza" => 4,
    "pollo" => 3,
    "bacalao" => 5,
    "gambas" => 4,
    "setas" => 3,
    "espinacas" => 2
);

// Si el archivo no existe, o no se puede cargar, crea uno por defecto
if (!file_exists(RUTA_ARCHIVO) || !($stock = unserialize(file_get_contents(RUTA_ARCHIVO)))) {
    // Genera array de stock con uds por defecto y lo grabo en disco:
    $stock = array(
        "jamón" => 10,
        "calabaza" => 15,
        "pollo" => 20,
        "bacalao" => 25,
        "gambas" => 30,
        "setas" => 35,
        "espinacas" => 40
    );
    file_put_contents(RUTA_ARCHIVO,serialize($stock));
}
///
// Ahora, $stock contiene el stock actualizado, incluso si el archivo no existía.
?>
