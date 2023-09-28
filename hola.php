<html>
    <body>
        <?php 
        //echo "hola soy pagina PHP \n"; 
        
        //print("hola mundo") 
        
        /*
        $contador =0;

        for ($i=0; $i<100; $i++){
            echo "hola mundo PHP $i <br>";
        }    
        */

        if (isset($_GET["nombre"])){
            print ("Hola " . $_GET ["nombre"]);
        } 
        else {
            print ("Hola anónimo");
        }

        //print ("hola " . $_GET["nombre"])
        
        
    ?>
    </body>
    
</html>


