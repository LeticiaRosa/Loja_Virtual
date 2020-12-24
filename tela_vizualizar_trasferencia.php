<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="css/css_listar_trasferencias.css">

</head>
<html>

<body onload="fechamdal()">

    <title>Trasferencias</title>
    </head>

    <body>

        <?php
        include_once("menu.php");
        ?>

        <section class="cover-form">
            <div class="form-container">
                <h1>Transferencia</h1>

                <div class="form-wraper-1">

                    <table id="products-table">
                        <thead class="cabeça">
                            <tr>
                                <th class="sumir_sempre">Id</th>
                                <th>Produto</th>
                                <th>Nome Empresa Origem</th>
                                <th>Nome Empresa Destino</th>
                                <th class="sumir">Status</th>
                                <th class="sumir">Quantidade</th>
                                


                            </tr>
                        </thead>
                        <tbody id="visualizarDados">


                        </tbody>
                    </table>
                </div>
            </div>
            <!--container bg-->
        </section>
        <div id="openModal" class="modalDialog">
        </div>
        <div class="pega">
            <input id="pega" type="text" value="<?php if (isset($_SESSION['sucesso_cadastro'])) {
                                                    echo $_SESSION['sucesso_cadastro'];
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

                <input type="submit" value="OK" onclick="fechamodal()" /> </p>

            </div>
        </div>

        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="DataTables/datatables.min.js"></script>
        <script type="text/javascript" src="js/listar_trasferencias.js"></script>
        <script type="text/javascript" src="js/modal.js"></script>
       




    </body>

</html>