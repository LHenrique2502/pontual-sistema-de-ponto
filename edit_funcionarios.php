<?php


if (!empty($_GET['id'])) {

    include('config.php');

    $id = $_GET['id'];

    $sqlSelect = "SELECT * FROM funcionarios WHERE id=$id";

    $result = $mysqli->query($sqlSelect);

    if ($result->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($result)) {
            $nome = $user_data['nome'];
            $pis = $user_data['pis'];
            $cpf = $user_data['cpf'];
            $empresa = $user_data['empresa'];
            $admissao = $user_data['admissao'];
            $horario = $user_data['horario'];
            $funcao = $user_data['funcao'];
        }
    } else {
        header('Location: cadastro_funcionarios.php');
    }
} else {
    header('Location: cadastro_funcionarios.php');
}

if (isset($_FILES['arquivo'])) {
    $arquivo = $_FILES['arquivo'];

    if ($arquivo['error'])
        die("Falha ao enviar arquivo");

    if ($arquivo['size'] > 2097152)
        die("Arquivo muito grande! Max: 2MB");

    $pasta = "arquivos/";
    $nomeDoArquivo = $arquivo['name'];
    $novoNomeDoArquivo = uniqid(); //uniqid serve para gerar um id aleatorio que não ira se repetir
    $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

    if ($extensao != "jpg" && $extensao != "png" && $extensao != "pdf")
        die("Tipo de arquivo não aceito");

    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;

    $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);
    if ($deu_certo) {
        $mysqli->query("INSERT INTO arquivos (nome,path) VALUES('$nomeDoArquivo', '$path')") or die($mysqli->error);
        echo "<p>Arquivo enviado com sucesso! Para acessá-lo, <a target=\"_blank\" href=\"arquivos/$novoNomeDoArquivo.$extensao\"></a>clique aqui</p>";
    } else
        echo "<p>Falha ao enviar o arquivo</p>";
}

$sql_query = $mysqli->query("SELECT * FROM arquivos") or die($mysqli->error);

?>



<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de funcionários</title>
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
            <img id="logo_menu" src="_imagens/Logo-menu-lateral.png" width="200px">
            <li><a href="index.php">Dashboard</a></li>
            <li><a class="active" href="#">Cadastros</a>
                <ul class="dropdown">
                    <li><a href="cadastro_empresa.html"></a>Empresa</li>
                    <li><a href="cadastro_horarios.html"></a>Horários</li>
                    <li><a href="cadastro_funcionarios.html"></a>Funcionários</li>
                    <li><a href="cadastro_usuarios.php"></a>Usuários</li>
                </ul>
            </li>
            <li><a href="#">Manutenções</a>
                <ul>
                    <li><a href="ajuste_de_ponto.html"></a>Ajustar Ponto</li>
                </ul>
            </li>
            <li><a href="#">Relatórios</a>
                <ul>
                    <li><a href="folha_de_ponto.html"></a>Folha de ponto</li>
                </ul>
            </li>
            <li><a href="configuracoes.html">Configurações</a></li>
        </ul>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <div class="conteudoCadastro">


        <form action="saveEditFuncionarios.php" method="POST">
            <fieldset>

                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome ?>" required>
                    <label for="nome" class="labelInput">Nome completo</label>
                </div><br>
                <div class="inputBox">
                    <input type="text" name="pis" id="pis" class="inputUser" value="<?php echo $pis ?>" required>
                    <label for="pis" class="labelInput">PIS/PASEP</label>
                </div><br>
                <div class="inputBox">
                    <input type="text" name="cpf" id="cpf" class="inputUser" value="<?php echo $cpf ?>" required>
                    <label for="cpf" class="labelInput">CPF</label>
                </div><br>
                <div class="inputBox">
                    <input type="text" name="empresa" id="empresa" class="inputUser" value="<?php echo $empresa ?>" required>
                    <label for="empresa" class="labelInput"><b>Empresa</b></label>
                </div><br>
                <div class="inputBox">
                    <label for="admissao"><b>Data de Admissão</b></label>
                    <input type="date" name="admissao" id="admissao" class="inputUser" value="<?php echo $admissao ?>" required>
                </div><br>
                <div class="inputBox">
                    <input type="text" name="horario" id="horario" class="inputUser" value="<?php echo $horario ?>" required>
                    <label for="horario" class="labelInput">Horário</label>
                </div><br>
                <div class="inputBox">
                    <input type="text" name="funcao" id="funcao" class="inputUser" value="<?php echo $funcao ?>" required>
                    <label for="funcao" class="labelInput">Função</label>
                </div><br>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" name="update" id="update"><br>
            </fieldset>
        </form>

        <form style="margin-left: 350px; " method="POST" enctype="multipart/form-data" action="">
            <label for="Selecione o arquivo"></label>
            <input name="arquivo" type="file">
            <button name="upload" type="submit">Enviar arquivo</button>
        </form>

        <table border="1" cellpadding="10">
            <thead>
                <th>Arquivo</th>
                <th>Data de envio</th>
            </thead>
            <tbody>
                <?php
                while ($arquivo = $sql_query->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $arquivo['nome']; ?></td>
                        <td><?php echo date("d/m/Y H:i", strtotime($arquivo['data_upload'])); ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</body>

<header><!--cabeçalho-->
    <p>Dashboard</p>
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