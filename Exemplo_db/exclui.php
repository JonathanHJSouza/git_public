<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <title>Exemplo DB</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>

        <?php
            include "cabecalho.inc";
            include "menu.inc";
        ?>

        Código do produto a ser excluído:
        
        <form method="POST" action="administra.php">

            <input type="hidden" name="operacao" value="excluir">
            
            <input type="text" name="cod" size="5">
            <br>
            
            <input type="submit" value="Excluir" name="enviar">
            
        </form>

        <?php
            include "rodape.inc";
        ?>

    </body>

</html>