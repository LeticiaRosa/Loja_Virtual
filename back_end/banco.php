<?php

session_start();


require_once ("conexao.php");
if(isset($_POST['acao'])){
$nome = $_POST['nome'];
$descricao= $_POST['descricao'];
$id_categoria=$_POST['id_categoria'];  
$preco_venda=$_POST['preco_venda']; 
$preco_custo=$_POST['preco_custo'];
$quantidade=$_POST['quantidade'];
$id_fornecedor=$_POST['id_fornecedor'];
$observacao=$_POST['observacao'];
$id_usuario=$_SESSION['usuarioId'];
$query = "select id_categoria from categoria where nome = '$id_categoria'";
    $query_1 = "select id_fornecedor from fornecedor where nome = '$id_fornecedor'";
    $categoria = mysqli_query($conexao, $query );
    $fornecedor = mysqli_query($conexao, $query_1 );
    $variavel = mysqli_fetch_assoc($categoria);
    $variavel_1 = mysqli_fetch_assoc($fornecedor);
    $query_2 = "insert into produto (nome, descricao, id_categoria,preco_venda, preco_custo,quantidade, id_fornecedor, observacao,id_usuario) values ('$nome', '$descricao', '{$variavel['id_categoria']}','$preco_venda','$preco_custo' ,'$quantidade', '{$variavel_1['id_fornecedor']}', '$observacao','$id_usuario')";
    /*ECHO $query_2;*/
    $produto= mysqli_query($conexao, $query_2);
    ECHO  $produto;
        if($produto==1){
            header("Location:/Loja_Virtual/Tela_cadastro_produto_1.php");
        }
   

}

?>