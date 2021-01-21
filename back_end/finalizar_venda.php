<?php
session_start();
require_once("conexao.php");
$resultado=0;
$id_usuario = $_SESSION['usuarioId'];

if (isset($_POST['Confirmar'])) {
    if(empty ($_POST['Vendedo'])){
        $nome=null;
    }else{
        $nome = $_POST['Vendedo'];
    }
    if(empty ($_POST['Cliente'])){
    $Cliente =null;
    }else{
        $Cliente =$_POST['Cliente'];
    }
    $total_itens = $_POST['total_itens'];
    $pagamento = $_POST['pagamento'];
    if(empty ($_POST['forma_pagamento'])){
        $forma_pagamento = null;
    }else{
        $forma_pagamento=$_POST['forma_pagamento'];
    }
    
    $Valor_total = $_POST['Valor_total'];
    $desconto = $_POST['desconto'];
    $tl_fim = $_POST['tl_fim'];
    /// BUSCAR ID DO VENDEDOR (VENDEDOR = USUARIO)\\\\\\
    if ($nome!=""){
        $query = "select ID_USUARIO from USUARIO where nome LIKE '%$nome%'";
        $VENDEDOR = mysqli_query($conexao, $query );
        $variavel = mysqli_fetch_assoc($VENDEDOR);
       // echo   $variavel['ID_USUARIO'] ;
        

    }else {
       $variavel['ID_USUARIO']="null";
    }
        ////////////BUSCAR ID DO CLIENTE\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    if ($Cliente!=""){
         $query1 = "select ID_CLIENTE from CLIENTE where nome LIKE '%$Cliente%'";
        $clint = mysqli_query($conexao, $query1 );
        $client = mysqli_fetch_assoc($clint);
    }
    else {
        $client['ID_CLIENTE']="null";
     }
    
    ////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

    ///////////////\\\\\\\\\\\\\\\\\\\\\\\\\

$maquina = gethostbyaddr($_SERVER['REMOTE_ADDR']);
//echo $maquina;
  $query_1 = "SELECT ID_CAIXA FROM CAIXA WHERE NOME_MAQUINA = '$maquina' AND STATUS = 'Ativo'";
  $id_caixa = mysqli_query($conexao, $query_1);
  $caixa = mysqli_fetch_assoc($id_caixa);
 // echo $caixa['ID_CAIXA'];
  if($caixa['ID_CAIXA']!=""){
      ///INSERE PRIMEIRO NA TABELA DE VENDAS OS DADOS REFERENTE A VENDA/\\\\
      $INSERT_VENDA="INSERT INTO VENDAS (ID_CAIXA,ID_VENDEDOR,ID_CLIENTE,TOTAL_ITENS,TIPO_VENDA,PARCELAS,TOTAL_VENDA,DESCONTO,TOTAL_DESCONTO,DATA_VENDA,HORA_VENDA, ID_USUARIO,DATA_CADASTRO)VALUES('{$caixa['ID_CAIXA']}',{$client['ID_CLIENTE']},{$variavel['ID_USUARIO']},'$total_itens','$pagamento','$forma_pagamento','$Valor_total','$desconto','$tl_fim',CURDATE(),CURTIME(),$id_usuario, now())";
      //echo $INSERT_VENDA;
      $ins_vend=mysqli_query($conexao, $INSERT_VENDA);
        if($ins_vend==1){
           // echo "ENTROU";
           $VENDA_ID="SELECT MAX(ID_VENDA) AS ID_VENDA FROM vendas WHERE ID_CAIXA='{$caixa['ID_CAIXA']}'";
           $ID_VENDA = mysqli_query($conexao, $VENDA_ID);
            $ID = mysqli_fetch_assoc($ID_VENDA);
            for($i=0;$i<count($_SESSION['id']);$i++){
                $quantidade=$_SESSION['quant'][$i];
                $id_produto=$_SESSION['id'][$i];
                
                $INSERT_VENDA_PROD="INSERT INTO VENDAS_PRODUTO(ID_VENDA,ID_PRODUTO,QTD_ITENS,ID_USUARIO,DATA_CADASTRO)VALUES('{$ID['ID_VENDA']}','$id_produto','$quantidade','$id_usuario',NOW())";
                $resultado=mysqli_query($conexao, $INSERT_VENDA_PROD);
                
                $update_protudo="update produto set quantidade=quantidade-'$quantidade' where id_produto='$id_produto'";
               // echo  $update_protudo;
                $resultado=$resultado+mysqli_query($conexao, $update_protudo);
             
                
            };
            
             if($resultado>1){
                $_SESSION['sucesso_cadastro'] = "Venda finalizada com sucesso!";
                header("Location:/loja_virtual/Tela_caixa.php");
                mysqli_close($conexao);
             };
        }
    }



unset ($_SESSION['quant']);
unset ($_SESSION['id']);
}