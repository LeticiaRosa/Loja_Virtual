<?php
if (empty ($_POST['usuario'])|| empty ($_POST['senha'])) {
    header('Location:/Loja_Virtual/Tela_login.php');

    exit();
}

define("HOST","25.107.219.2");
define("USUARIO","Gabriel");
define("SENHA","Gb@30173572");
define("DB","Loja");

$conexao= mysqli_connect(HOST,USUARIO,SENHA,DB) or die("Não Foi Possivel conectar ao banco");
?>