<!DOCTYPE html>

    <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">      
    <link rel="stylesheet" type="text/css" href="css/css_cadastro_categoria.css">
    <title>Cadastro</title>
    </head>
    <body>

<?php 

   include_once("menu.php");
?>

<section class="cover-form">
		  			<div class="form-container">
		  			  	<h1>Cadastro de Categorias</h1>
		  			  	<form  method="POST"  name="form" action="back_end/categorias.php" >
		  			  		<div class="form-wraper">

                    <div class="col">
                      <p>Nome Categoria*</p>
                      <input  type="text" name="nome" id="nome" required placeholder= "Nome" autocomplete="off" >
                    </div> 
                    <div class="col">
		  			  			  <p>Descrição</p>
                      <input type="text" name="descricao" id="descricao" placeholder="Descrição" autocomplete="off" >
                    </div>  
                    </div>
                  


                    <div class="form-wraper">
                    <div class="col">
                      <p>Observação:</p>
                      <input type="text" name="observacao" id="observacao" placeholder="Observação" autocomplete="off" >
                    </div>

                    </div>

                    <div class="enviar">
                    <input type="submit" name="acao"  id="clicar" value="Cadastrar" />
                 
                    </div>

                </form>

		  		</div><!--container bg-->
    </section><!--cover-form-->

 

    </body>
    </html>