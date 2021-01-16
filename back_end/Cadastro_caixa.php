<?php
session_start();
require_once ("conexao.php");
if(isset($_POST['acao'])){
$nome_caixa = $_POST['nome_caixa'];
$empresa1= $_POST['Empresa1'];
$maquina= $_POST['maquina'];
$status= $_POST['status'];
$observacao=$_POST['Observacao'];
$id_usuario=$_SESSION['usuarioId'];
$query_1 = "select id_empresa from empresa where nome = '$empresa1'";
$id_empresa = mysqli_query($conexao, $query_1);
$empresa = mysqli_fetch_assoc($id_empresa);
$query_2 = "INSERT INTO CAIXA (ID_EMPRESA, NOME,NOME_MAQUINA,STATUS,OBSERVACAO,id_usuario,data_cadastro) values ('{$empresa['id_empresa']}', CONCAT('$nome_caixa','- ','$empresa1') , '$maquina', '$status' ,'$observacao','$id_usuario', now())";
$produto= mysqli_query($conexao, $query_2);
//echo $query_2;

if($produto==1){
    $_SESSION['sucesso_cadastro'] = "Inserido com sucesso!";
    header("Location:/loja_virtual/Tela_cadastro_caixa.php");
    mysqli_close($conexao);
} else {
    $_SESSION['erro_cadastro'] = "Caixa não cadastrado!";
    header("Location:/loja_virtual/Tela_cadastro_caixa.php");
}

}else {
   header("Location:/loja_virtual/Tela_cadastro_caixa.php");
  }
  
  
  
?>