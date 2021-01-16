<?php
session_start();
require_once ("conexao.php");
if(isset($_POST['acao'])){
$nome_caixa = $_POST['nome_caixa'];
$valor_inicial = $_POST['valor_inicial'];
$observacao=$_POST['Observacao'];
$id_usuario=$_SESSION['usuarioId'];
$query_1 = "select id_caixa from CAIXA where nome = '$nome_caixa'";
$id_caixa = mysqli_query($conexao, $query_1);
$caixa = mysqli_fetch_assoc($id_caixa);

$query_2 = "INSERT INTO CONTROLE_CAIXA (ID_CAIXA,VALOR_INICIAL,ID_USUARIO_ABERTURA,DATA_ABERTURA,HORA_ABERTURA,OBSERVACAO ) values ('{$caixa['id_caixa']}','$valor_inicial', '$id_usuario', CURDATE(),  CURTIME() ,'$observacao')";
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
  }
  
  
  
?>