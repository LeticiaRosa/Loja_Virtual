<!DOCTYPE html>

    <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">      
    <link rel="stylesheet" type="text/css" href="css/css_editar_categoria.css">
   
 

    <title>Editar Categoria</title>
    </head>
    <body>

<?php 
   include_once("menu.php");
?>          
        <section class="cover-form">
        <div class="form-container">
        <h1>Categorias</h1>
       
        <div class="col">
        <p>Pesquisar Produto</p>
<input type="text" name="pesquisa" id="pesq" onkeyup='searchTable()'/>
        
</div>
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
        
        
        </div><!--container bg-->
    </section><!--cover-form-->

 <div id="openModal" class="modalDialog">
    <div><a href="#close" title="Close" class="close">X</a>    
    <?php  include_once("Tela_altera_categoria.php");  ?>
    </div>
</div>


<script type="text/javascript" src="js/filtar_tabela.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
     <script type="text/javascript" src="js/lista_categorias.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>    
    

</body>
    </html>
