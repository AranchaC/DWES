<?php
//inicio sesión para poder almacenar datos:
session_start();

include('stock.php');
include ('check-auth.php');

//creo e inicializo variables que usaré luego:
$mensaje = "";
$actualizado = false;

//inicializo cantidad de productos en la sesión (recorriendo el array productos)
//para realizar un seguimiento de la cantidad de uds por producto y  
//que se vayan acumulando en vez de sobreescribirlas.
foreach ($productos as $nombre => $precio) {
    if (!isset($_SESSION[$nombre] )) {
        //creamos una sesión por cada producto y asignamos valor inicial 0:
        $_SESSION[$nombre] = 0;
    }
}

//BOTÓN ACTUALIZAR: Aplicamos las acciones que queremos para este botón:
if (isset($_POST["actualizar"])) {
    //variables para usar como los totales del carrito:
    $totalUds = 0;
    $totalPrecio = 0;

    //recorremos array productos para aplicar cada acción a cada producto:
    foreach ($productos as $nombre => $precio) {
        //Creo variables:
            //uds_add para añadir (nº positivos) y uds_remove para quitar (nº negativos).
        //Y les asigno los valores recibidos por cada input de cada producto:
            //Se combina con "_add o _remove" porque los inputs se llaman nombre_add o nombre_remove.
        $uds_add = intval($_POST[$nombre . "_add"]);
        $uds_remove = intval($_POST[$nombre . "_remove"]);

        //actualizo la cantidad de uds para cada producto, sumándoles los valores ingresados por el usuario.
        //comos las uds_remove son nums negativos, también se suman para así restarlos:
        $_SESSION[$nombre] += $uds_add + $uds_remove;

        //si la cantidad de uds ingresadas no es un nº negativo, puedo continuar:
        if ($_SESSION[$nombre] >= 0){
            //calculo la cantidad total de uds en el carrito:
            //sumando las uds de cada producto.
            $totalUds += $_SESSION[$nombre];

            //calculo el precio total del carrito,
            //sumando la multiplicación del precio por las uds de cada producto
            $totalPrecio += $_SESSION[$nombre] * $precio;

            //y como todo es correcto, entonces está actualizado:
            $actualizado = true;
        
        //Pero si las uds ingresadas es un nº negativo, sale mensaje de error en rojo:
        } else {
            $mensaje = "<hr><b><font color=\"red\">No puede haber unidades negativas.</font></b><br> <hr>";
        }//else
        
        //almaceno los totales del carrito (uds y precio) en la sesión:
        $_SESSION['totalUds'] = $totalUds;
        $_SESSION['totalPrecio'] = $totalPrecio;
    }//foreach
}//actualizar

//BOTÓN BORRAR: Aplicamos las acciones que queremos para este botón:
if(isset($_POST["borrar"])){
    //como lo que quiero es que se borren todos los datos:
    //pongo todos los valores de la sesión a 0.
    //también se puede hacer con un session_destroy().
    $_SESSION['totalUds'] = 0;
    $_SESSION['totalPrecio'] = 0;
    foreach ($productos as $nombre => $precio) {
        $_SESSION[$nombre] = 0;
    }//foreach
}//borrar

// Actualizar el archivo de stock
file_put_contents(RUTA_ARCHIVO, serialize($stock));

?>

<!-- y genero pág html, en este caso hago una tabla con toda la info de los productos -->
<html>
    <head>
        <title>Carrito Compra</title>
    </head>
    <body>
        <h1>CROQUETERÍA CHICHARRO</h1>
        <h4>**Todos los packs incluyen dos croquetas**</h4>
        <h5><i>Todas las croquetas llevan queso manchego y cebolla.</i></h5>
        <h3>CARRO DE LA COMPRA</h3>

        <form action="" method="POST">
            <table border="1" bordercolor="#0000FF" bgcolor="#AFEEEE" >
                <tr bgcolor="#00BFFF">
                    <th>Producto</th>
                    <th>Añade Uds</th>
                    <th>Quitar Uds</th>
                    <th>Total unidades</th>
                    <th>Total precio</th>
                </tr>
            
            <?php
            //Recorro array productos para que se generen las mismas acciones por cada producto.
            //en este caso una fila de la tabla por producto con lo sig en cada columna:
                //label: con contenido el nombre y precio de cada producto.
                //input number para añadir uds: con name el nombre del producto + _add.
                //input number para quitar uds: con name el nombre del producto + _remove.
                //campo de uds de cada producto almacenadas en sesión si hay o 0 si no las hay.
                //campo de precio: uds almacenadas x precio de cada producto si las hay o 0 si no las hay.
            foreach ($productos as $nombre => $precio) {                   
            ?>
                <tr>
                    <td>
                        <label><?php echo "$nombre ($precio €/pack)" ?></label>
                    </td>
                    <td>
                        <input type="number" name="<?php echo $nombre . "_add" ?>" min="0" value=0 />                    
                        <!-- PUNTO 4 OPCIONAL: para aplicarlo, comentar la linea 114, y descomentar la linea 118.
                                para limitar las uds al stock disponible hay que poner el 
                                atributo max con las uds del stock de cada producto, de la sig manera: -->
                        <!-- <input type="number" name="<?php echo $nombre . "_add" ?>" min="0" max="<?php echo $stock[$nombre] ?>" value=0 /> -->
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
            // muestro mensaje error si lo hay (si hay uds negativas):
            echo $mensaje ?>
            </table>
            <br>
            
            <!-- Muestro los totales del carrito almacenados en la sesión si existe y si no, valor 0. -->
            <p>Total de unidades en el carrito: <?php echo isset($_SESSION['totalUds']) ? $_SESSION['totalUds'] : 0; ?></p>
            <hr>
            <p><b>Precio total a pagar: <?php echo isset($_SESSION['totalPrecio']) ? $_SESSION['totalPrecio'] : 0; ?> €</b></p>
            <hr>
 
            <!-- Botones de actualizar y borrar -->
            <input type="submit" name="actualizar" value="Actualizar carrito">
            <input type="submit" name="borrar" value="Borrar carrito">
        </form>

        <!-- Botón terminar comprar:
             En un form aparte para aplicar un action al .php correspondiente a donde queremos dirigirnos con este botón.
             Este botón está desactivado siempre que:
                no hayamos actualizado (variable actualizado en false) 
                haya mensaje de error (de uds en negativo)
                el total uds del carrito sea 0 o menos -->
        <form action="carritoFinal.php" method="POST">
            <input type="submit" name="terminar" value="Terminar compra" 
                <?php echo (!$actualizado || !empty($mensaje) || $_SESSION['totalUds'] <= 0) ? 'disabled' : ''; ?>>
        </form>
        <p></p><a href="logout.php">Cerrar sesión</a></p>

        <?php 
            // como información, muestro el stock disponible de cada producto (reccorriendo el array stock):
            //muestro también el precio que cogemos del array productos.
            echo "<h3>Stock disponible (precios y uds): </h3><ol>";
            foreach ($stock as $nombre => $unidades){
                $precio = $productos[$nombre];
                echo "<li>$nombre ($precio € /pack): $unidades uds.</li>";       
            }
            echo "</ol>";
        ?>
    </body>
</html>
