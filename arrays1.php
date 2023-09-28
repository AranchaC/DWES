<html>
<title>Array con los dias de la Semana </title>
    <body>
        <?php

        $días=array("Lunes","Martes","Miercoles","Jueves","Viernes","Sábado",
        "Domingo");
        foreach ($días as $k=> $v){
            echo "Clave: $k => Valor: $v <br>"; 
        }

        echo "//////////// <br/> ";

        //////////////////////

        $entrada = array ("Miguel", "Pepe", "Juan", "Julio", "Pablo");
        //modifico el tamaño
        $salida = array_slice ($entrada, 0, 3);
        //muestro el array
        foreach ($salida as $actual)
            echo $actual . "<br>";
            echo "<p>";
        //modifico otra vez
        $salida = array_splice ($entrada, -2);
        //muestro el array
        foreach ($salida as $actual)
            echo $actual . "<br>";

        ?>

        
    </body>
</html>