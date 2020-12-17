<!DOCTYPE html>


<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/editar_produto_modal.css">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
 
</head>
<html>

<body>
<section class="cover-form">
		  			<div class="form-container" id ="modal" >
		  			  	<h1>Editar Produto</h1>
		  			  	<form  method="POST"  name="form" action="back_end/banco.php">
                    <div class="form-wraper">
                      <div class="col" style = "  width: 25%; ">
                        <p>ID_Produto</p>
                        <input  type="text" name="nome" id="id" required placeholder= "id" autocomplete="off" disabled>
                      </div> 
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
                        <p>Sub Categoria:*</p>
                        <input type="text" name="id_sub_categoria" id="id_sub_categoria"  placeholder="Sub Categoria" autocomplete="off" >
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
                        <div class="col-3"> 
                        <div class = "texto"> Deseja gerar codigo de barra automático? </div>
                          <input type="radio" id="radio-1" name="barras" value="S" > <div class = "barra"> Sim </div>
                          <input type="radio" id="radio-2" name="barras" value="N" > <div class = "barra"> Não </div>
                        </div>
                        <div class="col-3" id="gerar_codigo">
                        <div class = "texto" id = "texto">Código: </div>
                          <div class = "barra" id = "barra"><input type="text" class = "gerar" name="gerar_codigo-1" id="gerar_codigo-1" placeholder="Código" autocomplete="off" ></div>
                        </div>
                      </div>


                      <div class="form-wraper">
                      <div class="col">
                        <p>Observação:</p>
                        <input type="text" name="observacao" id="observacao" placeholder="Observação" autocomplete="off" >
                      </div>

                      </div>


                    <div class="salvar">
                    <input type="submit" value="Salvar" />
                 
		  			  		  <p>*campos obrigatorios</p>
                    </div>

                </form>

          </div><!--container bg-->
          </section>     

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
  <script type="text/javascript" src="js/valida_lista.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
 <!-- <script type="text/javascript" src="js/auto_complete.js"></script> -->
  <script src = "js / jquery.ui.core.js" type = "text / javascript" > </script>
   <script src = "js / jquery.ui.widget.js" type = "text / javascript" > </script> 
   <script src = "js / jquery.ui.button.js" type = "text / javascript" > </script>  
   

</body>
</html> 