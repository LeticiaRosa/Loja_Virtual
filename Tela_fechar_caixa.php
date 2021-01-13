<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/css_fechar_caixa.css">
    <title>Fechamento de Caixa</title>
</head>

<body>

    <?php
    include_once("menu.php");
    ?>
    <div class="center">
        <section class="cover-form">
            <div class="form-container">
                <h1>Fechamento de Caixa</h1>
                <form method="POST" name="form" action="">
                    <div class="form-wraper">

                        <div class="col">
                            <p>Loja:</p>
                            <input type="text" name="nome" id="nome" readonly="readonly" placeholder="Nome" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-wraper">
                        <div class="col">
                            <p>Usuário Abertura:</p>
                            <input type="text" name="user_abertura" id="user_abt" readonly="readonly" placeholder="Nome" autocomplete="off">
                        </div>
                        <div class="col">
                            <p id="p_texto">Data Abertura:</p>
                            <input type="date" name="dt_abertura" id="dt_abertura" readonly="readonly" placeholder="Nome" autocomplete="off">
                        </div>
                        <div class="col">
                            <p id="p_texto">Hora Abertura:</p>
                            <input type="time" name="hr_abertura" id="hr_abertura" readonly="readonly" placeholder="Nome" autocomplete="off">
                        </div>

                    </div>
                    <div class="form-wraper">
                        <div class="col">
                            <p>Usuário Fechamento:</p>
                            <input type="text" name="user_fechamento" id="user_abt" readonly="readonly" placeholder="Nome" autocomplete="off">
                        </div>
                        <div class="col">
                            <p id="p_texto">Data Fechamento:</p>
                            <input type="date" name="dt_fechamento" id="dt_abertura" readonly="readonly" placeholder="Nome" autocomplete="off">
                        </div>
                        <div class="col">
                            <p id="p_texto">Hora Fechamento:</p>
                            <input type="time" name="hr_fechamento" id="hr_abertura" readonly="readonly" placeholder="Nome" autocomplete="off">
                        </div>

                    </div>

                    <div class="tabela-container">
                        <div class="corpao">
                            <table id="products-table" class="teste1">

                                <thead class="cabeça">
                                    <tr>
                                        <th>Id</th>
                                        <th>Nome do produto</th>
                                        <th>Valor produto</th>
                                        <th>Quantidade</th>

                                    </tr>
                                </thead>

                                <tbody id="visualizarDados" class="teste">
                                    <tr class="corpo">
                                        <td>1</td>
                                        <td>Nome do produto</td>
                                        <td>Valor produto</td>
                                        <td>50</td>

                                    </tr>
                                    <tr class="corpo">
                                        <td>1</td>
                                        <td>Nome do produto</td>
                                        <td>Valor produto</td>
                                        <td>50</td>

                                    </tr>
                                    <tr class="corpo">
                                        <td>1</td>
                                        <td>Nome do produto</td>
                                        <td>Valor produto</td>
                                        <td>50</td>

                                    </tr>
                                    <tr class="corpo">
                                        <td>1</td>
                                        <td>Nome do produto</td>
                                        <td>Valor produto</td>
                                        <td>50</td>

                                    </tr>
                                    <tr class="corpo">
                                        <td>1</td>
                                        <td>Nome do produto</td>
                                        <td>Valor produto</td>
                                        <td>50</td>

                                    </tr>
                                    <tr class="corpo">
                                        <td>1</td>
                                        <td>Nome do produto</td>
                                        <td>Valor produto</td>
                                        <td>50</td>

                                    </tr>
                                    <tr class="corpo">
                                        <td>1</td>
                                        <td>Nome do produto</td>
                                        <td>Valor produto</td>
                                        <td>50</td>

                                    </tr>
                                    <tr class="corpo">
                                        <td>1</td>
                                        <td>Nome do produto</td>
                                        <td>Valor produto</td>
                                        <td>50</td>

                                    </tr>
                                    <tr class="corpo">
                                        <td>1</td>
                                        <td>Nome do produto</td>
                                        <td>Valor produto</td>
                                        <td>50</td>

                                    </tr>
                                    <tr class="corpo">
                                        <td>1</td>
                                        <td>Nome do produto</td>
                                        <td>Valor produto</td>
                                        <td>50</td>

                                    </tr>
                                    <tr class="corpo">
                                        <td>1</td>
                                        <td>Nome do produto</td>
                                        <td>Valor produto</td>
                                        <td>50</td>

                                    </tr>
                                    <tr class="corpo">
                                        <td>1</td>
                                        <td>Nome do produto</td>
                                        <td>Valor produto</td>
                                        <td>50</td>

                                    </tr>
                                    <tr class="corpo">
                                        <td>1</td>
                                        <td>Nome do produto</td>
                                        <td>Valor produto</td>
                                        <td>50</td>

                                    </tr>
                                    <tr class="corpo">
                                        <td>1</td>
                                        <td>Nome do produto</td>
                                        <td>Valor produto</td>
                                        <td>50</td>

                                    </tr>
                                    <tr class="corpo">
                                        <td>1</td>
                                        <td>Nome do produto</td>
                                        <td>Valor produto</td>
                                        <td>50</td>

                                    </tr>
                                    <tr class="corpo">
                                        <td>1</td>
                                        <td>Nome do produto</td>
                                        <td>Valor produto</td>
                                        <td>50</td>

                                    </tr>
                                    <tr class="corpo">
                                        <td>1</td>
                                        <td>Nome do produto</td>
                                        <td>Valor produto</td>
                                        <td>50</td>

                                    </tr>
                                    <tr class="corpo">
                                        <td>1</td>
                                        <td>Nome do produto</td>
                                        <td>Valor produto</td>
                                        <td>50</td>

                                    </tr>
                                    <tr class="corpo">
                                        <td>1</td>
                                        <td>Nome do produto</td>
                                        <td>Valor produto</td>
                                        <td>50</td>

                                    </tr>
                                    <tr class="corpo">
                                        <td>1</td>
                                        <td>Nome do produto</td>
                                        <td>Valor produto</td>
                                        <td>50</td>

                                    </tr>
                                    <tr class="corpo">
                                        <td>1</td>
                                        <td>Nome do produto</td>
                                        <td>Valor produto</td>
                                        <td>50</td>

                                    </tr>
                                    <tr class="corpo">
                                        <td>1</td>
                                        <td>Nome do produto</td>
                                        <td>Valor produto</td>
                                        <td>50</td>

                                    </tr>
                                    <tr class="corpo">
                                        <td>1</td>
                                        <td>Nome do produto</td>
                                        <td>Valor produto</td>
                                        <td>50</td>

                                    </tr>
                                    <tr class="corpo">
                                        <td>1</td>
                                        <td>Nome do produto</td>
                                        <td>Valor produto</td>
                                        <td>50</td>

                                    </tr>
                                    <tr class="corpo">
                                        <td>1</td>
                                        <td>Nome do produto</td>
                                        <td>Valor produto</td>
                                        <td>50</td>

                                    </tr>
                                    <tr class="corpo">
                                        <td>1</td>
                                        <td>Nome do produto</td>
                                        <td>Valor produto</td>
                                        <td>50</td>

                                    </tr>
                                    <tr class="corpo">
                                        <td>1</td>
                                        <td>Nome do produto</td>
                                        <td>Valor produto</td>
                                        <td>50</td>

                                    </tr>

                                </tbody>

                            </table>
                        </div>


                    </div>

                    <div class="form-wraper">
                        <div class="col">
                            <p id="p_texto">Quatidade Total de Vendas:</p>
                            <input id="fim" type="text" name="qtd_vendas" id="qtd_vendas" readonly="readonly" placeholder="Vendas" autocomplete="off">
                        </div>
                        <div class="col">
                            <p id="p_texto">Valor Total:</p>
                            <input id="fim" type="text" name="v_total" id="v_total" readonly="readonly" placeholder="Valor Total" autocomplete="off">
                        </div>


                    </div>
                    <div class="enviar">
                        <input type="submit" name="acao" id="clicar" value="Fechar" />

                    </div>
                </form>
            </div>


            <!--container bg-->
        </section>
    </div>
    <!--cover-form-->
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

</body>

</html>