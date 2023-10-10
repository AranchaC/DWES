<html>
    <head>

    </head>
    <body>
    <h1>Formulario simple</h1>
    <h2>Búsqueda canciones</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="nombre">Texto a buscar: </label>
            <input type="text" name="texto" required ><br/><br/>


            <label for="nomb">Buscar en: </label>
            <input type="radio" value="titulo">Título de la canción.
            <input type="radio" value="album">Nombre de album.
            <input type="radio" value="ambos">Ambos campos.<br/><br/>


            <label for="genero">Género musical:</label>
                <select name="genero" id="gen">
                    <option value="todos">Todos</option>
                    <option value="rock">Rock</option>
                    <option value="jazz">Libras esterlinas</option>
                    <option value="pop">Yenes japones</option>
                    <option value="blues">Francos suizos.</option>
                </select><br/><br/>



            <input type="submit" name="enviar" value="Buscar" />
            <br/><br/>

            <?php

            ?>
            </textarea>

        </form>

    </body>
    
</html>


