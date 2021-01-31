  <!DOCTYPE html>
  <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
      <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
      <link rel="stylesheet" type="text/css" href="css/css_controle_estoque.css">
      <link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.ico">

      <title>Controle de Estoque</title>
  </head>
  <html>
  <body>
      <?php
        include_once("menu.php");
        ?>
       
          <div class="center" >
          <section class="cover-form">
          <div class="form-container">
                  <h1>Movimento de Estoque</h1>

          <div class="tabela-container">
                          <div class="corpao">
                              <table id="products-table-1" class="teste1">

                                  <thead class="cabeça">
                                      <tr>
                                          <th>Id</th>
                                          <th>Nome do produto</th>
                                          <th>Quantidade</th>
                                          <th>Tipo Mov</th>
                                          <th>  </th>
                                          

                                      </tr>
                                  </thead>

                                  <tbody id="visualizarDados" class="teste">

                                  </tbody>

                              </table>
                          </div>
                         
                      </div>
                      </div>
          </section>
         
          <div id="openModal" class="modalDialog">
        
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
            <p id="Texto"> <?php
                //Recuperando o valor da variável global, os erro de login.
                if (isset($_SESSION['sucesso_cadastro'])) {
                    echo $_SESSION['sucesso_cadastro'];
                    unset($_SESSION['sucesso_cadastro']);
                } ?>
            </p>
            <p id="Texto"> <?php
                //Recuperando o valor da variável global, deslogado com sucesso.
                if (isset($_SESSION['erro_cadastro'])) {
                    echo $_SESSION['erro_cadastro'];
                    unset($_SESSION['erro_cadastro']);
                }
                ?>
            </p>
            <input type="submit" value="OK" id="OK" onclick="confirma()" />

        </div>
    </div>
    </div>

   
     

      
      <script type="text/javascript" src="js/jquery.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script>
      <script type="text/javascript" src="js/controle_estoque.js"></script>
      <script type="text/javascript" src="js/modal.js"></script>
  </body>




  </html>