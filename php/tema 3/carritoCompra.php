<?php 
session_start(); 

$productos = array ("platanos" => 3, "limones" => 6, "manzanas" => 4);



?>

<html>
    <body>
        <form action="">
            <?php
                foreach($productos as $producto => $precio){
                    echo "<p></p><label for=\"$producto\"> $producto ($precio €/ud)  </label>";
                    echo "<input type=\"number\" name=\"$producto\" min=\"0\" /> ";
                    echo "</p>";

                }
            ?>
            <input type="submit" value="Actualizar carrito">
        </form>
    </body>
</html>