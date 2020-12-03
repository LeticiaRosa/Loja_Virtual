
<!DOCTYPE html>
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


?>
    <section class="cover-form">
		  			<div class="form-container">
		  			  	<h1>Cadastro de Produtos</h1>
		  			  	<form  method="POST"  name="form" action="back_end/banco.php"  >
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
                    <div class="col">
                      <p>Fornecedor:*</p>
                      <input type="text" name="id_fornecedor" id="id_fornecedor" required placeholder="Fornecedor" autocomplete="off" >
                    </div>
                    <div class="col">
                      <p>Marca:</p>
                      <input type="text" name="marca" id="marca" placeholder="Marca" autocomplete="off" >
                    </div>
                    <div class="col-1" >
                      <p >Unidade de medida:</p>
                      <select name="unidade_medida" id="unidade_medida"  placeholder="Unidade de Medida">
                      <option selected disabled value="">Selecione</option> 
                         <option value="Tamanho" >Tamanho</option> 
                          <option value="Peso em KG" >Peso em KG</option>
                          <option value="Mililitros (ml)">Ml</option>
                          <option value="" >Nenhum</option> 
                      </select>
                    </div>

                    <div class="col-2" id="valor_medida">
                      <p>Valor Medida:</p>
                      <input type="text" name="valor_medida" id="valor_medida" placeholder="Valor Medida" autocomplete="off" >
                    </div>

                    </div>

                    <div class="form-wraper">
                    <div class="col">
                      <p>Observação:</p>
                      <input type="text" name="observacao" id="observacao" placeholder="Observação" autocomplete="off" >
                    </div>

                    </div>

                    <div class="enviar">
                    <input type="submit" name="acao"  id="clicar" value="Cadastrar" onclick=""/>
                 
		  			  		  <p>*campos obrigatorios</p>
                    </div>

                </form>

		  		</div><!--container bg-->
    </section><!--cover-form-->
    <p>
            <?php 
			//Recuperando o valor da variável global, os erro de login.
			if(isset($_SESSION['sucesso_cadastro'])){
                echo $_SESSION['sucesso_cadastro'];
                unset($_SESSION['sucesso_cadastro']);
            }?>
            </p>
            <p>
                <?php 
                //Recuperando o valor da variável global, deslogado com sucesso.
                if(isset($_SESSION['erro_cadastro'])){
                    echo $_SESSION['erro_cadastro'];
                    unset($_SESSION['erro_cadastro']);
                }
                ?>
            </p>



    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/valida_lista.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="js/auto_complete.js"></script>
</body>
</html>