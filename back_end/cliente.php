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
    echo $cpf;
    echo $query;
    $produto = mysqli_query($conexao, $query);

    if ($produto == 1) {
        $_SESSION['sucesso_cadastro'] = "Cliente Cadastrado Com Sucesso";


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
    echo $query;
    $produto = mysqli_query($conexao, $query);

    if ($produto == 1) {
        $_SESSION['sucesso_cadastro'] = "Cliente Atualizado Com Sucesso";


        header("Location:/loja_virtual/Tela_listar_clientes.php");
    } 

}elseif (isset($_POST['Excluir'])){
    $id=$_POST['id'];
    $query = "delete from  CLIENTE where id_cliente='$id'";
    echo $query;
    $produto = mysqli_query($conexao, $query);

    if ($produto == 1) {
        $_SESSION['sucesso_cadastro'] = "Cliente Excluido Com Sucesso";


        header("Location:/loja_virtual/Tela_listar_clientes.php");
    } 
}