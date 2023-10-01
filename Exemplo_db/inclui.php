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

        <form method="POST" action="administra.php">
            <input type="hidden" name="operacao" value="incluir">

            Código:
            <input type="text" name="cod" size="5">
            <br>

            Descrição:
            <input type="text" name="descricao" size="20">
            <br>

            Preço:
            <input type="text" name="preco" size="10">
            <br>

            <input type="submit" value="Cadastrar" name="enviar">

        </form>

        <?php
            include "rodape.inc";
        ?>

    </body>

</html>