<?php
    header('Content-Type: text/html; charset=UTF-8');

    //puxa a OPERAÇÃO a ser realizada (pega nos campos hidden das páginas: inclui, exclui e mostra)
    $operacao = $_POST["operacao"];
    //cria a conexão com o Banco, seguindo os parâmetros do arquivo "conexao.inc"
    include "conexao.inc";
    
    //testa qual a operação que deve ser realizada no banco
    if ($operacao=="incluir"){
        
        //puxa o valor dos inputs da página (inlcui)
        $cod = $_POST["cod"];
        $descricao = $_POST["descricao"];
        $preco = $_POST["preco"];

        echo "---------------- $preco ";

        //testa se a conexão deu certo
        if ($mysqli->connect_error) {
            //se der falha na conexão, exibe o possivel erro
            die("Falha na conexão: " . $mysqli->connect_error);
        }
    
        //define a string SQL a ser utilizada, usando as variáveis que resgataram os valores dos inputs
        $sql = "INSERT INTO produtos VALUES ";
        $sql .= "($cod,'$descricao',$preco)";

        //testa se não houve problemas
        if ($mysqli->query($sql) === TRUE) {
            //imprime que o registro ocorreu corretamente
            echo "Registro inserido com sucesso.";

            //mostra na tela um botão para voltar
            echo "<form method=\"POST\" action=\"inclui.php\">";
            echo "<input type=\"submit\" value=\"Voltar\" name=\"voltar\">";
            echo "</form>";

        } else {
            echo "Erro na inserção: " . $mysqli->error;
        }
    
    }elseif ($operacao=="excluir"){
        $cod = $_POST["cod"];

        if ($mysqli->connect_error) {
            die("Falha na conexão: " . $mysqli->connect_error);
        }

        if(is_numeric($cod)){
            $sql = "DELETE FROM produtos WHERE cod = ?";
            $stmt = mysqli_prepare($mysqli, $sql);
            mysqli_stmt_bind_param($stmt, "i", $cod);
            mysqli_stmt_execute($stmt);

           // $resultado = mysql_query ($sql);
            if (mysqli_affected_rows($mysqli) == 1) {
                echo "Produto excluído com sucesso!";
                echo "<form method=\"POST\" action=\"exclui.php\">";
                echo "<input type=\"submit\" value=\"Voltar\" name=\"voltar\">";
                echo "</form>";
            } else {
                echo "Produto não encontrado!";
                echo "<form method=\"POST\" action=\"exclui.php\">";
                echo "<input type=\"submit\" value=\"Voltar\" name=\"voltar\">";
                echo "</form>";
            }
        }
        else
        echo "Codigo inválido!";

    }elseif ($operacao=="mostrar"){
        //aqui define o SELECT, para dizer o que vai ser mostrado
        $resultado = $mysqli->query("SELECT * FROM produtos");

        //verifica quantos registros tem no banco e armazena em $linhas
        $linhas = $resultado->num_rows;
        echo "<p><b>Lista de Produtos:</b></p><hr>";

        if($linhas == 0){
            echo "Lista vazia <br><br>";
        }else{
            //repetição para rodar todas as linhas da tabela (tendo como base a quantidade encontrada e armazenada em $linhas)
            for ($i=0 ; $i<$linhas ; $i++){
                //cria um array chamado $reg que contém tudo que retornou no SELECT
                $reg = $resultado->fetch_row();
                //imprime os índices do array (cada coluna da tabela do banco é um índice ex: reg[0] é a primeira coluna por exemplo.)            
                echo "Código: $reg[0] <br>";
                echo "Descrição: $reg[1] <br>";
                echo "Preço: $reg[2] <br> <hr>";
            }
        }
        echo "<button><a href=\"mostra.php\">Voltar</a></button>";

    }
    $mysqli->close();
?>