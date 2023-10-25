<?php session_start() ?>

<html>
    <body>
        <h1>Adivina un número del 1 al 100</h1>
        <!-- indicamos en action el propio php (PHP_SELF) para que el formulario se dirija a él -->
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="nombre">Numero: </label>
            <!-- Se crea un campo de entrada de tipo número y obligatorio que permite 
            al usuario ingresar un número del 1 al 100. Y un botón de tipo submit para enviar el formulario -->
            <input type="number" name="num" min="1" max="100" required >
            <input type="submit" name="adivinar" value="Adivinar" />

            <?php 
                // Se crean variables. 
                //Si se recibe valor, se asigna ese valor, si no, se genera num aleatorio y contador a 0:
                $numMaquina = isset($_SESSION["numMaquina"]) ? $_SESSION["numMaquina"] : rand(1,100);
                $contador = isset($_SESSION["contador"]) ? $_SESSION["contador"] : 0;

                // Si se ha enviado el formulario con el botón "Adivinar", iniciamos juego.
                // si es la primera vez que se inicia:
                if (isset($_REQUEST["adivinar"])){
                    //Creo variable num y asigno valor ingresado por el campo num:
                    $num = $_REQUEST["num"];
                    $contador++; // aumentamos el contador en 1 para sumar un intento.

                    // si el núm ingresado y el aleatorio son iguales, gana y se reinician valores:
                    if ($num == $numMaquina){                       
                        echo "<br> Tu número $num es correcto<br>¡HAS GANADO!<br>";
                        echo "<br> Intentos: $contador <br>";
                        echo "<br> Introduce otro número para volver a jugar.";
                        $contador = 0;
                        $numMaquina = rand(1, 100);
                    
                    //y si no son iguales, se genera mensaje y mostramos intentos.
                    } elseif ($num > $numMaquina){
                        echo "<br> Te has pasado, tu número $num es mayor.<br>Vuelve a intentarlo.<br>";
                        echo "<br> Intentos: $contador <br>";                   
                    } else {
                        echo "<br> No has llegado, tu número $num es menor.<br>Vuelve a intentarlo.<br>";
                        echo "<br> Intentos: $contador <br>";
                    }
                } else {
                    // si no es la primera vez, y si se recarga la página, se inicia el juego/variables:
                    $contador = 0;
                    $numMaquina = rand(1, 100);
                }
                // Guardo valores en las sesiones para que los recuerde:
                $_SESSION["numMaquina"] = $numMaquina;
                $_SESSION["contador"] = $contador;

            ?>
        </form>
    </body>
</html>
