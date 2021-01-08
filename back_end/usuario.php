<?php
session_start();
require_once ("conexao.php");
if(isset($_POST['acao'])){
    $nome = $_POST['nome'];
    $Login = $_POST['Login'];
    $Senha = $_POST['Senha'];
    $empresa = $_POST['Empresa'];
    $permissao = $_POST['permissao'];
    $observacao = $_POST['observacao'];
    $id_usuario=$_SESSION['usuarioId'];
    $query_4 = "select id_empresa from empresa where nome = '$empresa'";
    $id_empresa = mysqli_query($conexao, $query_4 );
    $variavel_3 = mysqli_fetch_assoc($id_empresa);
    $query="Insert into usuario (nome_usuario,login,senha,permissao,id_empresa,id_usuario_cad,data_cadastro) values('$nome','$Login',md5('$Senha'),'$permissao','{$variavel_3['id_empresa']}','$id_usuario',now())";
   // echo $query;
    $resultado= mysqli_query($conexao, $query);
    if($resultado==1){
        $_SESSION['sucesso_cadastro'] = "Usuario Cadastrado Com Sucesso";
        header("Location:/loja_virtual/Tela_cadastro_usuario.php");
    }else {
        $_SESSION['erro_cadastro'] = "Erro ao Cadastrar Usuario";
        header("Location:/loja_virtual/Tela_cadastro_usuario.php");
        }
}
