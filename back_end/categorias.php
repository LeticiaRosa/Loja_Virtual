<?php
session_start();
require_once ("conexao.php");
if(isset($_POST['acao'])){
$nome = $_POST['nome'];
$descricao= $_POST['descricao'];
$observacao=$_POST['observacao'];
$id_usuario=$_SESSION['usuarioId'];

    $query_2 = "insert into CATEGORIA (nome, descricao,  observacao,id_usuario ,data_cadastro) values ('$nome', '$descricao','$observacao','$id_usuario', now())";
    ECHO $query_2;
    $produto= mysqli_query($conexao, $query_2);
   
}


?>