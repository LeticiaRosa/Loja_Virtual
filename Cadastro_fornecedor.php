<!DOCTYPE html>

<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/css_fornecedor.css">
  <link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.ico">
  <title>Cadastro</title>
</head>

<body>

  <?php
  include_once("menu.php");
  ?>
  <div class="center">
    <section class="cover-form">
      <div class="form-container">
        <h1>Cadastro de Fornecedor</h1>
        <form method="POST" name="form" action="back_end/fornecedor.php">
          <div class="form-wraper">

            <div class="col">
              <p>Nome Fornecedor*</p>
              <input type="text" name="nome" id="nome" required placeholder="Nome" autocomplete="off" maxlength="100" >
            </div>
            <div class="col">
              <p>Razao Social</p>
              <input type="text" name="Razao_Social" id="Razao_Social" placeholder="Razao Social" autocomplete="off" maxlength="100" >
            </div>
          </div>
          <div class="form-wraper">
            <div class="col">
              <p>CNPJ*:</p>
              <input type="text" name="CNPJ" id="CNPJ" required placeholder="Cnpj" autocomplete="off" maxlength="11">
            </div>
            <div class="col">
              <p>Telefone Fixo:</p>
              <input type="text" name="fixo" id="fixo" placeholder="Telefone" autocomplete="off" maxlength="15>
            </div>
            <div class="col">
              <p>Telefone celular:</p>
              <input type="text" name="celular" id="celular" class="celular" placeholder="Telefone" autocomplete="off" maxlength="15">
            </div>

          </div>
          <div class="form-wraper">

            <div class="col">
              <p>Contato:</p>
              <input type="text" name="Contato" id="Contato" placeholder="Nome Pessoa Referencia" autocomplete="off" maxlength="100">
            </div>

            <div class="col">
              <p>E-MAIL:</p>
              <input type="email" name="E-MAIL" id="E-MAIL" placeholder="E-mail" autocomplete="off" maxlength="100">
            </div>
          </div>
          <div class="form-wraper">
            <div class="col">
              <p>Endereço:</p>
              <input type="text" name="endereco" id="endereco" placeholder="Endereço" autocomplete="off" maxlength="100">
            </div>
            <div class="col">
              <p>CEP:</p>
              <input type="text" name="CEP" id="CEP" placeholder="CEP" autocomplete="off" maxlength="25">
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

    </div>
  </div>


  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="js/modal.js"></script>


</body>

</html>