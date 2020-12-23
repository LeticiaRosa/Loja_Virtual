<?php
session_start();
require_once("conexao.php");

if (isset($_POST['trasferir'])) {
    $nome = $_POST['nome'];
    $id_produto = $_POST['id_produto'];
    $produto = $_POST['produto'];
    $Quantidade = $_POST['Quantidade'];
    $Qtd_tras = $_POST['Qtd_tras'];
    $empresa = $_POST['empresa'];
    $id_usuario = $_SESSION['usuarioId'];
    $query = "select id_empresa from empresa where nome = '$nome'";
    $query_1 = "select id_empresa from empresa where nome = '$empresa'";
    $empresa_1 = mysqli_query($conexao, $query);
    $empresa_tras = mysqli_query($conexao, $query_1);
    $variavel = mysqli_fetch_assoc($empresa_1);
    $variavel_1 = mysqli_fetch_assoc($empresa_tras);
    $query_2 = "insert into trasferencia (id_empresa,id_empresa_tras,id_produto,id_usuario,qtd_trasfere,mensagem,status,data_cadastro)values('{$variavel['id_empresa']}','{$variavel_1['id_empresa']}','$id_produto','$id_usuario','$Qtd_tras','Existe uma trasferencia pendete de aprovação','N',now())";
    echo  $query_2;
    $produto = mysqli_query($conexao, $query_2);
    if ($produto == 1) {
        $_SESSION['sucesso_cadastro'] = "Trasferencia Criada";
        header("Location:/loja_virtual/Tela_listar_trafere.php");
    } else {
        $_SESSION['erro_cadastro'] = "Trasferencia Não Criada";
    }
    header("Location:/loja_virtual/Tela_listar_trafere.php");
} elseif (isset($_POST['Confirmar'])) {
    $resultado = "";
    $id_tras = $_POST['id_tras'];
    $nome = $_POST['nome']; //empresa origem
    $empresa = $_POST['empresa']; //empressa destino
    $Qtd_tras = $_POST['Qtd_tras'];
    $produto = $_POST['produto'];
    $id_usuario = $_SESSION['usuarioId'];
    $query = "select id_empresa from empresa where nome = '$nome'"; //busca id empresa origem
    $query_1 = "select id_empresa from empresa where nome = '$empresa'"; //busca id empresa destino
    $empresa_1 = mysqli_query($conexao, $query);
    $empresa_tras = mysqli_query($conexao, $query_1);
    $variavel = mysqli_fetch_assoc($empresa_1);
    $variavel_1 = mysqli_fetch_assoc($empresa_tras);
    $query_3 = "select id_produto from produto where nome='$produto'";
    $produto = mysqli_query($conexao, $query_3);
    $variavel_3 = mysqli_fetch_assoc($produto);

    // fazer update no produto diminuindo a quantidade da trasferencia
    $update = "update produto set quantidade=quantidade-'$Qtd_tras' where id_produto='{$variavel_3['id_produto']}' and id_empresa='{$variavel['id_empresa']}'";

    $resultado = mysqli_query($conexao, $update);
    // fazer insert do mesmo produto na empresa nova com  a quantidade nova 
    $insert = "insert into produto (nome,descricao,preco_venda,preco_custo,quantidade,unidade_medida,valor_medida,marca,data_cadastro,observacao,id_fornecedor,id_usuario,id_categoria,id_sub_categoria,id_empresa)
select nome,descricao,preco_venda,preco_custo,'$Qtd_tras',unidade_medida,valor_medida,marca,now(),observacao,id_fornecedor,id_usuario,id_categoria,id_sub_categoria,'{$variavel_1['id_empresa']}'
from produto where id_produto='{$variavel_3['id_produto']}' and id_empresa='{$variavel['id_empresa']}'";
    $resultado = $resultado + mysqli_query($conexao, $insert);

    //update na confirmando a trasferencia
    $update2 = "update trasferencia set status='S', MENSAGEM='Trasferencia Confirmada' where id_trasferencia='$id_tras'";
    $resultado = $resultado + mysqli_query($conexao, $update2);
    echo $resultado;
    if ($resultado == 3) {

        $_SESSION['sucesso_cadastro'] = "Confirmação realizada Com Sucesso";


        header("Location:/loja_virtual/tela_vizualizar_trasferencia.php");

        
    }
    mysqli_close($conexao);
}
