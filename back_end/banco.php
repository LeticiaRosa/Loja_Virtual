<?php

 

function teste($nome){
    return "NOME: $nome ";
}

function inserirProduto($nome, $descricao, $id_categoria, $quantidade, $observacao, $id_usuario){
    $query = "insert into produtos (nome, descricao, id_categoria, quantidade, observacao, id_usuario) values ($nome, $descricao, $id_categoria, $quantidade, $observacao, $id_usuario)";
    return true;
}


?>