<?php
session_start();
require_once("conexao.php");

if (isset($_POST['trasferir'])) {
    $nome = $_POST['nome'];
    $id_produto = $_POST['id_produto'];
    $produto = $_POST['produto2'];
    $Quantidade = $_POST['Quantidade'];
    $Qtd_tras = $_POST['Qtd_tras'];
    $empresa = $_POST['empresa3'];
    $id_usuario = $_SESSION['usuarioId'];
    $query = "select id_empresa from empresa where nome = '$nome'";
    $query_1 = "select id_empresa from empresa where nome = '$empresa'";
    $empresa_1 = mysqli_query($conexao, $query);
    $empresa_tras = mysqli_query($conexao, $query_1);
    $variavel = mysqli_fetch_assoc($empresa_1);
    $variavel_1 = mysqli_fetch_assoc($empresa_tras);
    $query_2 = "insert into trasferencia (id_empresa,id_empresa_tras,id_produto,id_usuario,qtd_trasfere,mensagem,status,data_cadastro)values('{$variavel['id_empresa']}','{$variavel_1['id_empresa']}','$id_produto','$id_usuario','$Qtd_tras','Existe uma transferência pendente de aprovação','N',now())";
    //echo  $query_2;
    $produto = mysqli_query($conexao, $query_2);
    if ($produto == 1) {
        $_SESSION['sucesso_cadastro'] = "Transferência criada!";
        header("Location:/loja_virtual/Tela_listar_trafere.php");
    }  else {
        $_SESSION['erro_cadastro'] = "Erro ao criar transferência!";
        header("Location:/loja_virtual/Tela_listar_trafere.php");
    }
   
} elseif (isset($_POST['Confirmar'])) {
    $resultado = "";
    $id_tras = $_POST['id_tras'];
    $nome = $_POST['nome']; //empresa origem
    $empresa = $_POST['empresa4']; //empressa destino
    $Qtd_tras = $_POST['Qtd_tras'];
    $produto = $_POST['produto4'];
    $id_produto = $_POST['id_produto'];
    $cod_referencia = $_POST['cod_referencia'];
    $id_usuario = $_SESSION['usuarioId'];
    $query = "select id_empresa from empresa where nome = '$nome'"; //busca id empresa origem
    $query_1 = "select id_empresa from empresa where nome = '$empresa'"; //busca id empresa destino
    $empresa_1 = mysqli_query($conexao, $query);
    $empresa_tras = mysqli_query($conexao, $query_1);
    $variavel = mysqli_fetch_assoc($empresa_1);
    $variavel_1 = mysqli_fetch_assoc($empresa_tras);
    
    $query_3 = "select count(1) as valor from produto where CODIGO_REFERENCIA='$cod_referencia' AND ID_EMPRESA='{$variavel_1['id_empresa']}'";
    $resul = mysqli_query($conexao, $query_3);
    $Produto =mysqli_fetch_assoc($resul);
   if ($Produto['valor']==0){
        $update = "update produto set quantidade=quantidade-'$Qtd_tras' where id_produto='$id_produto' and id_empresa='{$variavel['id_empresa']}'";
       // echo $update;
        $resultado = mysqli_query($conexao, $update);
        // fazer insert do mesmo produto na empresa nova com  a quantidade nova 
        $insert = "insert into produto (nome,descricao,preco_venda,preco_custo,quantidade,unidade_medida,valor_medida,marca,data_cadastro,observacao,id_fornecedor,id_usuario,id_categoria,id_sub_categoria,id_empresa,codigo_referencia)
        select nome,descricao,preco_venda,preco_custo,'$Qtd_tras',unidade_medida,valor_medida,marca,now(),observacao,id_fornecedor,id_usuario,id_categoria,id_sub_categoria,'{$variavel_1['id_empresa']}',codigo_referencia
        from produto where id_produto='$id_produto' and id_empresa='{$variavel['id_empresa']}'";
        $resultado = $resultado + mysqli_query($conexao, $insert);
        //echo $insert;
        /// buscar id do novo produto inserido//
        $query_4 = "select max(id_produto) as id from produto where CODIGO_REFERENCIA='$cod_referencia' AND ID_EMPRESA='{$variavel_1['id_empresa']}'";
        //echo $query_4;
        $id = mysqli_query($conexao, $query_4);
        $result =mysqli_fetch_assoc($id);
       // echo $result['id'];
        // inserir codigo de barras para o produto transferido
        $insert_cod="insert into codigo_barras(id_produto,id_usuario,codigo_barras,data_cadastro,codigo_referencia) select '{$result['id']}' as id_produto,id_usuario,codigo_barras,now() as data_cadastro ,codigo_referencia  from codigo_barras where id_produto='$id_produto'";
     //   echo $insert_cod;
        mysqli_query($conexao, $insert_cod);
        
    
        //update na confirmando a trasferencia
        $update2 = "update trasferencia set status='S', MENSAGEM='Transferência confirmada' where id_trasferencia='$id_tras'";
        $resultado = $resultado + mysqli_query($conexao, $update2);
        //echo $resultado;
        if ($resultado == 3) {
            $_SESSION['sucesso_cadastro'] = "Confirmação realizada com sucesso!";
         header("Location:/loja_virtual/tela_vizualizar_trasferencia.php");
        } else {
            $_SESSION['erro_cadastro'] = "Erro ao confirmar transferência!";
          header("Location:/loja_virtual/tela_vizualizar_trasferencia.php");
        }
        
    }elseif($Produto['valor']>0){
        $update = "update produto set quantidade=quantidade+'$Qtd_tras' where CODIGO_REFERENCIA='$cod_referencia' AND ID_EMPRESA='{$variavel_1['id_empresa']}'";
        $resultado = mysqli_query($conexao, $update);
        $update_1 = "update produto set quantidade=quantidade-'$Qtd_tras' where id_produto='$id_produto' and id_empresa='{$variavel['id_empresa']}'";
        $resultado = $resultado + mysqli_query($conexao,  $update_1);
        $update_2 = "update trasferencia set status='S', MENSAGEM='Transferência confirmada' where id_trasferencia='$id_tras'";
        $resultado = $resultado + mysqli_query($conexao, $update_2);
        //echo $resultado;
        
        if ($resultado == 3) {
            $_SESSION['sucesso_cadastro'] = "Confirmação realizada com sucesso!";
            header("Location:/loja_virtual/tela_vizualizar_trasferencia.php");
        } else {
            $_SESSION['erro_cadastro'] = "Erro ao confirmar transferência!";
            header("Location:/loja_virtual/tela_vizualizar_trasferencia.php");
        }
    }
    
    mysqli_close($conexao);
  
}elseif (isset($_POST['Excluir'])) {
    $id_tras = $_POST['id_tras'];
    $resultado = "";
    $update2 = "update trasferencia set status='C', MENSAGEM='Transferência cancelada' where id_trasferencia='$id_tras'";
  //  echo $update2;
    $resultado = mysqli_query($conexao, $update2);
   
    if ($resultado == 1) {
            $_SESSION['sucesso_cadastro'] = "Transferência cancelada com sucesso!";
            header("Location:/loja_virtual/tela_vizualizar_trasferencia.php");
        } else {
            $_SESSION['erro_cadastro'] = "Erro ao cancelar transferência!";
            header("Location:/loja_virtual/tela_vizualizar_trasferencia.php");
        }
    
    mysqli_close($conexao);

}

