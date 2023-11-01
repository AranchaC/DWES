
<?php

define('RUTA_ARCHIVO', "stock.txt");

$productos = array(
    "peras" => 3,
    "limones" => 6,
    "manzanas" => 4,
    "naranjas" => 5,
    "paraguaya" => 2
);

// Si el archivo no existe, o no se puede cargar, crea uno por defecto
if (!file_exists(RUTA_ARCHIVO) || !($stock = unserialize(file_get_contents(RUTA_ARCHIVO)))) {
    // Genera array de stock por defecto y lo grabo en disco:
    $stock = array(
        "peras" => 10,
        "limones" => 20,
        "manzanas" => 15,
        "naranjas" => 30,
        "paraguaya" => 50
    );
    file_put_contents(RUTA_ARCHIVO,serialize($stock));
}

// Ahora, $stock contiene el stock actualizado, incluso si el archivo no existía
?>
