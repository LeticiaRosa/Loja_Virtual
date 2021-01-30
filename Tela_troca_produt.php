<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="css/css_trocar_prod.css">
    <link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.ico">

    <title>Caixa</title>
</head>
<html>

<body>
    <?php
    include_once("menu.php");
    ?>

    <div class="center">
       
            <section class="cover-form">
                <div class="form">
                    <div class="form-container">
                        <h1>Entrada De Produtos</h1>

                        <div class="form-wraper">

                            <div class="col">
                                <p>Codigo de Barras</p>
                                <input type="text" name="codigo1" id="codigo1" placeholder="Codigo de Barras" autocomplete="off" onchange="busca_produto(<?php echo $_SESSION['empresausuario'] ?>)">
                            </div>
                        </div>
                        <div class="form-wraper">
                            <div class="iconeSearch">
                                <input type="button" name="Pesquisarproduto" id="Pesquisarproduto-entrada" class="Pesquisarproduto" value="Pesquisar Produto" onclick="produto()" />
                                <div class="imagem">
                                    <img src="imagens/icons8_search_48px.png"></img>
                                </div>
                            </div>
                        </div>
                        <div class="form-wraper">

                            <div class="col">
                                <p>Nome do Produto</p>
                                <input type="text" name="produto2" id="produto2" readonly="readonly" placeholder="produto" autocomplete="off">
                            </div>
                            <div class="col">
                                <p>Quantidade</p>
                                <input type="text" name="Quantidade" id="Quantidade" placeholder="Quantidade" autocomplete="off" onchange="busca_produto(<?php echo $_SESSION['empresausuario'] ?>)">
                            </div>
                        </div>
                        <div class="form-wraper">
                            <div class="tabela-container">
                                <div class="corpao">
                                    <table id="products-table-1" class="teste1">

                                        <thead class="cabeça">
                                            <tr>
                                                <th>Id</th>
                                                <th>Nome do produto</th>
                                                <th>Valor produto</th>
                                                <th>Quantidade</th>
                                                <th> </th>


                                            </tr>
                                        </thead>

                                        <tbody id="visualizarDados" class="teste">

                                        </tbody>

                                    </table>
                                </div>
                                <div class="form-wraper1">

                                    <div class="col1">
                                        <p>Total De itens</p>
                                        <input readonly="readonly" type="text" name="itens" id="itens" autocomplete="off">
                                    </div>
                                    <div class="col2">
                                        <p id="nome_campo">Total Venda</p>
                                        <div class="din">
                                            <p id="dinheiro"> R$</p>
                                            <input type="text" readonly="readonly" name="venda" id="venda" autocomplete="off">
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                </div>
                <div class="form">
                    <div class="form-container">
                        <h1>Saida De Produtos</h1>
                        <div class="form-wraper">

                            <div class="col">
                                <p>Codigo de Barras</p>
                                <input type="text" name="nome-saida" id="nome-saida" placeholder="Codigo de Barras" autocomplete="off" onchange="busca_produto_saida(<?php echo $_SESSION['empresausuario'] ?>)">
                            </div>
                        </div>
                        <div class="form-wraper">
                            <div class="iconeSearch">
                                <input type="button" name="Pesquisarproduto" id="Pesquisarproduto-saida" class="Pesquisarproduto" value="Pesquisar Produto" onclick="produto_saida()" />
                                <div class="imagem">
                                    <img src="imagens/icons8_search_48px.png"></img>
                                </div>
                            </div>
                        </div>
                        <div class="form-wraper">

                            <div class="col">
                                <p>Nome do Produto</p>
                                <input type="text" name="produto-saida" id="produto-saida" readonly="readonly" placeholder="produto" autocomplete="off">
                            </div>
                            <div class="col">
                                <p>Quantidade</p>
                                <input type="text" name="Quantidade-saida" id="Quantidade-saida" placeholder="Quantidade" autocomplete="off" onchange="busca_produto_saida(<?php echo $_SESSION['empresausuario'] ?>)">
                            </div>
                        </div>
                        <div class="form-wraper">
                            <div class="tabela-container">
                                <div class="corpao">
                                    <table id="products-table-2" class="teste1">

                                        <thead class="cabeça">
                                            <tr>
                                                <th>Id</th>
                                                <th>Nome do produto</th>
                                                <th>Valor produto</th>
                                                <th>Quantidade</th>
                                                <th> </th>


                                            </tr>
                                        </thead>

                                        <tbody id="visualizarDados-2" class="teste">

                                        </tbody>

                                    </table>
                                </div>
                                <div class="form-wraper1">

                                    <div class="col1">
                                        <p>Total De itens</p>
                                        <input readonly="readonly" type="text" name="itens-saida" id="itens-saida" autocomplete="off">
                                    </div>
                                    <div class="col2">
                                        <p id="nome_campo">Total Venda</p>
                                        <div class="din">
                                            <p id="dinheiro"> R$</p>
                                            <input type="text" readonly="readonly" name="venda-saida" id="venda-saida" autocomplete="off">
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <section class="cover-form">
                <div class="form-container">
                <form method="POST" name="form" id ="form"action="back_end/trocar_produto.php">
                    <h1>Dados Troca</h1>


                    <div class="form-wraper">
                        <div class="col">
                            <p> Diferença a Pagar:</p>
                            <input type="text" name="tl_fim" id="tl_fim" value="0,00" readonly="readonly" placeholder="Valor Fim">
                            <div class="imagem-alert">
                                <img id="img_alter" src="imagens/icons8_error_24px.png" onmouseenter="aletar_val()" onmouseout="Remove_alert()"></img>
                                <p id="mensagem-alter"> Valor Da devolução e Maior que Valor da Troca!!!</p>

                            </div>

                        </div>

                        <div class="col">
                            <p>Forma de Pagamento:</p>
                            <select name="pagamento" id="pagamento" required placeholder="Forma de Pagamento">
                                <option selected disabled value="">Selecione</option>
                                <option value="credito">Cartão de Credito</option>
                                <option value="debito">Cartão de Debito</option>
                                <option value="dinheiro">Dinheiro</option>
                                <option value="Anotar">Anotar</option>
                            </select>
                        </div>
                        <div class="col" id="col-5">
                            <p>Quantidade de Parcelas</p>
                            <select name="forma_pagamento" id="forma_pagamento" placeholder="Forma de Pagamento">
                                <option selected disabled value="">Selecione</option>
                                <option value="a_vista">A vista</option>
                                <option value="1x">1x</option>
                                <option value="2x">2x</option>
                                <option value="3x">3x</option>
                                <option value="4x">4x</option>
                                <option value="5x">5x</option>
                                <option value="6x">6x</option>
                                <option value="7x">7x</option>
                                <option value="8x">8x</option>
                                <option value="9x">9x</option>
                                <option value="10x">10x</option>
                                <option value="11x">11x</option>
                                <option value="12x">12x</option>
                            </select>
                        </div>

                    </div>

                    <div class="enviar">
                        <input type="submit" name="Confirmar" id="Confirmar" value="Confirmar" onclick=" return finaliza_troca()" />

                        <input type="button" name="Cancelar" id="Cancelar" value="Cancelar" onclick="window.location.href='Tela_troca_produt.php'">

                    </div>
                </div>
            </section>
            <div id="openModal" class="modalDialog">

            </div>
        </form>
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






    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/modal.js"></script>
    <script type="text/javascript" src="js/trocar_produto.js"></script>
</body>




</html>