<?php

include('carrito.php');

 

file_put_contents(RUTA_ARCHIVO, serialize($stock));

?>