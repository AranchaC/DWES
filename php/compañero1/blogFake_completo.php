 <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form ACTION="blogFake_completo.php" METHOD="POST">
            <label for="Entrada">Entrada del blog</label>
            <br>
            <textarea id="comentario" rows="4" cols="50" id="Entrada" name="Entrada"></textarea>
            <br>
            <input type="submit" name="Enviar">
            <br>
            
        </form>
    </body>
    </html>

    <?php
    //Verifica si se ha enviado un formulario
        if(isset($_POST["Entrada"])){
            // Obtener nuevo texto enviado desde el formulario
            $entrada = $_POST["Entrada"];

            // abrir archivo "a"=agregar alfinal
            $archivo = fopen("entradasBlog.txt", "a");
            // escribe
            fwrite($archivo, $entrada."<br>");

            fclose($archivo);
        }
        //Leo contenido del archivo txt
        $contenido = file_get_contents("entradasBlog.txt");
        
        //muestro contenido
        echo "<h2>Entradas del blog</h2>";
        echo $contenido;
    ?>



    <!-- para trabajar con archivos de texto en php fopen fpwrite fclose-->