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
$marca=$_POST['marca'];
$unidade_medida=$_POST['unidade_medida'];
$valor_medida = $_POST['valor_medida'];
$observacao=$_POST['observacao'];
$id_usuario=$_SESSION['usuarioId'];

 $query = "select id_categoria from categoria where nome = '$id_categoria'";
    $query_1 = "select id_fornecedor from fornecedor where nome = '$id_fornecedor'";
    $categoria = mysqli_query($conexao, $query );
    $fornecedor = mysqli_query($conexao, $query_1 );
    $variavel = mysqli_fetch_assoc($categoria);
    $variavel_1 = mysqli_fetch_assoc($fornecedor);
    $query_2 = "insert into produto (nome, descricao, id_categoria,preco_venda, preco_custo,quantidade, id_fornecedor, marca, unidade_medida, valor_medida, observacao,id_usuario ,data_cadastro) values ('$nome', '$descricao', '{$variavel['id_categoria']}','$preco_venda','$preco_custo' ,'$quantidade', '{$variavel_1['id_fornecedor']}', '$marca', '$unidade_medida', '$valor_medida' ,'$observacao','$id_usuario', now())";
    /*ECHO $query_2;*/
    $produto= mysqli_query($conexao, $query_2);
    ECHO  $produto;
        if($produto==1){
            $_SESSION['sucesso_cadastro'] = "Produto inserido com sucesso";
            header("Location:/Tela_cadastro_produto_1.php");
           
            
        }else {
            $_SESSION['erro_cadastro'] = "Produto Não cadastrado";
            header("Location:/Tela_cadastro_produto_1.php");
        }
   

}else {

    header("Location:/Tela_cadastro_produto_1.php");
}

?>