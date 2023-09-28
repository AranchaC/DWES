<html>
    <head>
        <meta http-equiv="refresh" content="5">
    </head>
    <body>
        <?php 

        $citas= array (
            "Las flores crecen a partir de los momentos más oscuros",
            "Tocar fondo se convirtió en la base sólida sobre la que reconstruí mi vida",
            "La risa es el sol que ahuyenta el invierno del rostro humano",
            "Un día sin una sonrisa es un día perdido",
            "La peor lucha es la que no se hace",
            "Con cada combate te haces más fuerte",
            "Es curioso que la vida, cuanto más vacía, más pesa",
            "No hay lugar adonde ir salvo a cualquier parte, así que sigue caminando",
            "La belleza solo le pertenece al que la entiende, no al que la tiene.",
            "El hombre nunca ha sido tan libre como cuando sueña",
            "Un hombre que no se alimenta de sus sueños envejece pronto",
            "No estar muerto no es estar vivo",
            "Hoy es el primer día del resto de tu vida",
            "Con el nuevo día llega nueva fuerza y nuevos pensamientos",
            "Me entenderás… cuando te duela el alma como a mí",
            "No hay más que una vida; por lo tanto, es perfecta",
            "Sufrir y llorar significa vivir",
            "Perder el tiempo que disfruto no es tiempo perdido",
            "¿Por qué nos caemos, Bruce? Para aprender a levantarnos",
            "En la vida algunas veces se gana; otras veces se aprende",
            "Aquellos que no se mueven no notan sus cadenas",
            "La vida no es justa, es apenas más justa que la muerte, eso es todo",
            "La vida es una bengala roja de sueños. W. B. Yeats.",
            "Si pasas por una tormenta, sigue caminando. Winston Churchill.",
            "No sabía que era imposible, así que lo hizo. (Atribuida a Albert Einstein y a Mark Twain).",
            "La vida es un arco iris que incluye el negro. Yevgeny Yevtushenko.",
            "Cuando las cosas se ponen difíciles, lo duro es ponerse en marcha. Joseph Kennedy.",
            "No vivas para que tu presencia se note, sino para que tu ausencia se sienta. Bob Marley.",
            "La vida no es sino una continua sucesión de oportunidades para sobrevivir. Gabriel García Márquez.",
            "El propósito de nuestras vidas es ser felices. Dalai Lama",
            "Pensamos demasiado y sentimos muy poco. El gran dictador, guion de Charles Chaplin",
            "Deja de pensar en la vida y resuélvete a vivirla. Paulo Coelho"
                    );
        
 
        echo $citas[random_int(0, count($citas)-1)]
    ?>
    </body>
    
</html>