<!DOCTYPE html>

    <head>
 
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">      
    <link rel="stylesheet" type="text/css" href="css/css_fornecedor.css">
    <title>Cadastro</title>
    </head>
    <body>
    
<?php 
   include_once("menu.php");
?>
            <section class="cover-form">
		  			<div class="form-container">
		  			  	<h1>Cadastro de Fornecedor</h1>
		  			  	<form  method="POST"  name="form" action="back_end/fornecedor.php" >
		  			  		<div class="form-wraper">

                    <div class="col">
                      <p>Nome Fornecedor*</p>
                      <input  type="text" name="nome" id="nome" required placeholder= "Nome" autocomplete="off" >
                    </div> 
                    <div class="col">
		  			  	 <p>Razao Social</p>
                      <input type="text" name="Razao_Social" id="Razao_Social" placeholder="Razao Social" autocomplete="off" >
                    </div>  
                    </div>
                    <div class="form-wraper">
                    <div class="col">
                      <p>CNPJ*:</p>
                      <input type="text" name="CNPJ" id="CNPJ" required placeholder="Cnpj" autocomplete="off" >
                    </div>
                    <div class="col">
                      <p>Telefone Fixo:</p>
                      <input type="text" name="fixo" id="fixo"  placeholder="Telefone" autocomplete="off" >
                    </div>
                    <div class="col">
                      <p>Telefone celular:</p>
                      <input type="text" name="celular" id="celular" class="celular" placeholder="Telefone" autocomplete="off" >
                    </div>

                    </div>
                    <div class="form-wraper">
                    
                    <div class="col">
                      <p>Contato:</p>
                      <input type="text" name="Contato" id="Contato" placeholder="Nome Pessoa Referencia" autocomplete="off" >
                    </div>  
                    
                    <div class="col">
                    <p>E-MAIL:</p>
                      <input type="email" name="E-MAIL" id="E-MAIL" placeholder="E-mail" autocomplete="off" >
                    </div>
                    </div>
                    <div class="form-wraper">
                    <div class="col">
                      <p>Endereço:</p>
                      <input type="text" name="endereco" id="endereco" placeholder="Endereço" autocomplete="off" >
                    </div>
                    <div class="col">
                      <p>CEP:</p>
                      <input type="text" name="CEP" id="CEP" placeholder="CEP" autocomplete="off" >
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
    <div class="pega">
    <input  id="pega" type="text" value="<?php if(isset($_SESSION['sucesso_cadastro'])) {echo $_SESSION['sucesso_cadastro']; }?>" >
    </div>
    <div class="conteiner" id="conteiner">
      <div class="couver">
            <p> <?php 
			//Recuperando o valor da variável global, os erro de login.
			if(isset($_SESSION['sucesso_cadastro'])){
              echo $_SESSION['sucesso_cadastro'];
                unset($_SESSION['sucesso_cadastro']);
            }?>
            </p>
            <p> <?php 
                //Recuperando o valor da variável global, deslogado com sucesso.
                if(isset($_SESSION['erro_cadastro'])){
                    echo $_SESSION['erro_cadastro'];
                    unset($_SESSION['erro_cadastro']);
                }
                ?>
                </p>
            <input type="submit" value="OK" onclick="fechamodal()"/> </p>
          
        </div>
    </div>
      
    
    <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/modal.js"></script>


    </body>
    </html>
