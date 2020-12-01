<?php
<<<<<<< HEAD

 

function teste($nome){
    return "NOME: $nome ";
}
=======
>>>>>>> bab6da635a799d30be9f95bc4095a7b53d699769

function inserirProduto($nome, $descricao, $id_categoria, $quantidade, $observacao, $id_usuario){
    require_once ("conexao.php");
    $query = "insert into produto (nome, descricao, id_categoria, quantidade, observacao, id_usuario) values ('$nome', '$descricao', '$id_categoria', '$quantidade', '$observacao', '$id_usuario')";
    echo $query ;
    $teste = mysqli_query($conexao, $query );
    mysqli_close($conexao);
    return  $query ;
}


?>