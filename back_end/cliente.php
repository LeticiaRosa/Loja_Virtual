<?php
session_start();
require_once("conexao.php");
if (isset($_POST['acao'])) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $EMAIL = $_POST['E-MAIL'];
    $fixo = $_POST['fixo'];
    $celular = $_POST['celular'];
    $endereco = $_POST['endereco'];
    $CEP = $_POST['CEP'];
    $observacao = $_POST['observacao'];
    $id_usuario = $_SESSION['usuarioId'];
    $query = "insert into CLIENTE (nome, cpf,  e_mail,fixo ,celular,Endereco,cep,observacao,id_usuario,data_cadastro) values ('$nome', '$cpf','$EMAIL','$fixo','$celular','$endereco','$CEP','$observacao',$id_usuario, now())";
    //echo $cpf;
    //echo $query;
    $produto = mysqli_query($conexao, $query);

    if ($produto == 1) {
        $_SESSION['sucesso_cadastro'] = "Inserido com sucesso!";
        header("Location:/loja_virtual/Cadastro_clientes.php");
    } else {
        $_SESSION['erro_cadastro'] = "Cliente não cadastrado!";
        header("Location:/loja_virtual/Cadastro_clientes.php");
    }

}elseif (isset($_POST['Salvar'])){
    $id=$_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $EMAIL = $_POST['E-MAIL'];
    $fixo = $_POST['fixo'];
    $celular = $_POST['celular'];
    $endereco = $_POST['endereco'];
    $CEP = $_POST['CEP'];
    $observacao = $_POST['observacao'];
    $id_usuario = $_SESSION['usuarioId'];
    $query = "update CLIENTE set nome='$nome', cpf='$cpf',  e_mail='$EMAIL',fixo='$fixo' ,celular='$celular',Endereco='$endereco',cep='$CEP',observacao='$observacao',id_usuario_alt=$id_usuario,data_alterou=now() where id_cliente='$id'";
    //echo $query;
    $produto = mysqli_query($conexao, $query);

    if ($produto == 1) {
        $_SESSION['sucesso_cadastro'] = "Atualizado com sucesso!";
        header("Location:/loja_virtual/Tela_listar_clientes.php");
    } else {
        $_SESSION['erro_cadastro'] = "Cliente não atualizado!";
        header("Location:/loja_virtual/Tela_listar_clientes.php");
    }

}elseif (isset($_POST['Excluir'])){
    $id=$_POST['id'];
    $query = "delete from  CLIENTE where id_cliente='$id'";
    echo $query;
    $produto = mysqli_query($conexao, $query);

    if ($produto == 1) {
        $_SESSION['sucesso_cadastro'] = "Excluído com sucesso!";
        header("Location:/loja_virtual/Tela_listar_clientes.php");
    } else {
        $_SESSION['erro_cadastro'] = "Cliente não excluído!";
        header("Location:/loja_virtual/Tela_listar_clientes.php");
    }
}