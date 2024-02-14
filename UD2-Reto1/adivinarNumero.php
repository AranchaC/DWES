<html>
    <body>
        <h1>Adivina un número del 1 al 100</h1>
        <!-- indicamos en action el propio php (PHP_SELF) para que el formulario se dirija a él -->
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="nombre">Numero: </label>
            <!-- Se crea un campo de entrada de tipo número y obligatorio que permite 
            al usuario ingresar un número del 1 al 100.
            Y un botón de tipo submit para enviar el formulario -->
            <input type="number" name="num" min="1" max="100" required >
            <input type="submit" name="adivinar" value="Adivinar" />

            <?php 
                // Comprueba si ya hay un número aleatorio para adivinar, si no, 
                //se genera uno del 1 al 100.
                if (isset($_POST["numMaquina"])) {
                    $numMaquina = $_POST["numMaquina"];
                } else {
                    $numMaquina = rand(1, 100);
                }

                // Compueba si ya hay contador, si no, se inicializa en 0.
                if (isset($_POST["contador"])) {
                    $contador = $_POST["contador"];
                } else {
                    $contador = 0;
                }

                // Verifica si se ha enviado el formulario con el botón "Adivinar".
                if ( isset($_REQUEST["adivinar"])){
                    $num = $_REQUEST["num"];

                    // Se comprueba si el número ingresado en casilla es igual al número aleatorio generado.
                    if ($num == $numMaquina){
                        $contador++; // aumentamos el contador en 1 para sumar un intento.
                        echo "<br> Tu número " . $num . " es correcto<br>¡HAS GANADO!<br>";
                        echo "<br> Intentos: " . $contador . "<br>";
                        echo "<br> Introduce otro número para volver a jugar.";
                        // y como se ha acabado el juego reiniciamos contador de intentos y 
                        // generamos nuevo núm aleatorio
                        $contador = 0;
                        $numMaquina = rand(1, 100);

                    } elseif ($num > $numMaquina){
                        $contador++;
                        echo "<br> Tu número " . $num . " es mayor.<br>Vuelve a intentarlo.<br>";
                        echo "<br> Intentos: " . $contador . "<br>";                   
                    } else {
                        $contador++;
                        echo "<br> Tu número " . $num . " es menor.<br>Vuelve a intentarlo.<br>";
                        echo "<br> Intentos: " . $contador . "<br>";
                    }
                }
            ?>
            <!-- Se incluyen campos ocultos para almacenar el número aleatorio 
            y el contador de intentos. -->
            <input type="hidden" name="numMaquina" value="<?php echo $numMaquina; ?>">
            <input type="hidden" name="contador" value="<?php echo $contador; ?>">
        </form>
    </body>
</html>
