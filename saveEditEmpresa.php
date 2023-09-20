<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $cnpj = $_POST['cnpj'];
        $endereco = $_POST['endereco'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];

        $sqlUpdate = "UPDATE empresa SET nome='$nome', cnpj='$cnpj', endereco='$endereco', cidade='$cidade', estado='$estado' WHERE id='$id'";

        $result = $conexao->query($sqlUpdate);
    }
    header('Location: cadastro_empresa.php');