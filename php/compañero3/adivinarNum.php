<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adivinar Numero</title>
</head>
<body>
    <form method="post">
        Adivina el numero <br/>
        <input type="text" name="textoRespuesta"><br/>
        <input type="submit" name="enviar" value="enviar">
        
        <br/>
        <?php
        if(isset($_REQUEST["enviar"])){
            $numalea = $_REQUEST["textoNum"];
            $guardado= $_REQUEST["textoRespuesta"];
            $intentos= $_REQUEST["intentos"];
            if ($numalea < $guardado){
                $intentos++;
                echo "es mas pequenio";
            }
            elseif ($numalea > $guardado){
                echo "es mas grande";
                $intentos++;
            }
            else{
                echo "Lo has conseguido,el numero final es ",$numalea," y tus intentos han sido: ",$intentos;
            }
        }
        else{
            $intentos = 1;
            $numalea =  random_int(1,10);
        }
        ?>
        <input type="hidden" name="textoNum" value="<?php echo $numalea ?>"/>
        <input type="hidden" name="intentos" value="<?php echo $intentos ?>"/>
    </form>
</body>
</html>