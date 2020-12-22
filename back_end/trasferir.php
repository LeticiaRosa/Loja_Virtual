<?php
session_start();
require_once ("conexao.php");
$nome = $_POST['nome'];
$id_produto = $_POST['id_produto'];
$produto = $_POST['produto'];
$Quantidade = $_POST['Quantidade'];
$Qtd_tras = $_POST['Qtd_tras'];
$empresa = $_POST['empresa'];
$id_usuario=$_SESSION['usuarioId'];
$query = "select id_empresa from empresa where nome = '$nome'";
$query_1 = "select id_empresa from empresa where nome = '$empresa'";
$empresa_1 = mysqli_query($conexao, $query );
$empresa_tras = mysqli_query($conexao, $query_1 );
$variavel = mysqli_fetch_assoc($empresa_1);
$variavel_1 = mysqli_fetch_assoc($empresa_tras);
if(isset($_POST['trasferir'])){
    $query_2 ="insert into trasferencia (id_empresa,id_empresa_tras,id_produto,id_usuario,qtd_trasfere,mensagem,status,data_cadastro)values('{$variavel['id_empresa']}','{$variavel_1['id_empresa']}','$id_produto','$id_usuario','$Qtd_tras','Existe uma trasferencia pendete de aprovação','N',now())";
    echo  $query_2;
    $produto= mysqli_query($conexao, $query_2);
    if($produto==1){
        $_SESSION['sucesso_cadastro'] = "Trasferencia Criada";
        header("Location:/loja_virtual/Tela_listar_trafere.php");
    }else{
        $_SESSION['erro_cadastro'] = "Trasferencia Não Criada";}
        header("Location:/loja_virtual/Tela_listar_trafere.php");
}
