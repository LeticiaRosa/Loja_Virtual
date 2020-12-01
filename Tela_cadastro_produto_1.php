<?php
	//Inicializado primeira a sessão para posteriormente recuperar valores das variáveis globais. 
    session_start();
    header("Pragma: no-cache");
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/cadastro.css">

    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
    <script type="text/javascript" src="js/auto_complete.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  

</head>
<html>
<body>
 
<?php 
   include_once("menu.php"); 
   include_once("back_end/banco.php");
?>
    <section class="cover-form">
		  			<div class="form-container">
		  			  	<h1>Cadastro de Produtos</h1>
		  			  	<form  method="POST" >
		  			  		<div class="form-wraper">

                    <div class="col">
                      <p>Nome do Produto*</p>
                      <input  type="text" name="nome" id="nome" required placeholder= "Nome" autocomplete="off" >
                    </div> 

                    <div class="col">
		  			  			  <p>Descrição</p>
                      <input type="text" name="descricao" id="descricao" required placeholder="Descrição" autocomplete="off" >
                    </div>  

                    <div class="col">
                      <p>Categoria:*</p>
                      <input type="text" name="id_categoria" id="id_categoria" required placeholder="Categoria" autocomplete="off" >
                    </div>
                    </div>

                  <div class="form-wraper">
                    <div class="col">
                      <p>SubCategoria:*</p>
                      <input type="text" name="quantidade" id="quantidade"  required placeholder="Quantidade" autocomplete="off" > 
                    </div>
                      
                    <div class="col">
                      <p>Observação:*</p>
                      <input type="text" name= "observacao" id="observacao"  placeholder="Observação" autocomplete="off" >
                    </div>

                    <div class="col">
                      <p>Observação:*</p>
                      <input type="text" name=""  placeholder="Observação" autocomplete="off" >
                    </div>
                    </div>
                    <div class="form-wraper">
                    <div class="col">
                      <p>Observação:*</p>
                      <input type="text" name=""  placeholder="Observação" autocomplete="off" >
                      <input type="reset" value="Limpar">
                    </div>
                    </div>
                    <div class="enviar">
                    <input type="submit" name="acao" value="Cadastrar"/>
                    <?php 
                    if ( (isset($_POST['nome'])) && (isset($_POST['descricao']))  && (isset($_POST['id_categoria']))  && (isset($_POST['quantidade'])) ){
                        inserirProduto( $_POST['nome'] , $_POST['descricao'] , $_POST['id_categoria'] , $_POST['quantidade'] , $_POST['observacao'] , $_SESSION['usuarioId']);
                    }
                    ?>
		  			  		  <p>*campos obrigatorios</p>
                    </div>
		  			  	</form>
		  		</div><!--container bg-->
    </section><!--cover-form-->

</body>
