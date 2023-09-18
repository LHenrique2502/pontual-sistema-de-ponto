<?php

    //print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']))
    {
        //Acessa o sistema
        include_once('config.php');
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        print_r('Email: ' . $email);
        print_r('<br>');
        print_r('Senha: ' . $senha);
    }
    else
    {
        //Não acessa o sistema
        header('Location: login.php');
    }
?>