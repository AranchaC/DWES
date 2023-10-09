
<html>
    <head>

    </head>
    <body>
    <h1>Adivina un numero del 1 al 100</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="nombre">Numero: </label>
            <input type="number" name="num" min="1" max="100" required >

            <input type="submit" name="adivinar" value="Adivinar" />

            <?php 

                $numMaquina = isset($_POST["numMaquina"]) ? $_POST["numMaquina"] : rand(1, 100);
                $contador = isset($_POST["contador"]) ? $_POST["contador"] : 0;

                // $numMaquina = rand(1,100);
                //$numMaquina = 12;
                // $contador = 0;
                
                if ( isset($_REQUEST["adivinar"])){
                    $num = $_REQUEST["num"];

                    if ($num == $numMaquina){
                        $contador++;
                        echo "<br> Tu número " . $num . " es correcto<br>¡HAS GANADO!<br>";
                        echo "<br> Intentos: " . $contador . "<br>";
                        echo "<br> Introduce otro número para volver a jugar.";
                        $contador = 0;
                        $numMaquina = rand(1, 100);

                    } elseif ($num > $numMaquina){
                        $contador++;
                        echo "<br> Tu número " . $num . " es mayor.<br>";
                        echo "<br> Intentos: " . $contador . "<br>";                   
                    } else {
                        $contador++;
                        echo "<br> Tu número " . $num . " es menor.<br>";
                        echo "<br> Intentos: " . $contador . "<br>";
                    }
                }
            ?>
            <input type="hidden" name="numMaquina" value="<?php echo $numMaquina; ?>">
            <input type="hidden" name="contador" value="<?php echo $contador; ?>">
        </form>

</body>

</html>

