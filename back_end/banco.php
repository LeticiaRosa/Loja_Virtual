<?php


function inserirProduto($nome, $descricao, $id_categoria, $preco_venda, $preco_custo, $quantidade, $id_fornecedor, $observacao, $id_usuario){
    require_once ("conexao.php");
    
    $query = "select id_categoria from categoria where nome = '$id_categoria'";
    $query_1 = "select id_fornecedor from fornecedor where nome = '$id_fornecedor'";
    $categoria = mysqli_query($conexao, $query );
    $fornecedor = mysqli_query($conexao, $query_1 );
    $variavel = mysqli_fetch_assoc($categoria);
    $variavel_1 = mysqli_fetch_assoc($fornecedor);
    $query_2 = "insert into produto (nome, descricao, id_categoria,preco_venda, preco_custo,quantidade, id_fornecedor, observacao, id_usuario) values ('$nome', '$descricao', '{$variavel['id_categoria']}','$preco_venda','$preco_custo' ,'$quantidade', '{$variavel_1['id_fornecedor']}', '$observacao', '$id_usuario')";
    $produto= mysqli_query($conexao, $query_2);
    mysqli_close($conexao);
    ECHO  $query_2;
    return  true;
}


?>