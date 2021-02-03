<!DOCTYPE html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">


  <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
  <link rel="stylesheet" type="text/css" href="css/cadastro.css">
  <link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.ico">

  <title>Cadastro De Produtos</title>

</head>
<html>

<body>

  <?php
  include_once("menu.php");
  ?>
  <div class="center">
    <section class="cover-form">
      <div class="form-container">
        <h1>Cadastro de Produtos</h1>
        <form method="POST" name="form" action="back_end/banco.php">
          <div class="form-wraper">

            <div class="col">
              <p>Nome do Produto*</p>
              <input type="text" name="nome" id="nome" required placeholder="Nome" autocomplete="off" maxlength="30">
            </div>
            <div class="col">
              <p>Descrição</p>
              <input type="text" name="descricao" id="descricao" placeholder="Descrição" autocomplete="off" maxlength="50">
            </div>
            <div class="col" style="  width: 80%; ">
              <p>Empresa</p>
              <input type="text" name="empresa1" id="empresa1" value="" placeholder="Empresa" autocomplete="off" required>
            </div>
            <div class="col">
              <p>Codigo Referencia</p>
              <input type="text" name="cod_referencia" id="cod_referencia" readonly="readonly"placeholder="Codigo Referencia" autocomplete="off">
            </div>
          </div>


          <div class="form-wraper">


            <div class="col">
              <p>Categoria:*</p>
              <input type="text" name="id_categoria" id="id_categoria" required placeholder="Categoria" autocomplete="off">
            </div>

            <div class="col">
              <p>Sub Categoria:*</p>
              <input type="text" name="id_sub_categoria" id="id_sub_categoria" placeholder="Sub Categoria" autocomplete="off">
            </div>

            <div class="col">
              <p>Preço de Venda:*</p>
              <input type="text" name="preco_venda" id="preco_venda" required placeholder="Preço de Venda" onkeyup=" venda(this.value)" autocomplete="off" maxlength="10">
            </div>

            <div class="col">
              <p>Preço de Custo:*</p>
              <input type="text" name="preco_custo" id="preco_custo" required placeholder="Preço de Custo" onkeyup="custo(this.value)" autocomplete="off" maxlength="10">
            </div>

            <div class="col">
              <p>Quantidade:*</p>
              <input type="text" name="quantidade" id="quantidade" required placeholder="Quantidade" autocomplete="off" maxlength="5">
            </div>

          </div>
          <div class="form-wraper">
            <div class="col">
              <p>Fornecedor:*</p>
              <input type="text" name="id_fornecedor" id="id_fornecedor" required placeholder="Fornecedor" autocomplete="off">
            </div>
            <div class="col">
              <p>Marca:</p>
              <input type="text" name="marca" id="marca" placeholder="Marca" autocomplete="off" maxlength="30">
            </div>
            <div class="col-1">
              <p>Unidade de medida:</p>
              <select name="unidade_medida" id="unidade_medida" placeholder="Unidade de Medida">
                <option selected disabled value="">Selecione</option>
                <option value="Tamanho">Tamanho</option>
                <option value="Peso em KG">Peso em KG</option>
                <option value="Mililitros (ml)">Ml</option>
                <option value="">Nenhum</option>
              </select>
            </div>

            <div class="col-2" id="valor_medida">
              <p>Valor Medida:</p>
              <input type="text" name="valor_medida" id="valor_medida" placeholder="Valor Medida" autocomplete="off" maxlength="10"> 
            </div>

          </div>

          <div class="form-wraper">
            <div class="col-3">
              <div class="texto"> Deseja gerar codigo de barra automático? </div>
              <input type="radio" name="barras" value="S" checked="checked">
              <div class="barra"> Sim </div>
              <input type="radio" name="barras" value="N">
              <div class="barra"> Não </div>
            </div>
            <div class="col-3" id="gerar_codigo">
              <div class="texto">Código: </div>
              <div class="barra"><input type="text" class="gerar" name="gerar_codigo-1" id="gerar_codigo" placeholder="Código" autocomplete="off"></div>
            </div>
          </div>


          <div class="form-wraper">
            <div class="col">
              <p>Observação:</p>
              <input type="text" name="observacao" id="observacao" placeholder="Observação" autocomplete="off" maxlength="100">
            </div>

          </div>

          <div class="enviar">
            <input type="submit" name="acao" id="clicar" value="Cadastrar" />

          </div>
          <div class="teste3">
                            <img src="imagens/icons8_ok_48px.png"></img>
            </div>
        </form>

      </div>
      <!--container bg-->
    </section>
    <!--cover-form-->
  </div>
  <div class="pega">
    <input id="pega" type="text" value="<?php if (isset($_SESSION['sucesso_cadastro'])) {
                                          echo $_SESSION['sucesso_cadastro'];
                                        } else if (isset($_SESSION['erro_cadastro'])) {
                                          echo $_SESSION['erro_cadastro'];
                                        } ?>">
  </div>

  <div class="conteiner" id="conteiner">
    <div class="couver">
      <p> <?php
          //Recuperando o valor da variável global, os erro de login.
          if (isset($_SESSION['sucesso_cadastro'])) {
            echo $_SESSION['sucesso_cadastro'];
            unset($_SESSION['sucesso_cadastro']);
          } ?>
      </p>
      <p> <?php
          //Recuperando o valor da variável global, deslogado com sucesso.
          if (isset($_SESSION['erro_cadastro'])) {
            echo $_SESSION['erro_cadastro'];
            unset($_SESSION['erro_cadastro']);
          }
          ?>
      </p>
      <input type="submit" value="OK" onclick="fechamodal()" /> </p>
      <input type="submit" value="Gerar codigos de Barras" onclick="window.open('Gera_codigo_barra.php');" />
    </div>
  </div>



  <script type="text/javascript" src="js/jquery.js"></script>

  <script type="text/javascript" src="js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="js/valida_lista.js"></script>
  <script type="text/javascript" src="js/auto_complete.js"></script>
  <script type="text/javascript" src="js/modal.js"></script>

</body>

</html>