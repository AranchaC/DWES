<?php
session_start();

include('carrito.php');

//inicializo cantidad de productos en la sesión.
//para realizar un seguimiento de la cantidad de uds por producto y que se 
//vayan acumulando en vez de sobreescribirlas.
if (!isset($_SESSION['productos'])) {
    $_SESSION['productos'] = array();
    foreach ($productos as $nombre => $precio) {
        //creamos una memoria por cada producto y asignamos valor inicial 0:
        $_SESSION['productos'][$nombre] = 0;
    }
}
//variables:
//uds_add para añadir
//uds_remove para quitar

if (isset($_POST["actualizar"])) {
    $totalUds = 0;
    $totalPrecio = 0;
    
    foreach ($productos as $nombre => $precio) {
        //Se combina con "_add o _remove" para crear la clave del input 
        //del formulario por producto.
        //los campos inputs se llaman así: nombre_add o nombre_remove
        $uds_add = intval($_POST[$nombre . "_add"]);
        $uds_remove = intval($_POST[$nombre . "_remove"]);

        //actualizo la cantidad de uds para cada producto:
        $_SESSION['productos'][$nombre] += $uds_add - $uds_remove;

        //calculo la cantidad total de uds en el carrito:
        //sumando las uds de cada producto.
        $totalUds += $_SESSION['productos'][$nombre];

        //calculo el precio total del carrito,
        //multiplicando el precio por las uds de cada producto
        $totalPrecio += $_SESSION['productos'][$nombre] * $precio;
    }
    //almaceno el total uds y el precio total en la sesión:
    $_SESSION['totalUds'] = $totalUds;
    $_SESSION['totalPrecio'] = $totalPrecio;
}

if(isset($_POST["borrar"])){
    $_SESSION['totalUds'] = 0;
    $_SESSION['totalPrecio'] = 0;
    foreach ($productos as $nombre => $precio) {
        $_SESSION['productos'][$nombre] = 0;
    }
}

?>

<html>
    <head>
        <title>Carrito Compra</title>
    </head>
    <body>
        <h1>FRUTERÍA CHICHARRO</h1>
        <h2>CARRO DE LA COMPRA</h2>
        <form action="" method="POST">
            <table border="1">
                <tr>
                    <th>Producto</th>
                    <th>Añade Uds</th>
                    <th>Quitar Uds</th>
                    <th>Total unidades</th>
                    <th>Total precio</th>
                </tr>
            
            <?php
                foreach ($productos as $nombre => $precio) {                   
            ?>
                    <tr>
                        <td>
                            <label for="<?php echo $nombre ?>"><?php echo "$nombre ($precio €/ud)" ?></label>
                        </td>
                        <td>
                            <input type="number" name="<?php echo $nombre . "_add" ?>" min="0" value=0 /> 
                        </td>  
                        <td>
                            <input type="number" name="<?php echo $nombre . "_remove" ?>" min="0" value=0 />
                        </td>
                        <td>
                            <?php echo isset($_SESSION['productos'][$nombre]) ? $_SESSION['productos'][$nombre] : 0 ; ?>
                        </td>
                        <td>
                            <?php echo isset($_SESSION['productos'][$nombre]) ? ($_SESSION['productos'][$nombre] * $precio) . " €" : 0; ?>
                        </td>
                    </tr>
                <?php
                }//foreach ?>
            </table>
            <br>
        
            <p>Total de unidades en el carrito: <?php echo isset($_SESSION['totalUds']) ? $_SESSION['totalUds'] : 0; ?></p>
            <p>Precio total a pagar: <?php echo isset($totalPrecio) ? $totalPrecio : 0; ?> €</p>

            <input type="submit" name="actualizar" value="Actualizar carrito">
            <input type="submit" name="borrar" value="Borrar carrito">
            <input type="submit" name="terminar" value="Terminar compra">
        </form>
    </body>
</html>
