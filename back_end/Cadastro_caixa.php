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

} elseif (isset($_POST['Salvar-1'])) {
    $id_caixa = $_POST['id_caixa-1'];
    $nome_caixa = $_POST['nome_caixa'];
    $status = $_POST['status'];
    $data_abertura = $_POST['data_abertura'];
    $data_fechamento = $_POST['data_fechamento'];
    $id_usuario=$_SESSION['usuarioId'];


    $query_4 = "select status from caixa where ID_CAIXA ='$id_caixa'";
    $status_anterior = mysqli_query($conexao, $query_4);
    $variavel_3 = mysqli_fetch_assoc($status_anterior);
    $status_anterior1 = $variavel_3['status'];
   
    if( strlen($data_abertura)  > "0" && ( strlen($data_fechamento)  == "0")  && $status_anterior1 <> $status){
           $_SESSION['erro_cadastro'] = "Não é possível atualizar o status do caixa pois ele está aberto!";
           header("Location:/loja_virtual/Tela_listar_caixa.php");
    } else {
    //Se a existe data de abertura o status do caixa não pode ser mudado!
    $query = "UPDATE CAIXA SET NOME ='$nome_caixa', status ='$status', id_usuario='$id_usuario', data_cadastro=now() where ID_CAIXA ='$id_caixa'";
    $resultado = mysqli_query($conexao, $query);
    if ($resultado == 1) {
        $_SESSION['sucesso_cadastro'] = "Atualizado com sucesso!";
        header("Location:/loja_virtual/Tela_listar_caixa.php");
    } else {
        $_SESSION['erro_cadastro'] = "Caixa não atualizado!";
        header("Location:/loja_virtual/Tela_listar_caixa.php");
    }
    }
} 

else {
   header("Location:/loja_virtual/Tela_cadastro_caixa.php");
  }
  
  
  
?>