<?php
session_start();
require_once ("conexao.php");
if(isset($_POST['acao'])){
$nome = $_POST['nome'];
$descricao= $_POST['descricao'];
$CNPJ= $_POST['CNPJ'];
$Endereco= $_POST['Endereco'];
$observacao=$_POST['Observacao'];
$id_usuario=$_SESSION['usuarioId'];
$razao_social=$_POST['razao_social'];
$query_2 = "insert into empresa (nome, descricao,CNPJ,Endereco,observacao,id_usuario,data_cadastro,razao_social) values ('$nome', '$descricao', '$CNPJ', '$Endereco' ,'$observacao','$id_usuario', now(),'$razao_social')";
$produto= mysqli_query($conexao, $query_2);
echo $query_2;
if($produto==1){
    $_SESSION['sucesso_cadastro'] = "Empresa inserida com sucesso";
    header("Location:/loja_virtual/Tela_cadastro_empresa.php");
    mysqli_close($conexao);
}
    else {
        $_SESSION['erro_cadastro'] = "Empresa não cadastrada";
    header("Location:/loja_virtual/Tela_cadastro_empresa.php");
    }
}elseif (isset($_POST['Salvar'])) {
    $id = $_POST['id_empresa'];
    $nome = $_POST['nome'];
    $Status= $_POST['status'];
    $Razao_Social = $_POST['Razao_Social'];
    $descricao = $_POST['descricao'];
    $CNPJ = $_POST['CNPJ'];
    $endereco = $_POST['endereco'];
    $observacao = $_POST['observacao'];
    $id_usuario = $_SESSION['usuarioId'];
  
    if ($Status == "S") {
      $query_2 = "UPDATE EMPRESA SET  descricao='$descricao'  ,NOME='$nome',RAZAO_SOCIAL='$Razao_Social',STATUS='S',CNPJ='$CNPJ',ENDERECO='$endereco',OBSERVACAO='$observacao',ID_USUARIO_ALT='$id_usuario',DATA_ALTEROU=now() WHERE ID_EMPRESA='$id'";
      echo $query_2;
      $produto = mysqli_query($conexao, $query_2);
      if ($produto == 1) {
        $_SESSION['sucesso_cadastro'] = "Atualizado Com Sucesso";
             header("Location:/loja_virtual/Tela_listar_empresa.php");
      }
      mysqli_close($conexao);
    } elseif ($Status == "N") {
      $query_2 = "UPDATE EMPRESA SET  descricao='$descricao'  ,NOME='$nome',RAZAO_SOCIAL='$Razao_Social',STATUS='N',CNPJ='$CNPJ',ENDERECO='$endereco',OBSERVACAO='$observacao',ID_USUARIO_ALT='$id_usuario',DATA_ALTEROU=now() WHERE ID_EMPRESA='$id'";
      echo $query_2;
      $produto = mysqli_query($conexao, $query_2);
      if ($produto == 1) {
        $_SESSION['sucesso_cadastro'] = "Atualizado Com Sucesso";
            header("Location:/loja_virtual/Tela_listar_empresa.php");
      }
      mysqli_close($conexao);
    }
  }elseif (isset($_POST['Excluir'])) {
    $id = $_POST['id_empresa'];
    $query_2 = "delete from EMPRESA where id_empresa='$id'";
    echo $query_2;
    $produto = mysqli_query($conexao, $query_2);
    
  
    if ($produto == 1) {
      $_SESSION['sucesso_cadastro'] = "Excluido Com Sucesso";
      header("Location:/loja_virtual/Tela_listar_empresa.php");
    }
    mysqli_close($conexao);
  } else {
  
   header("Location:/loja_virtual/Tela_listar_empresa.php");
  }
  
  
  
?>