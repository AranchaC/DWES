
<?php

define ('RUTA_ARCHIVO', "stock.data");

$productos = array(
    "peras" => 3, 
    "limones" => 6, 
    "manzanas" => 4,
    "naranjas" => 5,
    "paraguaya" => 2
);

//si no lee archivo con el stock, creo uno por defecto:
if (! $stock = unserialize(file_get_contents(RUTA_ARCHIVO))){
    // Array para el stock
    $stock = array(
        "peras" => 10, 
        "limones" => 20, 
        "manzanas" => 15,
        "naranjas" => 30, 
        "paraguaya" => 50
    );
}



?>
