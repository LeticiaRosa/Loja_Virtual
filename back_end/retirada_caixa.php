<?php
session_start();
require_once ("conexao.php");
if(isset($_POST['Retirar'])){
  $maquina = gethostbyaddr($_SERVER['REMOTE_ADDR']);
  $query_1 = "SELECT ID_CAIXA FROM CAIXA WHERE NOME_MAQUINA = '$maquina' AND STATUS = 'Ativo'";
  $id_caixa = mysqli_query($conexao, $query_1);
  $caixa = mysqli_fetch_assoc($id_caixa);
 // echo $caixa['ID_CAIXA'];
  if($caixa['ID_CAIXA']!=""){
    $valor_retirda=$_POST['Valor'];
    $pessoa=$_POST['Valor'];
    $observacao=$_POST['observacao'];
    $id_usuario=$_SESSION['usuarioId'];
    $insert="insert into RETIRADA_CAIXA(id_caixa,valor_retirada,nome,data_retirada,observacao,id_usuario,data_cadastro)values('{$caixa['ID_CAIXA']}','$valor_retirda','$pessoa',CURDATE(),'$observacao','$id_usuario',now())";
    $resultado= mysqli_query($conexao, $insert);


      if($resultado==1){
    $_SESSION['sucesso_cadastro'] = "Retirada realizada com sucesso!";
    header("Location:/loja_virtual/Tela_caixa.php");
    mysqli_close($conexao);
    } else {
    $_SESSION['erro_cadastro'] = "Caixa não cadastrado!";
    header("Location:/loja_virtual/Tela_caixa.php");
    }
}else {
  header("Location:/loja_virtual/Tela_caixa.php");
 }

/*
$maquina = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$query_1 = "SELECT ID_CAIXA FROM CAIXA WHERE NOME_MAQUINA = '$maquina' AND STATUS = 'Ativo'";
$id_caixa = mysqli_query($conexao, $query_1);
$caixa = mysqli_fetch_assoc($id_caixa);
if($id_caixa==1){
  $query_2 = "SELECT ID_CAIXA FROM CONTROLE_CAIXA WHERE ID_CAIXA = '{$caixa['id_caixa']}' AND DATA_ABERTURA = CURDATE() AND DATA_FECHAMENTO IS NULL";
  $caixa_1 = mysqli_query($conexao, $query_2);
  $cai = mysqli_fetch_assoc($caixa_1);
} else{ 
    $_SESSION['erro_cadastro'] = "Verifique o status do caixa!";
    //header("Location:/loja_virtual/Tela_cadastro_caixa.php");
}

/*
$nome_caixa = $_POST['nome_caixa'];
$valor_inicial = $_POST['valor_inicial'];
$observacao=$_POST['Observacao'];
$id_usuario=$_SESSION['usuarioId'];
$query_1 = "select id_caixa from CAIXA where nome = '$nome_caixa'";
$id_caixa = mysqli_query($conexao, $query_1);
$caixa = mysqli_fetch_assoc($id_caixa);

$query_2 = "INSERT INTO RETIRADA_CAIXA(ID_CAIXA,VALOR_RETIRADA,NOME,DATA_RETIRADA,OBSERVACAO,ID_USUARIO,DATA_CADASTRO) 
values ('{$caixa['id_caixa']}','$valor_inicial', '$id_usuario', CURDATE(),  CURTIME() ,'$observacao')";
$produto= mysqli_query($conexao, $query_2);
echo $query_2;

if($produto==1){
    $_SESSION['sucesso_cadastro'] = "Inserido com sucesso!";
    //header("Location:/loja_virtual/Tela_cadastro_caixa.php");
    mysqli_close($conexao);
} else {
    $_SESSION['erro_cadastro'] = "Caixa não cadastrado!";
    //header("Location:/loja_virtual/Tela_cadastro_caixa.php");
}

}else {
  // header("Location:/loja_virtual/Tela_cadastro_caixa.php");
    */
  }
