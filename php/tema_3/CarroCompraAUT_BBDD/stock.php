
<?php

//defino constante llamada RUTA_ARCHIVO que contiene el archivo donde almacenaré el stock:
define('RUTA_ARCHIVO', "stock.txt");

//Conecto con la BBDD:
$pdo = new PDO("mysql:dbname=croqueteria;host=localhost","administrador","administrador");

//Obtengo los usuarios de BBDD:
$usuarios = [];

if ($consulta = $pdo->query("SELECT * FROM usuarios")) {
    while ($registro = $consulta->fetch()) {
        $usuario = $registro["usuario"];
        $contrasena = $registro["pass"];
        $usuarios[$usuario] = $contrasena;
    }
} else {
    die("Problema accediendo a la base de datos");
}


// $aran = password_hash("arancha", PASSWORD_DEFAULT);
// $eva = password_hash("eva", PASSWORD_DEFAULT);
// $rodri = password_hash("rodri", PASSWORD_DEFAULT);
// $admin = password_hash("admin", PASSWORD_DEFAULT);

// echo "$aran <br>";
// echo "$eva <br>";
// echo "$rodri <br>";
// echo "$admin <br>";
// Creo un array con usuarios y sus contraseñas hash
// $usuarios = array(
//     "arancha" => "$2y$10$/txOAf5xLmpk8w40pbHSA.VIibM3ION.XUjhYUxNZimTnRakZH8YC",
//     "eva" => "$2y$10$RDJlk/wLwYkg4LEHFgOeSOZWGEjoxDdGGApmDi8ljmabVVNPLek9i",
//     "rodri" => "$2y$10$orwHE8cTZH4JGDX/n4B0BO5ZvokauYVqkVTRQfD9oA.2158.HHZc.",
//     "admin" => "$2y$10$2/.G6E0U2aoxM8EF/1vlUu2BbiUY/BZhqaGIvU9eMQsdLlYdxF1dC",
// );

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
