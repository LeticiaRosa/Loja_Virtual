<?php
session_start();
require_once ("conexao.php");
if(isset($_POST['acao'])){
$nome = $_POST['nome'];
$descricao= $_POST['descricao'];
$id_categoria=$_POST['id_categoria'];  
$id_sub_categoria=$_POST['id_sub_categoria'];  
$preco_venda=$_POST['preco_venda']; 
$preco_custo=$_POST['preco_custo'];
$quantidade=$_POST['quantidade'];
$id_fornecedor=$_POST['id_fornecedor'];
$marca=$_POST['marca'];
$barra=$_POST['barras'];
$unidade_medida=$_POST['unidade_medida'];
$valor_medida = $_POST['valor_medida'];
$observacao=$_POST['observacao'];
$id_usuario=$_SESSION['usuarioId'];
$cod_barras = null;
ECHO $cod_barras ;
    $query = "select id_categoria from categoria where nome = '$id_categoria'";
    $query_1 = "select id_fornecedor from fornecedor where nome = '$id_fornecedor'";
    $query_3 = "select id_sub_categoria from sub_categoria where nome = '$id_sub_categoria'";
    $categoria = mysqli_query($conexao, $query );
    $fornecedor = mysqli_query($conexao, $query_1 );
    $sub_categoria = mysqli_query($conexao, $query_3 );
    $variavel = mysqli_fetch_assoc($categoria);
    $variavel_1 = mysqli_fetch_assoc($fornecedor);
    $variavel_2 = mysqli_fetch_assoc($sub_categoria);

    if ( empty($variavel_2) ) {
        $variavel_sub = null ;
    } else {
        $variavel_sub = "'{$variavel_2['id_sub_categoria']}'";
    }

    $query_2 = "insert into produto (nome, descricao, id_categoria,id_sub_categoria, preco_venda, preco_custo,quantidade, id_fornecedor, marca, unidade_medida, valor_medida, observacao,id_usuario ,data_cadastro) values ('$nome', '$descricao', '{$variavel['id_categoria']}', $variavel_sub ,'$preco_venda','$preco_custo' ,'$quantidade', '{$variavel_1['id_fornecedor']}', '$marca', '$unidade_medida', '$valor_medida' ,'$observacao','$id_usuario', now())";
   
    $produto= mysqli_query($conexao, $query_2);
    
    //ECHO  $produto;
        if($produto==1){
            $_SESSION['sucesso_cadastro'] = "Produto inserido com sucesso";
           
            
                $sql = "select max(id_produto) as id  from produto";
                $id=mysqli_query($conexao, $sql );
                $id2=mysqli_fetch_assoc($id);
                ECHO $barra;
                if($barra=='S'){
                    $cod_barras=$id2['id'];
                }elseif( $barra =='N'){
                    ECHO $cod_barras ;
                    $cod_barras = $_POST['gerar_codigo'];
                }
               // ECHO $cod_barras;
               ECHO $cod_barras ;
                $insert = "insert into CODIGO_BARRAS (ID_PRODUTO, id_usuario, CODIGO_BARRAS ,data_cadastro) values ('{$id2['id']}','$id_usuario','$cod_barras',  now())";
              //  ECHO $insert;
                mysqli_query($conexao, $insert);
              //header("Location:/loja_virtual/Tela_cadastro_produto_1.php");
            
        }else {
            $_SESSION['erro_cadastro'] = "Produto Não cadastrado";
           //header("Location:/loja_virtual/Tela_cadastro_produto_1.php");
        }
   

}else {

   //header("Location:/loja_virtual/Tela_cadastro_produto_1.php");
}


mysqli_close($conexao);


?>