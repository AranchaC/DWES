<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlogFake</title>
</head>
<body>
        <form>
            <label>Escribe lo que quieras<input type="text" name="textoUsuario"></label></br>
            
            <br/><input type="submit" value="enviar" name="enviar"><br/>
            <label>Texto Final <br/><textarea rows="20" cols="60" readonly name="tex"><?php
                    if(isset($_REQUEST["enviar"])){
                        $guardado=$_REQUEST["textoUsuario"];
                        $textoFin = $_REQUEST["tex"];
                        $textoFin = $textoFin . $guardado;
                        echo $textoFin; 
                    }
                ?></textarea></label>
        </form>
    
</body>
</html>