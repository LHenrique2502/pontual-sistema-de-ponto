<?php
    session_start();
    // print_r($_SESSION);
    if((!isset($_SESSION['email']) == true) and (!isset ($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['email'];
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
            <li><a class="active" href="index.html">Dashboard</a></li>
            <li><a href="#">Cadastros</a>
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

    <header>                                        <!--cabeçalho-->
        <?php
            echo "<p>Bem vindo <u>$logado</u></p>";
        ?><!--Bem vindo usuário-->
        <form>
            <input id="pesquisar" type="text" id="pesquisar" name="pesquisar" placeholder="Pesquisar...">
        </form>
        <div>
            <a href="sair.php" id="logout" >Logout</a>          <!--botão de logout-->
        </div>
    </header>

    <div class="conteudo">                          <!--Conteudo do site-->
        Conteudo
    </div>
     
</body>

</html> 