<html>
    <head>
        <meta http-equiv="refresh" content="5">
    </head>
    <body>
        <?php 
            $numMaquina = rand(1,100);

            $num = $_REQUEST['num'];
            $contador = 1;
            
            if (isset($enviar)){
                if ($num == $numMaquina){
                    echo "<br> Tu número " . $_REQUEST['num'] . "es correcto<br>";
                    echo "<br> Intentos: " . $contador;
                } elseif ($num > $numMaquina){
                    echo "<br> Tu número " . $_REQUEST['num'] . "es mayor. Intenta otra vez<br>";
                    $contador++;
                } else {
                    echo "<br> Tu número " . $_REQUEST['num'] . "es menor. Intenta otra vez<br>";
                    $contador++;
                }
            }




            $enviar = $_REQUEST['enviar'];
            if ($enviar)

    ?>
    </body>
    
</html>