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

        Clique no botão abaixo para exibir todos os registros:
        <form method="POST" action="administra.php">
            <input type="hidden" name="operacao" value="mostrar">

            <input type="submit" value="Mostrar Registros" name="enviar">

        </form>

        <?php
            include "rodape.inc";
        ?>

    </body>

</html>