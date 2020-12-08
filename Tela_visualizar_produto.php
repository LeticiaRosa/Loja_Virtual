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
                <th > Preço de Venda </th>
                <th > Preço de Custo </th>
                <th > Quantidade </th>
                <th > Fornecedor </th>
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
             $sql = "select nome, descricao, id_categoria,preco_venda, preco_custo,quantidade, id_fornecedor, marca, unidade_medida, valor_medida, observacao,id_usuario , DATE_format(data_cadastro, '%d-%m-%Y') as data_cadastro from produto";
             $query= mysqli_query($conexao, $sql );
            while ($row = mysqli_fetch_object ($query)) { 
                echo '<tr> ';
                echo '<td>' . $row->nome . '</td>';
                echo '<td>' . $row->descricao . '  </td>';
                echo '<td>' . $row->id_categoria . '</td>';
                echo '<td>' . $row->preco_venda . '</td>';
                echo '<td>' . $row->preco_custo . '</td>';
                echo '<td>' . $row->quantidade . '</td>';
                echo '<td>' . $row->id_fornecedor . '</td>';
                echo '<td class = "sumir-1">' . $row->marca . '</td>';
                echo '<td class = "sumir-1">' . $row->unidade_medida . '</td>'; 
                echo '<td class = "sumir-1">' . $row->valor_medida . '</td>';
                echo '<td class = "sumir">' . $row->observacao . '</td>';
                echo '<td class = "sumir">' . $row->id_usuario . '</td>';
                echo '<td class = "sumir-3" >' . $row->data_cadastro . '</td>';
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