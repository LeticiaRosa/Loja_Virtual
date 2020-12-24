<?php
session_start();
require_once ("conexao.php");

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
$empresa = $_POST['empresa'];
$cod_referencia = $_POST['cod_referencia'];


    $query = "select id_categoria from categoria where nome = '$id_categoria'";
    $query_1 = "select id_fornecedor from fornecedor where nome = '$id_fornecedor'";
    $query_3 = "select id_sub_categoria from sub_categoria where nome = '$id_sub_categoria'";
    $query_4 = "select id_empresa from empresa where nome = '$empresa'";
    $categoria = mysqli_query($conexao, $query );
    $fornecedor = mysqli_query($conexao, $query_1 );
    $sub_categoria = mysqli_query($conexao, $query_3 );
    $id_empresa = mysqli_query($conexao, $query_4 );
    $variavel = mysqli_fetch_assoc($categoria);
    $variavel_1 = mysqli_fetch_assoc($fornecedor);
    $variavel_2 = mysqli_fetch_assoc($sub_categoria);
    $variavel_3 = mysqli_fetch_assoc($id_empresa);
   
    if ( empty($variavel_2) && empty($id_sub_categoria)) {
        $variavel_sub = "null" ;
    } else {
        $variavel_sub = "'{$variavel_2['id_sub_categoria']}'";
    }



if(isset($_POST['acao'])){
    $query_2 = "insert into produto (nome, descricao, id_categoria,id_sub_categoria, preco_venda, preco_custo,quantidade, id_fornecedor, marca, unidade_medida, valor_medida, observacao,id_usuario ,data_cadastro, id_empresa,CODIGO_REFERENCIA) values ('$nome', '$descricao', '{$variavel['id_categoria']}', $variavel_sub ,'$preco_venda','$preco_custo' ,'$quantidade', '{$variavel_1['id_fornecedor']}', '$marca', '$unidade_medida', '$valor_medida' ,'$observacao','$id_usuario', now(), '{$variavel_3['id_empresa']}','$cod_referencia')";
    ECHO  $query_2 ;
    $produto= mysqli_query($conexao, $query_2);
    
    //ECHO  $produto;
        if($produto==1){
            $_SESSION['sucesso_cadastro'] = "Produto inserido com sucesso";
           
            
                $sql = "select max(id_produto) as id  from produto";
                $id=mysqli_query($conexao, $sql );
                $id2=mysqli_fetch_assoc($id);
            
                if($barra=='S'){
                    $cod_barras=$id2['id'];
                }elseif( $barra =='N'){
                  
                    $cod_barras = $_POST['gerar_codigo'];
                }
               // ECHO $cod_barras;
               
                $insert = "insert into CODIGO_BARRAS (ID_PRODUTO, id_usuario, CODIGO_BARRAS ,data_cadastro,codigo_referencia) values ('{$id2['id']}','$id_usuario','$cod_barras',  now(),'$cod_referencia')";
              ECHO $insert;
                mysqli_query($conexao, $insert);
             header("Location:/loja_virtual/Tela_cadastro_produto_1.php");
            
        }else {
        $_SESSION['erro_cadastro'] = "Produto Não cadastrado";
        header("Location:/loja_virtual/Tela_cadastro_produto_1.php");
        }
   

} elseif (isset($_POST['Salvar'])) {
    $id = $_POST['id'];
    mysqli_report(MYSQLI_REPORT_STRICT|MYSQLI_REPORT_ERROR);

    try {
    $query_2 = "UPDATE PRODUTO SET NOME='$nome', DESCRICAO='$descricao',ID_CATEGORIA='{$variavel['id_categoria']}',id_sub_categoria =  $variavel_sub ,PRECO_VENDA='$preco_venda',QUANTIDADE='$quantidade',ID_FORNECEDOR='{$variavel_1['id_fornecedor']}', MARCA='$marca',UNIDADE_MEDIDA='$unidade_medida',VALOR_MEDIDA='$valor_medida',OBSERVACAO='$observacao',ID_USUARIO_ALT='$id_usuario', DATA_ALTEROU=now(), id_empresa= '{$variavel_3['id_empresa']}' WHERE ID_PRODUTO='$id'";
    $produto = mysqli_query($conexao, $query_2);
    echo $produto;
    if ($produto == 1) {
      $_SESSION['sucesso_cadastro'] = "Atualizado Com Sucesso";
      header("Location:/loja_virtual/Tela_visualizar_produto.php");
    }
    mysqli_close($conexao);
    }catch(mysqli_sql_exception $e) {
      
        $_SESSION['erro_cadastro'] = "Produto Não Salvo";
        header("Location:/loja_virtual/Tela_visualizar_produto.php");
        exit;

    }

} elseif (isset($_POST['Excluir'])) {
    $id = $_POST['id'];
    $query_2 = "delete from PRODUTO where ID_PRODUTO='$id'";
    echo $query_2;
    $produto = mysqli_query($conexao, $query_2);
    
  
    if ($produto == 1) {
      $_SESSION['sucesso_cadastro'] = "Excluido Com Sucesso";
      header("Location:/loja_virtual/Tela_visualizar_produto.php");
    }
    mysqli_close($conexao);

}else {

header("Location:/loja_virtual/Tela_cadastro_produto_1.php");
}




?>