<?php
session_start();

include('carrito.php');
$mensaje = "";
$terminar = false;

//inicializo cantidad de productos en la sesión.
//para realizar un seguimiento de la cantidad de uds por producto y que se 
//vayan acumulando en vez de sobreescribirlas.
foreach ($productos as $nombre => $precio) {
    if (!isset($_SESSION[$nombre] )) {
        //creamos una memoria por cada producto y asignamos valor inicial 0:
        $_SESSION[$nombre] = 0;
    }
 }
//variables:
//uds_add para añadir: input con nº positivos.
//uds_remove para quitar: input con nº negativos.

if (isset($_POST["actualizar"])) {
    //variables para usar como total del carrito:
    $totalUds = 0;
    $totalPrecio = 0;

    foreach ($productos as $nombre => $precio) {
        //Se combina con "_add o _remove" para crear la clave del input 
        //del formulario por producto.
        //los campos inputs se llaman así: nombre_add o nombre_remove
        $uds_add = intval($_POST[$nombre . "_add"]);
        $uds_remove = intval($_POST[$nombre . "_remove"]);

        //actualizo la cantidad de uds para cada producto:
        $_SESSION[$nombre] += $uds_add + $uds_remove;

        //si la cantidad de uds de cada producto no es un nº negativo, puedo continuar:
        if ($_SESSION[$nombre] >= 0){
            //calculo la cantidad total de uds en el carrito:
            //sumando las uds de cada producto.
            $totalUds += $_SESSION[$nombre];

            //calculo el precio total del carrito,
            //multiplicando el precio por las uds de cada producto
            $totalPrecio += $_SESSION[$nombre] * $precio;
        }else{
            $mensaje = "<b><font color=\"red\">No puede haber unidades negativas.</font></b><br> <hr>";
        }
    }
    //almaceno el total del carrito (uds y precio) en la sesió:
    $_SESSION['totalUds'] = $totalUds;
    $_SESSION['totalPrecio'] = $totalPrecio;
}//actualizar

if(isset($_POST["borrar"])){
    $_SESSION['totalUds'] = 0;
    $_SESSION['totalPrecio'] = 0;
    foreach ($productos as $nombre => $precio) {
        $_SESSION[$nombre] = 0;
    }
}//borrar

if (isset($_POST["terminar"])){
    //solo se puede terminar la compra si en el carrito hay más de 0 uds.
    if ($_SESSION['totalUds'] != 0){
        $terminar = true;
        
        $restarStock = 0;
        $_SESSION['totalUds'] = 0;
        $_SESSION['totalPrecio'] = 0;
        foreach ($productos as $nombre => $precio) {
            $restarStock = $_SESSION[$nombre];
            $_SESSION[$nombre] = 0;
        }
        foreach ($stock as $producto => $cantidad) {
            $stock[$producto] -= $restarStock;
        }
    }else{
        echo "<b><font color=\"red\">EL CARRITO ESTÁ VACÍO.</font></b><br> <hr>";
    }



}//terminar

?>

<html>
    <head>
        <title>Carrito Compra</title>
    </head>
    <body>
        <h1>FRUTERÍA CHICHARRO</h1>
        <h2>CARRO DE LA COMPRA</h2>
        <?php 
        if ($terminar){ //si se ha terminado la compra, mostramos el resultado y volvemos a empezar.
            echo "<h3>Resumen de la compra:</h3>";
            foreach ($productos as $nombre => $precio) {
                // solo se mostrarán los productos con más de 0 uds.
                if ($_SESSION[$nombre] > 0){
                    echo "$nombre - $_SESSION[$nombre] uds.<br />";
                }
            }  ?>
            <p>Total de unidades en el carrito: <?php echo isset($_SESSION['totalUds']) ? $_SESSION['totalUds'] : 0; ?></p>
            <p>Precio total a pagar: <?php echo isset($_SESSION['totalPrecio']) ? $_SESSION['totalPrecio'] : 0; ?> €</p>
            <?php
        }else { ?>

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
                            <input type="number" name="<?php echo $nombre . "_remove" ?>" max="0" value=0 />
                        </td>
                        <td>
                            <?php echo isset($_SESSION[$nombre]) ? $_SESSION[$nombre] : 0 ; ?>
                        </td>
                        <td>
                            <?php echo isset($_SESSION[$nombre]) ? ($_SESSION[$nombre] * $precio) . " €" : 0; ?>
                        </td>
                    </tr>
                <?php
                }//foreach 
                echo $mensaje ?>
            </table>
            <br>
        
            <p>Total de unidades en el carrito: <?php echo isset($_SESSION['totalUds']) ? $_SESSION['totalUds'] : 0; ?></p>
            <p>Precio total a pagar: <?php echo isset($_SESSION['totalPrecio']) ? $_SESSION['totalPrecio'] : 0; ?> €</p>

            <input type="submit" name="actualizar" value="Actualizar carrito">
            <input type="submit" name="borrar" value="Borrar carrito">
            <input type="submit" name="terminar" value="Terminar compra">
        </form>
        <?php
        }
        ?>
    </body>
</html>
