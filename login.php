<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>
    <div id="esquerda">
        <img id="img_login" src="_imagens/Logo-tela-login-novo.png" width="400px">
    </div>

    <div id="direito">
        <div id="cabecalho_login">
                <br><br><br>
                <div id="texto_login">Login</div><br>
                <div id="texto_login_2">
                    <a href="registro.php">Registre - se para se conectar</a>
                </div>
        </div>

        <div id="direito_login">
            <form action="testeLogin.php" method="POST">
                <label id="label_login" for="usuario">E-mail:</label><br>
                <input id="input_login" type="text" id="usuario" name="email" placeholder="Email"><br><br><br>
                <label id="label_login" for="senha">Senha:</label><br>
                <input id="input_login" type="password" id="senha" name="senha" placeholder="Senha"><br><br><br><br>
                <input id="button_login" type="submit" value="Login">
            </form>
        </div>
    </div>
</body>
</html>