<?php
    include_once('config.php');

    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $pis = $_POST['pis'];
        $cpf = $_POST['cpf'];
        $empresa = $_POST['empresa'];
        $admissao = $_POST['admissao'];
        $horario = $_POST['horario'];
        $funcao = $_POST['funcao'];

        $sqlUpdate = "UPDATE funcionarios SET nome='$nome', pis='$pis', cpf='$cpf', empresa='$empresa', admissao='$admissao', horario='$horario', funcao='$funcao' WHERE id='$id'";

        $result = $conexao->query($sqlUpdate);
    }
    header('Location: cadastro_funcionarios.php');