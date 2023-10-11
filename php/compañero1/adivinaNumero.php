<?php
$numeroAleatorio = isset($_POST['numeroAleatorio']) ? $_POST['numeroAleatorio'] : random_int(1, 10); //comprueba si existe $_POST['numeroAleatorio'] si no lo crea
$intentos = isset($_POST['intentos']) ? $_POST['intentos'] : 0; //comprueba si intentos existe con isset, si no lo inicia en 0
$mensaje = '';


if (isset($_POST['intento'])) { //Verifica si se ha enviado un intento
    //guarda el numero enviado por el usuario con un parseInt
    $intento = (int)$_POST['intento'];

    $intentos++;

    if ($intento == $numeroAleatorio) {
        $mensaje = "¡Felicitaciones! Has adivinado el número {$numeroAleatorio} en {$intentos} intentos.";
        
    } elseif ($intento < $numeroAleatorio) {
        $mensaje = "El número es mayor.";
    } elseif ($intento > $numeroAleatorio){
        $mensaje = "El número es menor.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Adivina el número</title>
</head>
<body>
    <h1>Adivina el número</h1>

    <form method="post" action="adivinaNumero.php">
        <label for="intento">Nuevo intento:</label>
        <input type="number" id="intento" name="intento" required>
        <!-- creamos un campo oculto con la variable donde almacenamos el numero aleatorio para que no se actualice en cada petición y se pueda adivinar. el echo se utiliza para insertar los valores de las variables PHP en los atributos value -->
        <input type="hidden" name="numeroAleatorio" value="<?php echo $numeroAleatorio; ?>">
        <input type="hidden" name="intentos" value="<?php echo $intentos; ?>">
        <input type="submit" value="Adivinar">
    </form>

    <p><?php echo $mensaje; ?></p>
</body>
</html>

