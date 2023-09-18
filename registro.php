<?php

    if(isset($_POST['submit']))
    {
        //print_r('Nome:' . $_POST['nome']);
        //print_r('<br>');
        //print_r('Email:' . $_POST['email']);
        //print_r('<br>');
        //print_r('Telefone:' . $_POST['telefone']);
        //print_r('<br>');
        //print_r('Perfil:' . $_POST['perfil']);
        //print_r('<br>');
        //print_r('Data de nascimento:' . $_POST['data_nascimento']);
        //print_r('<br>');
        //print_r('Cidade:' . $_POST['cidade']);
        //print_r('<br>');
        //print_r('Estado:' . $_POST['estado']);
        //print_r('<br>');
        //print_r('Endereço:' . $_POST['endereco']);

        include_once('config.php');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $perfil = $_POST['perfil'];
        $data_nasc = $_POST['data_nascimento'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $endereco = $_POST['endereco'];

        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,email,telefone,perfil,data_nasc,cidade,estado,endereco) VALUES ('$nome','$email','$telefone','$perfil','$data_nasc','$cidade','$estado','$endereco')");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registre - se</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <div id="esquerda">
        <img id="img_login" src="_imagens/Logo-tela-login.png" width="500px">
    </div>

    <div id="direito">
        <div id="cabecalho_login">
                <br><br><br>
                <div id="texto_login">Registre - se</div><br>
                <div id="texto_login_2">
                    <a href="login.php">Entre com seu login</a>
                </div>
        </div>

        <div id="direito_registro">
            <form action="registro.php" method="POST">
                <fieldset>
                    <legend><b>Registre - se</b></legend><br>
                    <div class="inputBox">
                        <input type="text" name="nome" id="nome" class="inputUser" required>
                        <label for="nome" class="labelInput">Nome completo</label>
                    </div><br>
                    <div class="inputBox">
                        <input type="email" name="email" id="email" class="inputUser" required>
                        <label for="email" class="labelInput">E-mail</label>
                    </div><br>
                    <div class="inputBox">
                        <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                        <label for="telefone" class="labelInput">Telefone</label>
                    </div><br>
                    <div id="form_registro">Perfil</div>
                        <select name="perfil" id="perfil">
                            <option value="administrador">Administrador</option>
                            <option value="usuario">Usuário</option>
                            <option value="visualizador">Visualizador</option>
                        </select>
                    <div class="inputBox">
                        <label for="data_nascimento"><b>Data de Nascimento</b></label>
                        <input type="date" name="data_nascimento" id="data_nascimento" class="inputUser" required>
                    </div><br>
                    <div class="inputBox">
                        <input type="text" name="cidade" id="cidade" class="inputUser" required>
                        <label for="cidade" class="labelInput">Cidade</label>
                    </div><br>
                    <div class="inputBox">
                        <input type="text" name="estado" id="estado" class="inputUser" required>
                        <label for="estado" class="labelInput">Estado</label>
                    </div><br>
                    <div class="inputBox">
                        <input type="text" name="endereco" id="endereco" class="inputUser" required>
                        <label for="endereco" class="labelInput">Endereço</label>
                    </div><br>
                    <input type="submit" name="submit" id="submit"><br>
                </fieldset>
            </form>
        </div>
    </div>
</body>
</html>