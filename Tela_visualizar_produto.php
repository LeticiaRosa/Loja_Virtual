<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="css/editar_produto.css">
</head>
<html>

<body>

    <?php
    include_once("menu.php");
    ?>

    <section class="cover-form">
        <div class="form-container">
            <h1>Editar Produto</h1>

            <div class="form-wraper-1">
                <table id="products-table">
                    <thead class="cabeça">

                        <tr>
                            <th> Nome <br /> </th>
                            <th class="sumir"> Descricao</th>
                            <th class="sumir2"> Categoria</th>
                            <th class="sumir2"> Sub Categoria</th>
                            <th> Preço de Venda </th>
                            <th> Preço de Custo </th>
                            <th> Quantidade </th>
                            <th class="sumir1"> Fornecedor </th>
                            <th class="sumir1"> Marca</th>
                            <th class="sumir"> Unidade de Medida</th>
                            <th class="sumir"> Valor Medida </th>
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
            <?php include_once("Tela_alterar_produto.php");  ?>
        </div>
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



    <script type="text/javascript" src="js/modal.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="DataTables/datatables.js"></script>
    <script type="text/javascript" src="js/seleciona_linha.js"></script>

</body>

</html>