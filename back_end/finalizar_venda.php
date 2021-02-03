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
    $troco =$_POST['troco'];
    $Valor_total = $_POST['Valor_total'];
    $valor_tratado=str_replace(',','.',str_replace('.','',$Valor_total));
    $desconto = $_POST['desconto'];
    $tl_fim = $_POST['tl_fim'];
    $valor_tratado_fim=str_replace(',','.',str_replace('.','',$tl_fim));
    /// BUSCAR ID DO VENDEDOR (VENDEDOR = USUARIO)\\\\\\
    if ($nome!=""){
        $query = "select ID_USUARIO from USUARIO where nome_usuario LIKE '%$nome%'";
       // echo $query;
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
  $query_1 = "SELECT cx.id_caixa,cax.id as id_controle FROM CAIXA  AS CX  LEFT OUTER JOIN CONTROLE_CAIXA  AS CAX
  ON CX.ID_CAIXA=CAX.ID_CAIXA
  WHERE CAX.ID=(SELECT MAX(AUX.ID)
FROM CONTROLE_CAIXA AS AUX  WHERE AUX.ID_CAIXA=CAX.ID_CAIXA AND DATA_FECHAMENTO 
       IS NULL )	AND CX.NOME_MAQUINA='$maquina' AND STATUS = 'Ativo'";
  $id_caixa = mysqli_query($conexao, $query_1);
  $caixa = mysqli_fetch_assoc($id_caixa);
  
  if($caixa['id_caixa']!=""){
    
      ///INSERE PRIMEIRO NA TABELA DE VENDAS OS DADOS REFERENTE A VENDA/\\\\
      $INSERT_VENDA="INSERT INTO VENDAS (ID_CAIXA,id_control_caixa,ID_VENDEDOR,ID_CLIENTE,TOTAL_ITENS,TIPO_VENDA,PARCELAS,TOTAL_VENDA,DESCONTO,TOTAL_DESCONTO,DATA_VENDA,HORA_VENDA, TROCO, ID_USUARIO,DATA_CADASTRO)VALUES('{$caixa['id_caixa']}','{$caixa['id_controle']}',{$variavel['ID_USUARIO']},{$client['ID_CLIENTE']},'$total_itens','$pagamento','$forma_pagamento','$valor_tratado','$desconto','$valor_tratado_fim',CURDATE(),CURTIME(),'$troco', $id_usuario, now())";
      echo $INSERT_VENDA;
      $ins_vend=mysqli_query($conexao, $INSERT_VENDA);
        if($ins_vend==1){
           // echo "ENTROU";
           $VENDA_ID="SELECT MAX(ID_VENDA) AS ID_VENDA FROM vendas WHERE ID_CAIXA='{$caixa['id_caixa']}'";
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


}elseif(isset($_POST['fechar'])){
    $Caixa =$_POST['Caixa'];
    $dt_abertura =$_POST['dt_abertura'];
    $hr_abertura =$_POST['hr_abertura'];
    $v_total =$_POST['v_total'];
   
    $valor_tratado=str_replace(',','.',str_replace('.','',$v_total));
   // echo $valor_tratado;
    $qtd_vendas =$_POST['qtd_vendas'];
    $dt_fechamento =$_POST['dt_fechamento'];
    $hr_fechamento =$_POST['hr_fechamento'];
    $query_1 = "SELECT ID_CAIXA FROM CAIXA WHERE NOME = '$Caixa' AND STATUS = 'Ativo'";
    
    $id_caixa = mysqli_query($conexao, $query_1);
    $caixa = mysqli_fetch_assoc($id_caixa);
   // echo $caixa['ID_CAIXA'];
    if($caixa['ID_CAIXA']!=""){
        $update_caixa="UPDATE controle_caixa SET   ID_USUARIO_FECHAMENTO='$id_usuario', DATA_FECHAMENTO='$dt_fechamento',   HORA_FECHAMENTO='$hr_fechamento',    VALOR_TOTAL='$valor_tratado',  QTD_VENDAS='$qtd_vendas' WHERE ID_CAIXA='{$caixa['ID_CAIXA']}'  AND DATA_ABERTURA='$dt_abertura' AND HORA_ABERTURA='$hr_abertura'";
       //echo $update_caixa;
        $resultado=mysqli_query($conexao, $update_caixa);
        if($resultado>=1){
            $_SESSION['sucesso_cadastro'] = "Caixa finalizado com sucesso!";
            header("Location:/loja_virtual/Tela_fechar_caixa.php");
            mysqli_close($conexao);
         };
   

}
}