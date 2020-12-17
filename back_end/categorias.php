<?php
session_start();
require_once("conexao.php");
if (isset($_POST['acao'])) {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $observacao = $_POST['observacao'];
    $id_usuario = $_SESSION['usuarioId'];

    $query_2 = "insert into CATEGORIA (nome, descricao,  observacao,id_usuario ,data_cadastro) values ('$nome', '$descricao','$observacao','$id_usuario', now())";
    echo $query_2;
    $produto = mysqli_query($conexao, $query_2);

    if ($produto == 1) {
        $_SESSION['sucesso_cadastro'] = "Inserido Com Sucesso";


        header("Location:/loja_virtual/Cadastro_categoria.php");
    } 
} elseif (isset($_POST['salvar'])) {

    $id = $_POST['id_categoria'];
    echo  $id;
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $observacao = $_POST['observacao'];
    $status = $_POST['status'];
    $id_usuario = $_SESSION['usuarioId'];
    if ($status == "S") {
        $query_2 = " UPDATE CATEGORIA SET nome='$nome', descricao='$descricao',  observacao='$observacao',id_usuario='$id_usuario' ,data_alteracao=now() ,STATUS='S',id_usuario_alterou='$id_usuario' WHERE ID_CATEGORIA='$id'";
        echo $query_2;
        $produto = mysqli_query($conexao, $query_2);

        if ($produto == 1) {
                $_SESSION['sucesso_cadastro'] = "Atualizado Com Sucesso";

            header("Location:/loja_virtual/Editar_categoria.php");
        } 
    } elseif ($status == "N") {
        $query_2 = "UPDATE CATEGORIA SET nome='$nome', descricao='$descricao',  observacao='$observacao',id_usuario='$id_usuario' ,data_alteracao=now() ,STATUS='N' ,id_usuario_alterou='$id_usuario' WHERE ID_CATEGORIA='$id'";
        echo $query_2;
        $produto = mysqli_query($conexao, $query_2);

        if ($produto == 1) {
            $_SESSION['sucesso_cadastro'] = "Atualizado Com Sucesso";

            header("Location:/loja_virtual/Editar_categoria.php");
        } 
    }
} elseif (isset($_POST['excluir'])) {

    $id = $_POST['id_categoria'];
    echo  $id;
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $observacao = $_POST['observacao'];
    $status = $_POST['status'];
    $id_usuario = $_SESSION['usuarioId'];
    
        $query_2 = " delete from  CATEGORIA WHERE ID_CATEGORIA='$id'";
        echo $query_2;
        $produto = mysqli_query($conexao, $query_2);

        if ($produto == 1) {
            $_SESSION['sucesso_cadastro'] = "Excluido Com Sucesso";

            header("Location:/loja_virtual/Editar_categoria.php");
        } 
    
} else {

 header("Location:/loja_virtual/Editar_categoria.php");
}


mysqli_close($conexao);
?>