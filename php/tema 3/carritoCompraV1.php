<?php
session_start();

$productos = array("peras" => 3, "limones" => 6, "manzanas" => 4);

if (isset($_POST["actualizar"])) {
    $totalUds = 0;
    $totalPrecio = 0;
    
    foreach ($productos as $nombre => $precio) {
        $unidades = isset($_POST[$nombre]) ? intval($_POST[$nombre]) : 0;
        $totalUds += $unidades;
        $totalPrecio += $unidades * $precio;
        $_SESSION['productos'][$nombre] = $unidades;
    }
    $_SESSION['totalUds'] = $totalUds;
}

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
                foreach ($productos as $producto => $precio) {                   
            ?>
                    <tr>
                        <td>
                            <label for="<?php echo $producto ?>"><?php echo "$producto ($precio €/ud)" ?></label>
                        </td>
                        <td>
                            <input type="number" name="<?php echo $producto ?>" min="0" value="<?php echo isset($_SESSION['productos'][$producto]) ? $_SESSION['productos'][$producto] : 0; ?>" /> 
                        </td>  
                        <td>
                            <?php echo isset($_SESSION['productos'][$producto]) ? $_SESSION['productos'][$producto] : 0; ?>
                        </td>
                        <td>
                            <?php echo (isset($_SESSION['productos'][$producto]) ? $_SESSION['productos'][$producto] : 0) * $precio; ?>
                        </td>
                    </tr>
                <?php
                }//foreach ?>
            </table>
            <br>
            <input type="submit" name="actualizar" value="Actualizar carrito">
        </form>
        <p>Total de unidades en el carrito: <?php echo isset($_SESSION['totalUds']) ? $_SESSION['totalUds'] : 0; ?></p>
        <p>Precio total a pagar: <?php echo isset($totalPrecio) ? $totalPrecio : 0; ?> €</p>
    </body>
</html>
