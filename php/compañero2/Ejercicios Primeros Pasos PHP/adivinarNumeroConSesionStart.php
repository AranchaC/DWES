 <html>
    <head>
    </head>
    <body>
        <?php
        // Las sesiones sirven para que el número aleatorio no cambie cada vez que se recargue la página
        session_start();

        // Especificamos los límites de nuestro random_int
        const MAX = 100;
        const MIN = 0;

        // Comprueba si ya hay un número aleatorio en la sesión
        if (!isset($_SESSION["numero_aleatorio"])) {
            $_SESSION["numero_aleatorio"] = random_int(MIN, MAX);
        }

        // Si le damos al botón enviar comprueba si has acertado el número
        if (isset($_POST["Enviar"])) {
            $valorUsuario = isset($_POST["numero"]) ? intval($_POST["numero"]) : null;

            echo "<br>Tu número es: " . $valorUsuario . "<br>";

            // Este condicional obliga al usuario a meter un número, debido a que este puede entregar el formulario vacío
            if ($valorUsuario !== null) {
                $numeroAleatorio = $_SESSION["numero_aleatorio"];

                if ($valorUsuario == $numeroAleatorio) {
                    echo "ENHORABUENA, HAS ACERTADO EL NÚMERO";
                    // Si el usuario acierta y quiere puede reiniciar el número aleatorio
                    unset($_SESSION["numero_aleatorio"]);
                     // En caso de que el valor de usuario sea menor al aleatorio se avisará al usuario de que tiene que probar con un número mayor para acertar
                } else if ($valorUsuario < $numeroAleatorio) {
                    echo "EL NÚMERO OCULTO ES MAYOR";
                     // En caso de que el valor de usuario sea mayor al aleatorio se avisará al usuario de que tiene que probar con un número menor para acertar
                } else {
                    echo "EL NÚMERO OCULTO ES MENOR";
                }
            } else {
                echo "Por favor, ingresa un número válido.";
            }
        }
        ?>
        <!--Formulario-->
            <form METHOD="post">
                <label for="numero">Indica tu número</label>
                <input type="text" name="numero">
                <input type="submit" name="Enviar">
            </form>
    </body>
</html>
