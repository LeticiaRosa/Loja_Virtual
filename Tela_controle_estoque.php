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
                  <h1>CONTROLE DE ESTOQUE</h1>
                  <div class="form-wraper">
                  <div class="col-1">
                            <p>Tipo Movimento</p>
                            <select name="tipo" id="tipo" placeholder="Tipo Movimento">
                                <option value="Entrada" id="Entrada">Entrada de Produtos</option>
                                <option value="Saida" id="Saida">Saida de Produtos</option>
                            </select>
                        </div>
                     
                  </div>
                  
                  <div class="form-wraper">

                      <div class="conter">

                        <div class="form-wraper">
                                <div class="codigo_barras col">
                                        <p>Codigo De Barras *</p>
                                        <input type="text" name="codigo" id="codigo" required placeholder="Codigo" autocomplete="off" onchange="busca_produto(<?php echo $_SESSION['empresausuario']?>)" maxlength="100">
                                </div>
                            </div>
                          <div class="col">
                              <div class="iconeSearch ">
                                  
                                  <input type="submit" name="Pesquisarproduto" id="Pesquisarproduto" class="Pesquisarproduto" value="Pesquisar Produto" onclick="produto()" />
                                  <div class="imagem">
                                      <img src="imagens/icons8_search_48px.png"></img>
                                  </div>
                              </div>

                              <div class = "limpa">
                                </div>

                          </div>
                          <div class="col">
                              <div class="input_produto">
                                  <p>Produto *</p>
                                  <input type="text" name="produto" id="produto" readonly = "readonly" placeholder="Produto">
                              </div>
                              <div class="divQuanti">
                                  <p>Quantidade *</p>
                                  <input type="text" name="quantidade" id="quantidade" placeholder="Quantidade" autocomplete="off" onchange="busca_produto(<?php echo $_SESSION['empresausuario']?>)" maxlength="5">
                              </div>
                          </div>


                      </div>
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
                          <div class="form-wraper1">

                                <div class="col1">
                                    <p>Total De itens Entrada</p>
                                    <input   readonly = "readonly" type="text" name="itens_entrada" id="itens_entrada" autocomplete="off">
                                </div>
                                <div class="col2">
                                    <p id="nome_campo">Total de Itens Saida</p>
                                    <div class="din">
                                    
                                    <input type="text"   readonly = "readonly" name="itens_saida"  id="itens_saida" autocomplete="off">
                                    </div>
                                </div>
                                </div>
                      </div>
                  </div>

                  <div class="form-wraper">
                      <div class="enviar">
                          <input type="submit" name="Confirmar" id="Confirmar" value="Concluir" onclick= "return openConfirmacao('confirma')"/>
                          <input type="submit" name="Excluir" id="Excluir" value="Cancelar" onclick="return openConfirmacao('excluir')" />
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
            <input type="submit" value="OK" id="OK" onclick=" return confirma()" />
            <input type="submit" value="Cancelar" id="Cancelar" onclick="fechamodal()" />

        </div>
    </div>
    </div>
      
      <script type="text/javascript" src="js/jquery.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script>
      <script type="text/javascript" src="js/controle_estoque.js"></script>
      <script type="text/javascript" src="js/modal.js"></script>
  </body>




  </html>