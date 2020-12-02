<?php
	//Inicializado primeira a sessão para posteriormente recuperar valores das variáveis globais. 
    session_start();
    header("Pragma: no-cache");
    
?>
<script type="text/javascript" language="javascript"> 
function ClearForm(){
       document.Form_login.reset(); 
  }
</script>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/cadastro.css">

    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    
    

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
                      <input type="text" name="descricao" id="descricao" placeholder="Descrição" autocomplete="off" >
                    </div>  
                    </div>

                  <div class="form-wraper">

                    
                  <div class="col">
                      <p>Categoria:*</p>
                      <input type="text" name="id_categoria" id="id_categoria" required placeholder="Categoria" autocomplete="off" >
                    </div>
                      
                    <div class="col">
                      <p>Preço de Venda:*</p>
                      <input type="text" name= "preco_venda" id="preco_venda" required placeholder="Preço de Venda" autocomplete="off" >
                    </div>

                    <div class="col">
                      <p>Preço de Custo:*</p>
                      <input type="text" name="preco_custo"  id="preco_custo" required placeholder="Preço de Custo" autocomplete="off" >
                    </div>
                    
                    <div class="col">
                      <p>Quantidade:*</p>
                      <input type="text" name="quantidade" id="quantidade"  required placeholder="Quantidade" autocomplete="off" > 
                    </div>

                    </div>
                    <div class="form-wraper">
                    <div class="col-1">
                      <p>Fornecedor:*</p>
                      <input type="text" name="id_fornecedor" id="id_fornecedor" required placeholder="Fornecedor" autocomplete="off" >
                    </div>
                    </div>

                    <div class="form-wraper">
                    <div class="col">
                      <p>Observação:*</p>
                      <input type="text" name="observacao" id="observacao" placeholder="Observação" autocomplete="off" >
                    </div>
                    </div>

                    <div class="enviar">
                    <input type="submit" name="acao" onclick="limpaCampos()" id="clicar" value="Cadastrar"/>
                    <?php 
                    
                    if ( (isset($_POST['nome'])) && (isset($_POST['descricao']))  && (isset($_POST['id_categoria']))  && (isset($_POST['preco_venda'])) && (isset($_POST['preco_custo']))&& (isset($_POST['quantidade'])) && (isset($_POST['id_fornecedor'])) && (isset($_POST['observacao']))  ){
                         inserirProduto( $_POST['nome'] , $_POST['descricao'] , $_POST['id_categoria'] , $_POST['preco_venda'], $_POST['preco_custo'], $_POST['quantidade'], $_POST['id_fornecedor'] , $_POST['observacao'] , $_SESSION['usuarioId']);                          
                      }
                     
                    ?>
		  			  		  <p>*campos obrigatorios</p>
                    </div>
		  			  	</form>
		  		</div><!--container bg-->
    </section><!--cover-form-->

    <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/auto_complete.js"></script>
</body>
</html>