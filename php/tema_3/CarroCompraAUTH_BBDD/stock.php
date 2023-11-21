
<?php

//defino constante llamada RUTA_ARCHIVO que contiene el archivo donde almacenaré el stock:
define('RUTA_ARCHIVO', "stock.txt");

//Conecto con la BBDD:
// $pdo = new PDO("mysql:dbname=croqueteria;host=localhost","administrador","administrador");


//hago try-catch para conectar a la bbdd y si falla, ver en la excepción
//el tipo de error.
try {
    $pdo = new PDO("mysql:dbname=croqueteria;host=localhost", "administrador", "administrador");
} catch (PDOException $e) {
    die("Error al conectar a la base de datos: " . $e->getMessage());
}

//Obtengo los usuarios de BBDD:
$usuarios = [];

//Hacemos consulta para seleccionar los registros de la tabla usuarios:
if ($consulta = $pdo->query("SELECT * FROM usuarios")) {
    //recorremos los registros uno por uno, fila por fila:
    //con fetch vamos siempre a la siguiente fila, entonces hacemos este proceso mientras haya filas.
    while ($registro = $consulta->fetch()) {
        //Obtenemos los valores usuario en la columna usuario y contraseña en la columna contraseña:
        $usuario = $registro["usuario"];
        $contrasena = $registro["pass"];
        //Y almacenamos en usuario como clave  y la contraseña como el valor de nuestro array usuarios.
        $usuarios[$usuario] = $contrasena;
    }
} else {
    //Y si no se puede hacer la consulta, sale mensaje de error:
    die("Problema accediendo a la base de datos");
}

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
