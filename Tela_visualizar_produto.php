<!DOCTYPE html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/editar_produto.css">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
</head>
<html>
<body>
 
<?php 
   include_once("menu.php"); 
   require_once("back_end/conexao.php"); 
?>

<section class="cover-form">
<div class="form-container">
		<h1> Produtos</h1>
        <div class="container">
        <div class="row" id="visualizarDados" >
        <table class= "table" id= "table" >
            <thead>
            <tr>
                <th > Nome <br/> </th>
                <th > Descricao</th>
                <th > Categoria</th>
                <th > Sub Categoria</th>
                <th > Preço de Venda </th>
                <th > Preço de Custo </th>
                <th > Quantidade </th>
                <th class = "sumir-1"> Fornecedor </th>
                <th class = "sumir-1"> Marca</th>
                <th class = "sumir-1"> Unidade de Medida</th>
                <th class = "sumir-1"> Valor Medida </th>
                <th class = "sumir"> Observação </th>
                <th class = "sumir"> Usuário </th> 
                <th class = "sumir"> Data do Cadastro </th>
            </tr>
            </thead>
            <tbody>    
            <?php
            
             $sql = "select p.id_produto, p.nome, p.descricao, C.NOME AS NOME_CATEGORIA, CASE WHEN SB.NOME IS NULL THEN 'NAO POSSUI' ELSE SB.NOME END AS NOME_SUB_CATEGORIA ,p.preco_venda, p.preco_custo,p.quantidade, F.NOME AS FORNECEDOR, p.marca, p.unidade_medida, p.valor_medida, p.observacao,U.Nome_usuario AS USUARIO, DATE_format(p.data_cadastro, '%d-%m-%Y') as data_cadastro,B.codigo_barras from produto p left outer join fornecedor F ON P.ID_FORNECEDOR=F.ID_FORNECEDOR LEFT OUTER JOIN categoria C ON C.ID_CATEGORIA=P.ID_CATEGORIA LEFT OUTER JOIN usuario U ON U.ID_USUARIO=P.ID_USUARIO  LEFT OUTER JOIN SUB_CATEGORIA SB ON SB.ID_SUB_CATEGORIA=P.ID_SUB_CATEGORIA LEFT OUTER JOIN CODIGO_BARRAS B ON B.ID_produto=P.ID_produto;";
             $query= mysqli_query($conexao, $sql );
             echo $conexao->error;
            while ($row = mysqli_fetch_object ($query)) { 
                echo '<tr> ';
                echo '<td class = "sumir-sempre" >' . $row->id_produto . '</td>';
                echo '<td>' . $row->nome . '</td>';
                echo '<td>' . $row->descricao . '  </td>';
                echo '<td>' . $row->NOME_CATEGORIA . '</td>';
                echo '<td>' . $row->NOME_SUB_CATEGORIA . '</td>';
                echo '<td>' . $row->preco_venda . '</td>';
                echo '<td>' . $row->preco_custo . '</td>';
                echo '<td>' . $row->quantidade . '</td>';
                echo '<td class = "sumir-1" >' . $row->FORNECEDOR . '</td>';
                echo '<td class = "sumir-1">' . $row->marca . '</td>';
                echo '<td class = "sumir-1">' . $row->unidade_medida . '</td>'; 
                echo '<td class = "sumir-1">' . $row->valor_medida . '</td>';
                echo '<td class = "sumir">' . $row->observacao . '</td>';
                echo '<td class = "sumir">' . $row->USUARIO . '</td>';
                echo '<td class = "sumir-3" >' . $row->data_cadastro . '</td>';
                echo '<td class = "sumir-sempre">' . $row->codigo_barras . '</td>';
                echo ' </tr> ';
            }
            mysqli_free_result($query);  
            ?>
           
            </tbody>
            
        </table>
        <!-- /.row --> 
        </div>
        </div>
   
    <!-- /.container -->                        
</div><!--container bg-->
</section><!--cover-form-->

<div id="openModal" class="modalDialog">
    <div><a href="#close" title="Close" class="close">X</a>    
    <?php  include_once("Tela_alterar_produto.php");  ?>
    </div>
</div>




<script type="text/javascript" src="js/seleciona_linha.js"></script>

</body>
</html> 