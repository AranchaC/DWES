<html>
    <head>

    </head>
    <body>
    <h1></h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="nombre">Escribe mensaje: </label>
            <input type="text" name="texto" required >
            <input type="submit" name="enviar" value="Enviar" />
            <br/><br/>
            <textarea readonly name="area" id="" cols="30" rows="10" 
                value="<?php echo $texto; ?>"></textarea>


            <input type="hidden" name="numMaquina" value="<?php echo $numMaquina; ?>">
            <input type="hidden" name="contador" value="<?php echo $contador; ?>">
 
        </form>

    </body>
    
</html>

<?php
    if ( isset($_REQUEST["enviar"])){
        $mensaje = $_REQUEST["texto"];
        
    } 

?>
