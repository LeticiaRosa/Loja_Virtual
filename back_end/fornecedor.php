<?php
session_start();
require_once("conexao.php");
if (isset($_POST['acao'])) {

  $nome = $_POST['nome'];
  $Razao_Social = $_POST['Razao_Social'];
  $cnpj = $_POST['CNPJ'];
  $fixo = $_POST['fixo'];
  $celular = $_POST['celular'];
  $Contato = $_POST['Contato'];
  $E_MAIL = $_POST['E-MAIL'];
  $endereco = $_POST['endereco'];
  $observacao = $_POST['observacao'];
  $id_usuario = $_SESSION['usuarioId'];
  $CEP = $_POST['CEP'];

  $query_2 = "INSERT INTO FORNECEDOR(NOME,RAZAO_SOCIAL,CONTATO,CNPJ,TEL_CEL,TEL_FIXO,ENDERECO,CEP,E_MAIL,ID_USUARIO,OBSERVACAO,DATA_CADASTRO) VALUES('$nome','$Razao_Social','$Contato','$cnpj','$celular','$fixo','$endereco','$CEP','$E_MAIL','$id_usuario','$observacao', now())";
  echo $query_2;
  $produto = mysqli_query($conexao, $query_2);
  mysqli_close($conexao);

  if ($produto == 1) {
    $_SESSION['sucesso_cadastro'] = "Produto inserido com sucesso";
    header("Location:/loja_virtual/Cadastro_fornecedor.php");
  } else {
    $_SESSION['erro_cadastro'] = "Produto Não cadastrado";
    header("Location:/loja_virtual/Cadastro_fornecedor.php");
  }
} elseif (isset($_POST['Salvar'])) {
  $id = $_POST['id_fornecedor'];
  $nome = $_POST['nome'];
  $Razao_Social = $_POST['Razao_Social'];
  $Status = $_POST['status'];
  $Contato = $_POST['Contato'];
  $cnpj = $_POST['CNPJ'];
  $fixo = $_POST['fixo'];
  $celular = $_POST['celular'];
  $endereco = $_POST['endereco'];
  $CEP = $_POST['CEP'];
  $E_MAIL = $_POST['E-MAIL'];

  $observacao = $_POST['observacao'];
  $id_usuario = $_SESSION['usuarioId'];

  if ($Status == "S") {
    $query_2 = "UPDATE FORNECEDOR SET   NOME='$nome',RAZAO_SOCIAL='$Razao_Social',STATUS='S',CONTATO='$Contato',CNPJ='$cnpj',TEL_FIXO='$fixo',TEL_CEL='$celular',ENDERECO='$endereco',CEP='$CEP',E_MAIL='$E_MAIL',OBSERVACAO='$observacao',ID_USUARIO_ALT='$id_usuario',DATA_ALTEROU=now() WHERE ID_FORNECEDOR='$id'";
    echo $query_2;
    $produto = mysqli_query($conexao, $query_2);
    if ($produto == 1) {
      $_SESSION['sucesso_cadastro'] = "Atualizado Com Sucesso";


      header("Location:/loja_virtual/Tela_listar_fornecedor.php");
    }
    mysqli_close($conexao);
  } elseif ($Status == "N") {
    $query_2 = "UPDATE FORNECEDOR SET   NOME='$nome',RAZAO_SOCIAL='$Razao_Social',STATUS='N',CONTATO='$Contato',CNPJ='$cnpj',TEL_FIXO='$fixo',TEL_CEL='$celular',ENDERECO='$endereco',CEP='$CEP',E_MAIL='$E_MAIL',OBSERVACAO='$observacao',ID_USUARIO_ALT='$id_usuario',DATA_ALTEROU=now() WHERE ID_FORNECEDOR='$id'";
    echo $query_2;
    $produto = mysqli_query($conexao, $query_2);
    if ($produto == 1) {
      $_SESSION['sucesso_cadastro'] = "Atualizado Com Sucesso";


      header("Location:/loja_virtual/Tela_listar_fornecedor.php");
    }
    mysqli_close($conexao);
  }
} elseif (isset($_POST['Excluir'])) {
  $id = $_POST['id_fornecedor'];
  $query_2 = "delete from FORNECEDOR where id_fornecedor='$id'";
  echo $query_2;
  $produto = mysqli_query($conexao, $query_2);
  

  if ($produto == 1) {
    $_SESSION['sucesso_cadastro'] = "Excluido Com Sucesso";
    header("Location:/loja_virtual/Tela_listar_fornecedor.php");
  }
  mysqli_close($conexao);
} else {

  header("Location:/loja_virtual/Tela_listar_fornecedor.php");
}
?>