<?php
session_start();
require_once("conexao.php");


$resultado = 0;
$id_usuario = $_SESSION['usuarioId'];






if (isset($_POST['Confirmar'])) {
    echo $_POST['Confirmar'];
    $itens = $_POST['itens'];
    $venda = $_POST['venda'];
    $itens_saida = $_POST['itens-saida'];
    $venda_saida = $_POST['venda-saida'];
    $pagamento = $_POST['pagamento'];
    $tl_fim = $_POST['tl_fim'];
    $valor_tratado_fim = str_replace(',', '.', str_replace('.', '', $tl_fim));
    $venda_saida = str_replace(',', '.', str_replace('.', '', $venda_saida));
    $valor_venda = str_replace(',', '.', str_replace('.', '', $venda));

    if (empty($_POST['forma_pagamento'])) {
        $forma_pagamento = null;
    } else {
        $forma_pagamento = $_POST['forma_pagamento'];
    }


    $INSERT_VENDA = "INSERT INTO TROCAS(VALOR_ENTRADA,VALOR_SAIDA,QTD_ENTRADA,QTD_SAIDA,DATA_TROCA,HORA_TROCA,ID_USUARIO,DATA_CADASTRO)VALUES('$valor_venda','$venda_saida','$itens','$itens_saida',CURDATE(),CURTIME(),'$id_usuario',NOW())";
    $ins_vend = mysqli_query($conexao, $INSERT_VENDA);
    echo $valor_tratado_fim;
    if ($valor_tratado_fim > 0) {
        $maquina = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        //echo $maquina;
        $query_1 = "SELECT cx.id_caixa,cax.id as id_controle FROM CAIXA  AS CX  LEFT OUTER JOIN CONTROLE_CAIXA  AS CAX
                  ON CX.ID_CAIXA=CAX.ID_CAIXA
                  WHERE CAX.ID=(SELECT MAX(AUX.ID)
                FROM CONTROLE_CAIXA AS AUX  WHERE AUX.ID_CAIXA=CAX.ID_CAIXA AND DATA_FECHAMENTO 
                       IS NULL )	AND CX.NOME_MAQUINA='$maquina' AND STATUS = 'Ativo'";
        $id_caixa = mysqli_query($conexao, $query_1);
        $caixa = mysqli_fetch_assoc($id_caixa);

        if ($caixa['id_caixa'] != "") {
            $INSERT_VENDA = "INSERT INTO VENDAS (ID_CAIXA,id_control_caixa,TOTAL_ITENS,TIPO_VENDA,PARCELAS,TOTAL_VENDA,DESCONTO,TOTAL_DESCONTO,DATA_VENDA,HORA_VENDA, ID_USUARIO,DATA_CADASTRO)VALUES('{$caixa['id_caixa']}','{$caixa['id_controle']}','$itens_saida','$pagamento','$forma_pagamento','$valor_tratado_fim','','$valor_tratado_fim',CURDATE(),CURTIME(),$id_usuario, now())";
            echo $INSERT_VENDA;
            $ins_vend = mysqli_query($conexao, $INSERT_VENDA);
            if ($ins_vend == 1) {
                // echo "ENTROU";
                $VENDA_ID = "SELECT MAX(ID_VENDA) AS ID_VENDA FROM vendas WHERE ID_CAIXA='{$caixa['id_caixa']}'";
                $ID_VENDA = mysqli_query($conexao, $VENDA_ID);
                $ID = mysqli_fetch_assoc($ID_VENDA);
                for ($j = 0; $j < count($_SESSION['id_s']); $j++) {
                    $quantidade_s = $_SESSION['quant_s'][$j];
                    $id_produto_s = $_SESSION['id_s'][$j];
                    $INSERT_VENDA_PROD = "INSERT INTO VENDAS_PRODUTO(ID_VENDA,ID_PRODUTO,QTD_ITENS,ID_USUARIO,DATA_CADASTRO)VALUES('{$ID['ID_VENDA']}','$id_produto_s','$quantidade_s','$id_usuario',NOW())";
                    $resultado = mysqli_query($conexao, $INSERT_VENDA_PROD);
                }
            }
        }
    }


    if ($ins_vend > 0) {

        $troca_ID = "SELECT MAX(id_troca) AS id_troca FROM trocas";
        $ID_TROCA = mysqli_query($conexao, $troca_ID);
        $ID = mysqli_fetch_assoc($ID_TROCA);
        for ($i = 0; $i < count($_SESSION['id_e']); $i++) {

            /////increment quant
            $quantidade_e = $_SESSION['quant_e'][$i];
            $id_produto_e = $_SESSION['id_e'][$i];
            $INSERT_ITENS = "INSERT INTO TROCAS_ITENS(ID_TROCA,ID_PRODUTO,QTD_ITENS,TIPO_MOVIMENTO,ID_USUARIO,DATA_CADASTRO) VALUES('{$ID['id_troca']}','$id_produto_e',' $quantidade_e','ENTROU','$id_usuario',NOW())";

            $resultado = $resultado + mysqli_query($conexao, $INSERT_ITENS);
            $update_protudo = "update produto set quantidade=quantidade+'$quantidade_e' where id_produto=' $id_produto_e'";
            $resultado = $resultado + mysqli_query($conexao, $update_protudo);
        };

        for ($j = 0; $j < count($_SESSION['id_s']); $j++) {

            /////decrementando quant
            $quantidade_s = $_SESSION['quant_s'][$j];
            $id_produto_s = $_SESSION['id_s'][$j];

            $INSERT_ITENS_s = "INSERT INTO TROCAS_ITENS(ID_TROCA,ID_PRODUTO,QTD_ITENS,TIPO_MOVIMENTO,ID_USUARIO,DATA_CADASTRO) VALUES('{$ID['id_troca']}','$id_produto_s',' $quantidade_s','SAIU','$id_usuario',NOW())";

            $resultado = $resultado + mysqli_query($conexao, $INSERT_ITENS_s);
            $update_protudo_s = "update produto set quantidade=quantidade-'$quantidade_s' where id_produto=' $id_produto_s'";
            $resultado = $resultado + mysqli_query($conexao, $update_protudo_s);
        };
        if($resultado>=1){
            $_SESSION['sucesso_cadastro'] = "Troca Realizada Com Sucesso!";
            header("Location:/loja_virtual/Tela_troca_produt.php");
            mysqli_close($conexao);
         };
    }



    unset($_SESSION['quant_s']);
    unset($_SESSION['id_s']);

    unset($_SESSION['quant_e']);
    unset($_SESSION['id_e']);
}
