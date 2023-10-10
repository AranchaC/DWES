<html>
    <head>

    </head>
    <body>
    <h1></h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="nombre">Nuevo mensaje: </label>
            <input type="text" name="texto" required >
            <input type="submit" name="enviar" value="Enviar" />
            <br/><br/>
            <textarea readonly name="area" id="" cols="30" rows="10" >
            <?php
            // Verificar si se ha enviado el formulario y si hay un mensaje
            if (isset($_REQUEST["enviar"]) && isset($_REQUEST["texto"])) {
                // Obtener el mensaje anterior (si existe)
                $mensajeAnterior = "";
                if (isset($_REQUEST["area"])) {
                    $mensajeAnterior = $_REQUEST["area"];
                    // Obtener el nuevo mensaje ingresado
                    $mensajeNuevo = $_REQUEST["texto"];
                    // Concatenar el mensaje anterior y el nuevo mensaje con un salto de línea
                    echo $mensajeAnterior . $mensajeNuevo . "\n";
                }
            }
            ?>
            </textarea>

        </form>

    </body>
    
</html>


