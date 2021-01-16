<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/abrir_caixa.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.ico">



</head>
<html>

<body>

    <?php
    include_once("menu.php");
    ?>
    <div class="center">
        <section class="cover-form">
            <div class="form-container">
                <h1>ABRIR CAIXA</h1>
                <form method="POST" name="form">
                    <div class="form-wraper">

                        <div class="col">
                            <p>Selecione o caixa que deseja abrir: * </p>
                            <input type="text" name="nome_caixa" id="nome_caixa" required placeholder="Nome do Caixa" onchange="buscaDados(); document.getElementById('valor_inicial').focus();">
                        </div>

                        <div class="col-1">
                            <p>Empresa</p>
                            <input type="text" name="Empresa1" id="Empresa1" readonly = "readonly" autocomplete="off" >
                        </div>
                        
                        <div class="col-1">
                            <p>Nome da Máquina: </p>
                            <input type="text" name="maquina" id="maquina" readonly = "readonly" value = "" autocomplete="off">
                        </div>

                        <div class="col-1">
                            <p>Status do Caixa: </p>
                            <input type="text" name="status" id="status" readonly = "readonly" value = "" autocomplete="off">
                        </div>
                        
                    </div>
                    <div class="form-wraper">
                        <div class="col-2">
                            <p>Valor Inicial: *</p>
                            <input type="text" name="valor_inicial" id="valor_inicial" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-wraper">
                        <div class="col">
                            <p>Observação</p>
                            <input type="text" name="Observacao" id="Observacao" placeholder="Observação" autocomplete="off">
                        </div>
                    </div>
                    <div class="enviar">
                        <input type="submit" name="acao" id="clicar" value="Abrir Caixa" />
                    </div>

                </form>
            </div>
        </section>
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
    <script type="text/javascript" src="js/abrir_caixa.js"></script>
    <script type="text/javascript" src="js/modal.js"></script>

</body>

</html>