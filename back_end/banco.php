<?php

function teste($nome){
    return "NOME: $nome ";
}

function inserirProduto($nome, $descricao, $id_categoria, $quantidade, $observacao, $id_usuario){
    require_once ("conexao.php");
    $query = "insert into produto (nome, descricao, id_categoria, quantidade, observacao, id_usuario) values ('$nome', '$descricao', '$id_categoria', '$quantidade', '$observacao', '$id_usuario')";
    echo $query ;
    $teste = mysqli_query($conexao, $query );
    mysqli_close($conexao);
    return  $query ;
}


?>