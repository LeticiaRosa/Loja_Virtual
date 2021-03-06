  <!DOCTYPE html>
  <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
      <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
      <link rel="stylesheet" type="text/css" href="css/css_caixa.css">
      <link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.ico">

      <title>Caixa</title>
  </head>
  <html>
  <body>
      <?php
        include_once("menu.php");
        ?>
       
      <div class="center" >
          <section class="cover-form">
              <div class="form-container">
                  <h1>CAIXA</h1>
                  <div class="form-wraper">

                      <div class="col">
                          <p>Codigo De Barras *</p>
                          <input type="text" name="codigo" id="codigo" required placeholder="codigo" autocomplete="off" onchange="busca_produto(<?php echo $_SESSION['empresausuario']?>)" maxlength="100">
                      </div>
                  </div>
                  <div class="form-wraper">

                      <div class="conter">
                          <div class="col">
                              <div class="iconeSearch">
                                  <input type="submit" name="Pesquisarproduto" id="Pesquisarproduto" class="Pesquisarproduto" value="Pesquisar Produto" onclick="produto()" />
                                  <div class="imagem">
                                      <img src="imagens/icons8_search_48px.png"></img>
                                  </div>
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
                          <div class="col">
                              <div class="iconeSearch">
                                  <input type="submit" name="Pesquisar" id="Pesquisar" class="Pesquisar" value="Pesquisar Vendedor"  onclick="Vendedor()"/>
                                  <div class="imagem">
                                      <img src="imagens/icons8_search_48px.png"></img>
                                  </div>
                              </div>

                          </div>
                          <div class="col">
                              <p>Vendedor</p>
                              <input type="text" name="Vendedor" id="Vendedor" readonly = "readonly" placeholder="Vendedor" autocomplete="off">
                          </div>
                          <div class="col">
                              <div class="iconeSearch">
                                  <input type="submit" name="Pesquisar" id="Pesquisar" class="Pesquisar" value="Pesquisar Cliente" onclick="cliente()" />
                                  <div class="imagem">
                                      <img src="imagens/icons8_search_48px.png"></img>
                                  </div>
                              </div>

                          </div>
                          <div class="col">
                              <p>Nome Cliente</p>
                              <input type="text" name="cliente" id="cliente" placeholder="Cliente"  readonly = "readonly"autocomplete="off">

                          </div>

                      </div>
                      <div class="tabela-container">
                          <div class="corpao">
                              <table id="products-table-1" class="teste1">

                                  <thead class="cabeça">
                                      <tr>
                                          <th>Id</th>
                                          <th>Nome do produto</th>
                                          <th>Valor produto</th>
                                          <th>Quantidade</th>
                                          <th>  </th>
                                          

                                      </tr>
                                  </thead>

                                  <tbody id="visualizarDados" class="teste">

                                  </tbody>

                              </table>
                          </div>
                          <div class="form-wraper1">

                              <div class="col1">
                                  <p>Total De itens</p>
                                  <input   readonly = "readonly" type="text" name="itens" id="itens" autocomplete="off">
                              </div>
                              <div class="col2">
                                  <p id="nome_campo">Total Venda</p>
                                  <div class="din">
                                      <p id="dinheiro"> R$</p>
                                  <input type="text"   readonly = "readonly" name="venda"  id="venda" autocomplete="off">
                                    </div>
                                  
                                  
                              </div>
                          </div>
                         
                      </div>


                  </div>




                  <div class="form-wraper">
                       
                      <div class="enviar">

                          <input type="submit" name="Confirmar" id="Confirmar" value="Finalizar Venda"  onclick="finalizar_venda()" />
                         
                      <input type="submit" name="Retirada" id="Retirada" class = "Retirada" value="Fazer retirada" onclick="retirada()" />
                     
                          <input type="submit" name="Excluir" id="Excluir" value="Cancelar Venda" onclick="return openConfirmacao('excluir')" />

                      </div>
                     
                  </div>

                  <div class="teste2">
                            <img src="imagens/icons8_ok_48px.png"></img>
                        </div>

                        <div class="teste3">
                            <img src="imagens/icons8_cancel_48px.png"></img>
                </div>
                  
       
          </section>
         
          <div id="openModal" class="modalDialog">
        
        </div>
        <div id="openModal1" class="modalDialog">
        
        </div>
        <div id="openModal2" class="modalDialog">
        
        </div>

        <div id="openModal3" class="modalDialog">
        
        </div>
        <div id="openModal4" class="modalDialog">
        <div><a href="#close" title="Close" onclick="tiralinha()" class="close">X</a>
            <?php include_once("Tela_finalizar_vendas.php");  ?>
        </div>
        </div>
        <div id="openModal5" class="modalDialog">
        <div><a href="#close" title="Close" class="close">X</a>
            <?php include_once("Cupom.php"); ?>
        </div>
        </div>
        <div id="openModal6" class="modalDialog">
        <div><a href="#close" title="Close" class="close">X</a>
            <?php include_once("cupom_retirada.php");?>
        </div>
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
            <p></p>
            <input type="button" value="Gerar Cupom" id="cupom" onclick=" imprimir_cupom(<?php echo $_SESSION['empresausuario']?>, document.getElementById('pega').value)" />

        </div>
    </div>
    </div>

   
     

      
      <script type="text/javascript" src="js/jquery.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script>
      <script type="text/javascript" src="js/produto_caixa.js"></script>
      <script type="text/javascript" src="js/modal.js"></script>
  </body>




  </html>