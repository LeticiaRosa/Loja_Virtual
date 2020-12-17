<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />

    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="css/css_sub_categoria.css">

</head>
<html>

<body>

    <title>Exibir Sub Categoria</title>
    </head>

    <body>

        <?php
        include_once("menu.php");
        ?>
        <section class="cover-form">
            <div class="form-container">
                <h1>Sub Categorias</h1>

                <div class="form-wraper-1">

                    <table id="products-table">
                        <thead class="cabeça">
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Descricao</th>
                                <th>Status</th>
                                <th class="sumir">Observação</th>
                                <th class="sumir"> Usuario</th>
                                <th class="sumir">Data Cadastro</th>

                            </tr>
                        </thead>
                        <tbody id="visualizarDados">


                        </tbody>
                    </table>
                </div>
            </div>
            <!--container bg-->
        </section>
        <!--cover-form-->


        <div id="openModal" class="modalDialog">
            <div><a href="#close" title="Close" class="close">X</a>
                <?php include_once("Tela_altera_subcategoria.php");  ?>
            </div>
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
        <script type="text/javascript" src="js/modal.js"></script>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/lista_subcategoria.js"></script>
        <script type="text/javascript" src="DataTables/datatables.min.js"></script>



    </body>

</html>