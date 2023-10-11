<?php
    if(isset($_REQUEST["enviar"])){
        if(isset($_REQUEST["eurosGanaod"]))
        $euros=$_REQUEST["eurosGuardados"];
        $pesetasFinales = $euros * 166.396;
        echo "<h1>Conversor de Euros a Pesetas</h1><br>

        ";
    }
    else{?>
    <form>
        <h1>Conversor de Euros a Pesetas</h1><br>
        Cantidad en euros: <input type="text" name="eurosGuardados"><input type="submit" name="enviar" value="enviar">
    </form><?php
    }
?>