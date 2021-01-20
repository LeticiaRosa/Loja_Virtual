<?php
session_start();
require_once("conexao.php");
$resultado=0;
$id_usuario = $_SESSION['usuarioId'];

if (isset($_POST['Confirmar'])) {
    $nome = $_POST['Vendedo'];
    $Cliente = $_POST['Cliente'];
    $total_itens = $_POST['total_itens'];
    $pagamento = $_POST['pagamento'];
    $forma_pagamento = $_POST['forma_pagamento'];
    $Valor_total = $_POST['Valor_total'];
    $desconto = $_POST['desconto'];
    $tl_fim = $_POST['tl_fim'];
    /// BUSCAR ID DO VENDEDOR (VENDEDOR = USUARIO)\\\\\\
    $query = "select ID_USUARIO from USUARIO where nome LIKE '%$nome%'";
    $VENDEDOR = mysqli_query($conexao, $query );
    $variavel = mysqli_fetch_assoc($VENDEDOR);
    
    ////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    ////////////BUSCAR ID DO CLIENTE\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    $query1 = "select ID_CLIENTE from CLIENTE where nome LIKE '%$Cliente%'";
    $clint = mysqli_query($conexao, $query1 );
    $client = mysqli_fetch_assoc($clint);
   
    ///////////////\\\\\\\\\\\\\\\\\\\\\\\\\
for($i=0;$i<count($_SESSION['id']);$i++){
    $quantidade=$_SESSION['quant'][$i];
    $id_produto=$_SESSION['id'][$i];
    $update_protudo="update produto set qunatidade=quantidade-'$quantidade' where id_produto='$id_produto'";
    $resultado=mysqli_query($conexao, $query_2);
    //echo  $update_protudo;
};
$maquina = gethostbyaddr($_SERVER['REMOTE_ADDR']);
  $query_1 = "SELECT ID_CAIXA FROM CAIXA WHERE NOME_MAQUINA = '$maquina' AND STATUS = 'Ativo'";
  $id_caixa = mysqli_query($conexao, $query_1);
  $caixa = mysqli_fetch_assoc($id_caixa);
 // echo $caixa['ID_CAIXA'];
  if($caixa['ID_CAIXA']!=""){
      ///INSERE PRIMEIRO NA TABELA DE VENDAS OS DADOS REFERENTE A VENDA/\\\\
      $INSERT_VENDA="INSERT INTO VENDA (ID_CAIXA,ID_VENDEDOR,ID_CLIENTE,TOTAL_ITENS,TIPO_VENDA,PARCELAS,TOTAL_VENDA,DESCONTO,TOTAL_DESCONTO,DATA_VENDA,HORA_VENDA, ID_USUARIO,DATA_CADASTRO)VALUES('{$caixa['ID_CAIXA']}',{$client['ID_CLIENTE']}','{$variavel['ID_USUARIO']}','$total_itens','$pagamento','$Valor_total','$desconto','$tl_fim',$id_usuario, now())";
      echo $INSERT_VENDA;
    }



unset ($_SESSION['quant']);
unset ($_SESSION['id']);
}