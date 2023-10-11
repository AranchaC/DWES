<html>
    <head>
    </head>
    <body>
    <?php
        if(!isset($_REQUEST["numParaAdivinar"]) || $_REQUEST["numParaAdivinar"] == 0) {
            echo '<input type="hidden" name="numParaAdivinar" value="' . rand(1, 10) . '">';
        } else {
            echo '<input type="hidden" name="numParaAdivinar" value="' . $_REQUEST["numParaAdivinar"] . '">';
        }

            if(isset($_REQUEST["Enviar"])) {

                    if($_REQUEST["mensaje"] == $_REQUEST["numParaAdivinar"]) {
                        echo "Muy bien, acertaste el numero." . " Has tardado " . $_REQUEST["intentos"] . " intentos";
                        echo '<input type="hidden" name="numParaAdivinar" value="' . rand(1, 10) . '">';

                    } else if($_REQUEST["mensaje"] > $_REQUEST["numParaAdivinar"]) {
                        echo "MAL, prueba un numero mas pequeño";
                    } else if($_REQUEST["mensaje"] < $_REQUEST["numParaAdivinar"]) {
                        echo "MAL, prueba un numero mas grande";
                    } else {
                        echo "Prueba otra vez";
                    }
                }

    ?>
        <!--Formulario-->
        <form METHOD="post">
            <!--Creamos un atributo oculto el cual haga que el número aleatorio no cambie al refrescar la página-->
            <input type="hidden" name="numParaAdivinar" value="0" >
            <label for="numero">Indica tu número</label>
            <input type="text" name="mensaje">
            <input type="submit" name="Enviar">
        </form>
    </body>
</html>