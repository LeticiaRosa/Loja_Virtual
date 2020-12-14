<?php 
   require_once("conexao.php");
   if(isset($_POST['acao'])){
    $query = "select p.nome, p.descricao, C.NOME AS NOME_CATEGORIA, C.NOME_SUB_CATEGORIA AS NOME_SUB_CATEGORIA ,
    p.preco_venda, p.preco_custo,p.quantidade, F.NOME AS FORNECEDOR, p.marca, p.unidade_medida, p.valor_medida, p.observacao,U.Nome_usuario AS USUARIO ,p.data_cadastro 
    from produto p 
    left outer join fornecedor F
    ON P.ID_FORNECEDOR=F.ID_FORNECEDOR
    LEFT OUTER JOIN categoria C
    ON C.ID_CATEGORIA=P.ID_CATEGORIA
    LEFT OUTER JOIN usuario U
    ON U.ID_USUARIO=P.ID_USUARIO";

    $produto = mysqli_query($conexao, $query );
   
    while ($row = mysqli_fetch_object ($query)) { 
    echo "<table>";
     echo $row->nome;
     echo $row->descricao; 
     echo "</table>";
     } 
    } 
?>