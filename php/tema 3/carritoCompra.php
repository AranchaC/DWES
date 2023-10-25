<?php 
session_start(); 

$productos = array ("peras" => 3, "limones" => 6, "manzanas" => 4);

$totalPrecio = array ();

$actualizar = false;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $actualizar = true;
}

//inicializo array para almacenar el total de uds por producto.
if (!isset($_SESSION["totalUds"])){
    $_SESSION["totalUds"] = array();
}
// $producto = "";
// $precio = 0;
// $totalUds =  isset($_SESSION["totalUds"]) ? intval($_SESSION["totalUds"]) : 0;

$totalPrecio = isset($_SESSION["totalPrecio"]) ? $_SESSION["totalPrecio"] : 0;

?>

<html>
    <head>
        <title>Carrito Compra</title>
    </head>
    <body>
        <h2>CARRO DE LA COMPRA</h2>
        <form action="" method="POST">
            <table border="1">
                <tr>
                    <th>Producto</th>
                    <th>Unidades</th>
                    <th>Total unidades</th>
                    <th>Total precio</th>
                </tr>
            
            <?php
                foreach($productos as $producto => $precio){ 
                    $unidades =  0;
                    $_SESSION["totalUds"][$producto] = 0;
                   
                    ?>
                    <tr>
                        <td>
                            <label for="<?php $producto ?>"> <?php echo "$producto ($precio €/ud)" ?> </label>
                        </td>
                        <td>
                            <input type="number" name="unidades" min="0" /> 
                        </td>
                        <td>
                            <?php 
                            if($actualizar){
                                $unidades = isset($_REQUEST["unidades"][$producto]) ? intval($_REQUEST["unidades"][$producto]) : 0;
                                if (isset($_SESSION["totalUds"][$producto])){
                                    $_SESSION["totalUds"][$producto] += $unidades;
                                }else{
                                    $_SESSION["totalUds"][$producto] = $unidades;
                                }                           
                                
                                echo $_SESSION["totalUds"][$producto] ;
                            ?>
                        </td>

                        <?php } ?>    
                    </tr>

                <?php

                }//foreach

            ?>
            </table>
            <br>
            <input type="submit" value="Actualizar carrito">
        </form>
    </body>
</html>