<html>
    <body>
        <?php
        if(! isset($_REQUEST["enviar"])){
        ?>

        <form action="procForm.php" method="post">
            <input type="text" name="texto"/>
            <input type="submit" name="enviar" value="Enviar">
        </form>

        <?php
        } else{
            echo "<p> Gracias por rellenar.</p>";
            echo "<p> Texto: " . $_REQUEST["texto"] . "</p>";
        }



        ?>
    </body>
</html>