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

$query_4 = "select DATA_ABERTURA,DATA_FECHAMENTO from CONTROLE_CAIXA where ID_CAIXA ='{$caixa['id_caixa']}' AND DATA_ABERTURA = CURDATE()";
$datas_caixa = mysqli_query($conexao, $query_4);
$variavel_4 = mysqli_fetch_assoc($datas_caixa);
$data_abertura= $variavel_4['DATA_ABERTURA'];
$data_fechamento= $variavel_4['DATA_FECHAMENTO'];

if( strlen($data_abertura)  > 0 && strlen($data_fechamento) == 0) {
       $_SESSION['erro_cadastro'] = "Não é possível abrir o caixa pois ele já está aberto!";
       header("Location:/loja_virtual/Tela_abrir_caixa.php");
} else {
  
$query_2 = "INSERT INTO CONTROLE_CAIXA (ID_CAIXA,VALOR_INICIAL,ID_USUARIO_ABERTURA,DATA_ABERTURA,HORA_ABERTURA,OBSERVACAO) values ('{$caixa['id_caixa']}','$valor_inicial', '$id_usuario', CURDATE(),  CURTIME() ,'$observacao')";
$produto= mysqli_query($conexao, $query_2);

if($produto==1){
    $_SESSION['sucesso_cadastro'] = "Caixa aberto com sucesso!";
    header("Location:/loja_virtual/Tela_abrir_caixa.php");
    mysqli_close($conexao);
} else {
    $_SESSION['erro_cadastro'] = "Caixa não cadastrado!";
    header("Location:/loja_virtual/Tela_abrir_caixa.php");
}


}}else {
 
   header("Location:/loja_virtual/Tela_cadastro_caixa.php");
  }
  
  
  
?>