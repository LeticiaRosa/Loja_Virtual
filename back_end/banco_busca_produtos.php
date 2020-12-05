<?php 
   require_once("conexao.php");
   if(isset($_POST['acao'])){
    $query = "select nome, descricao, id_categoria,preco_venda, preco_custo,quantidade, id_fornecedor, marca, unidade_medida, valor_medida, observacao,id_usuario ,data_cadastro from produto";
    $produto = mysqli_query($conexao, $query );
   
    while ($row = mysqli_fetch_object ($query)) { 
    echo "<table>";
     echo $row->nome;
     echo $row->descricao; 
     echo "</table>";
     } 
    } 
?>