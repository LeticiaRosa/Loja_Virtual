<!DOCTYPE html>
<head>
<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>

    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="css/css_editar_categoria.css">
    
</head>
<html>
<body>
        
<title>Editar Categoria</title>
    </head>
    <body>

<?php 
   include_once("menu.php");
?>          
       
        <div class="form-wraper" id="visualizarDados">
            
        <table id ="products-table">
        <thead>
            <tr>
                <th>Nome</th>
                <th >Descricao</th>
                <th >Status</th>
                <th class="sumir">Observação</th>
                <th class="sumir"> Usuario</th>
                <th class="sumir">Data Cadastro</th>
                
            </tr>
        </thead>
<tbody>


</tbody>
</table>
</div>

      
<div id="openModal" class="modalDialog">
    <div><a href="#close" title="Close" class="close">X</a>    
    <?php  include_once("Tela_alterar_produto.php");  ?>
    </div>
</div>
    
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>


<script type="text/javascript" src="js/lista_categorias.js"></script> 
<script type="text/javascript" src="js/filtar_tabela.js"></script>
    

<script type="text/javascript" charset="utf-8">
   

</script> 
   

    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
 
</body>
</html> 