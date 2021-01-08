<?php
session_start();
require_once("conexao.php");
if (isset($_POST['acao'])) {
    $nome = $_POST['nome'];
    $Login = $_POST['Login'];
    $Senha = $_POST['Senha'];
    $empresa = $_POST['Empresa'];
    $permissao = $_POST['permissao'];
    $observacao = $_POST['observacao'];
    $id_usuario = $_SESSION['usuarioId'];
    $query_4 = "select id_empresa from empresa where nome = '$empresa'";
    $id_empresa = mysqli_query($conexao, $query_4);
    $variavel_3 = mysqli_fetch_assoc($id_empresa);
    $query = "Insert into usuario (nome_usuario,login,senha,permissao,id_empresa,id_usuario_cad,data_cadastro) values('$nome','$Login',md5('$Senha'),'$permissao','{$variavel_3['id_empresa']}','$id_usuario',now())";
    // echo $query;
    $resultado = mysqli_query($conexao, $query);
    if ($resultado == 1) {
        $_SESSION['sucesso_cadastro'] = "Usuario Cadastrado Com Sucesso";
        header("Location:/loja_virtual/Tela_cadastro_usuario.php");
    } else {
        $_SESSION['erro_cadastro'] = "Erro ao Cadastrar Usuario";
        header("Location:/loja_virtual/Tela_cadastro_usuario.php");
    }
} elseif (isset($_POST['salvar'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $Login = $_POST['Login'];
    $Senha = $_POST['Senha'];
    $empresa = $_POST['Empresa'];
    if (empty($Senha))
        $verificador = 0;
    else {
        $verificador = 1;
    }
    $permissao = $_POST['permissao'];
    $observacao = $_POST['observacao'];
    $id_usuario = $_SESSION['usuarioId'];
    $query_4 = "select id_empresa from empresa where nome = '$empresa'";
    $id_empresa = mysqli_query($conexao, $query_4);
    $variavel_3 = mysqli_fetch_assoc($id_empresa);
    if ($verificador == 0) {
        $query = "update usuario set  nome_usuario ='$nome',login='$Login',senha=senha, permissao='$permissao',id_empresa='{$variavel_3['id_empresa']}', id_usuario_alt='$id_usuario',  data_alterou=now()where id_usuario='$id'";
    } else {
        $query = "update usuario   set nome_usuario ='$nome',login='$Login',senha=md5('$Senha'), permissao='$permissao',id_empresa='{$variavel_3['id_empresa']}', id_usuario_alt='$id_usuario',  data_alterou=now()where id_usuario='$id'";
    }
    echo $query;
    $resultado = mysqli_query($conexao, $query);
    if ($resultado == 1) {
        $_SESSION['sucesso_cadastro'] = "Usuario Atualizado Com Sucesso";
        header("Location:/loja_virtual/Tela_listar_usuario.php");
    } else {
        $_SESSION['erro_cadastro'] = "Erro ao Atualizar Usuario";
        header("Location:/loja_virtual/Tela_listar_usuario.php");
    }
} elseif (isset($_POST['excluir'])) {
    $id = $_POST['id'];

    $query = "delete from  usuario where id_usuario='$id'";

    //echo $query;
    $resultado = mysqli_query($conexao, $query);
    if ($resultado == 1) {
        $_SESSION['sucesso_cadastro'] = "Usuario Excluido Com Sucesso";
        header("Location:/loja_virtual/Tela_listar_usuario.php");
    } else {
        $_SESSION['erro_cadastro'] = "Erro ao Excluir Usuario";
        header("Location:/loja_virtual/Tela_listar_usuario.php");
    }
}
