<?php

//Incluir conexão com o banco de dados
include_once "config.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incluir Ponto</title>
    <style>
        .box-search {
            display: flex;
            gap: .10%;
        }
    </style>
    <link rel="stylesheet" href="estilo.css">
    <link href="https://fonts.cdnfonts.com/css/h-hadir-sans" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <nav id="menu"> <!--Menu lateral-->
        <ul>
            <img src="_imagens/Logo-menu-lateral.png" width="200px">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="#">Cadastros</a>
                <ul>
                    <li><a href="cadastro_empresa.php"></a>Empresa</li>
                    <li><a href="cadastro_horarios.html"></a>Horários</li>
                    <li><a href="cadastro_funcionarios.php"></a>Funcionários</li>
                    <li><a href="cadastro_usuarios.php"></a>Usuários</li>
                </ul>
            </li>
            <li><a href="#">Manutenções</a>
                <ul>
                    <li><a href="ajuste_de_ponto.html"></a>Ajustar Ponto</li>
                </ul>
            </li>
            <li><a class="active" href="incluir_ponto.php">Incluir Ponto</a>
            </li>
            <li><a href="#">Relatórios</a>
                <ul>
                    <li><a href="folha_de_ponto.html"></a>Folha de ponto</li>
                </ul>
            </li>
            <li>
                <a href="configuracoes.html">Configurações</a>
            </li>
        </ul>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <header><!--cabeçalho-->
        <p>Incluir Ponto</p>
        <div class="box-search">
            <input type="search" id="pesquisa" name="pesquisar" placeholder="Pesquisar..."><!--barra de pesquisa-->
            <button onclick="searchData()" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                </svg>
            </button>
            <a href="sair.php" id="logout">Logout</a> <!--Botão de logout-->
        </div>
    </header><!--fim do cabeçalho-->

    <div class="conteudo"> <!--Conteudo do site-->
        <?php
        //Receber os dados do formulário
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        //Verificar se o usuário clicou no botão cadastrar
        if (!empty($dados['SendCadHorario'])) {
            var_dump($dados);

            //Query para cadastrar no banco de dados
            $query_ponto = "INSERT INTO pontos (entrada, entrada_almoco, saida_almoco, saida) VALUES (:entrada, :entrada_almoco, :saida_almoco, :saida)";
            $regist_ponto = $mysqli->prepare($query_ponto);
            $regist_ponto->bind_param(':entrada', $dados['entrada']);
            $regist_ponto->bind_param(':entrada_almoco', $dados['entrada_almoco']);
            $regist_ponto->bind_param(':saida_almoco', $dados['saida_almoco']);
            $regist_ponto->bind_param(':saida', $dados['saida']);

            //Eecutar a QUERY
            $regist_ponto->execute();

            //Acessa o IF quando cadastrar com sucesso
            if ($regist_ponto->rowCount()) {
                echo "<span style='color: green;'>Horário cadastrado com sucesso!</span><br><br>";
            } else {
                echo "<span style='color: red;'>Erro: Horário não cadastrado!</span><br><br>";
            }
        }
        ?>

        <form method="POST" action="">
            <label>Entrada:</label>
            <input type="time" name="entrada" required><br><br>

            <label>Entrada Almoço:</label>
            <input type="time" name="entrada_almoco" required><br><br>

            <label>Saída Almoço:</label>
            <input type="time" name="saida_almoco" required><br><br>

            <label>Saída:</label>
            <input type="time" name="saida" required><br><br>

            <input type="submit" value="Registrar" name="SendCadHorario">
        </form>
    </div>
</body>

</html>