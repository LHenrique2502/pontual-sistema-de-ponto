<?php

    if(!empty($_GET['id']))
    {

        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM empresa WHERE id=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $nome = $user_data['nome'];
                $cnpj = $user_data['cnpj'];
                $endereco = $user_data['endereco'];
                $cidade = $user_data['cidade'];
                $estado = $user_data['estado'];
            }
            
            
        }
        else
        {
            header('Location: cadastro_empresa.php');
        }

        

    }
    else{
        header('Location: cadastro_empresa.php');
    }

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="estilo.css">
    <link href="https://fonts.cdnfonts.com/css/h-hadir-sans" rel="stylesheet">
   
</head>

<body>

    <nav id="menu">                                     <!--Menu lateral-->
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
            <form action="saveEdit.php" method="POST">
                <fieldset>
                    <div class="inputBox">
                        <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome ?>" required>
                        <label for="nome" class="labelInput">Nome</label>
                    </div><br>
                    <div class="inputBox">
                        <input type="text" name="cnpj" id="cnpj" class="inputUser" value="<?php echo $cnpj ?>" required>
                        <label for="cnpj" class="labelInput">CNPJ</label>
                    </div><br>
                    <div class="inputBox">
                        <input type="text" name="endereco" id="endereco" class="inputUser" value="<?php echo $endereco ?>" required>
                        <label for="endereco" class="labelInput">Endereço</label>
                    </div><br>
                    <div class="inputBox">
                        <input type="text" name="cidade" id="cidade" class="inputUser" value="<?php echo $cidade ?>" required>
                        <label for="cidade" class="labelInput">Cidade</label>
                    </div><br>
                    <div class="inputBox">
                        <input type="text" name="estado" id="estado" class="inputUser" value="<?php echo $estado ?>" required>
                        <label for="estado" class="labelInput">Estado</label>
                    </div><br>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="submit" name="update" id="update"><br>
                </fieldset>
            </form>
        </div>
</body>

<header>                                        <!--cabeçalho-->
        <form>
            <input type="text" id="pesquisar" name="pesquisar" placeholder="Pesquisar...">
        </form>
        <div>
            <a href="sair.php" id="logout" >Logout</a>          <!--botão de logout-->
        </div>
    </header>