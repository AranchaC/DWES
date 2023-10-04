<html>
    <head>

    </head>
    <body>
        <?php 
            // $numMaquina = rand(1,100);
            $numMaquina = 12;
            $contador = 0;
            
            if ( isset($_REQUEST["adivinar"])){
                $num = $_REQUEST["num"];

                if ($num == $numMaquina){
                    $contador= $_REQUEST["contador"]+1;
                    echo "<br> Tu número " . $num . " es correcto<br>";
                    echo "<br> Intentos: " . $contador;
                } elseif ($num > $numMaquina){
                    $contador= $_REQUEST["contador"]+1;
                    echo "<br> Tu número " . $num . " es mayor.<br>";
                    echo "<br> Intentos: " . $contador;
                    // echo '<br><a href="adivinarNumero.php" >Intentar otra vez.</a>';
                    
                } else {
                    $contador= $_REQUEST["contador"]+1;
                    echo "<br> Tu número " . $num . " es menor.<br>";
                    echo "<br> Intentos: " . $contador;
                    // echo '<br><a href="adivinarNumero.php" >Intentar otra vez.</a>';
                }
            }
    ?>

    <h1>Adivina un numero del 1 al 100</h1>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <label for="nombre">Numero: </label>
        <input type="number" name="num" min="1" max="100" required >
        <input type="hidden" name="numMaquina" value="<?php echo $numMaquina; ?>">
        <input type="hidden" name="contador" value="<?php echo $contador; ?>">
        <input type="submit" name="adivinar" value="Adivinar" />
    </form>



    </body>
    
</html>