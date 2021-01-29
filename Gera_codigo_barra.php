<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/css_codigo_barras.css">
    <link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.ico">
    <title>Gerar Codigo De Barras</title>
</head>

<body>

    <?php

    include_once("menu.php");
    ?>
    <div class="center">
        <nav class="menu" id="menu">
            <div class="corpo">
                <h1>Gerador De Codigos</h1>
                <form method="POST" name="form" action="">
                    <div class="conter">
                        <div class="col">
                            <p>ID PRODUTO:</p>
                            <input type="text" name="Id" id="Id" value=" <?php $id = "";
                                                                            if (isset($_GET['id'])) {
                                                                                $id = $_GET['id'];
                                                                                echo trim($id);
                                                                            } else {
                                                                                $id = "";
                                                                                echo trim($id);
                                                                            }  ?>" readonly="readonly">
                        </div>
                        <div class="col">
                            <p>Codigo De barras:</p>
                            <input type="text" name="codigo" id="codigo" disabled>
                        </div>

                        <div class="col">
                            <p>PRODUTO:</p>
                            <input type="text" name="produto1" id="produto1" disabled>
                        </div>

                        <div class="col">
                            <p>VALOR PRODUTO:</p>
                            <input type="text" name="valor_produto" id="valor_produto" disabled>
                        </div>

                        <div class="col">
                            <p>QUANTIDADE EM ESTOQUE:</p>
                            <input type="text" name="qtd_estoque" id="qtd_estoque" disabled>
                        </div>


                    </div>
                    <div class="conter-1">

                        <div class="col-1">
                            <p>QUANTIDADE DE ETIQUETAS:</p>
                            <input type="text" name="qtd_etiquetas" id="qtd_etiquetas" require autocomplete="OFF" maxlength="3">
                        </div>
                    </div>
                    <div class="conter">
                        <div class="enviar">
                            <input type="submit" name="acao" id="clicar" value="Gerar">
                        </div>
                    </div>
                </form>
            </div>
    </div>
    <div class="cod_barra" id="barcodeDiv">

    </div>



    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/bytescoutbarcode128_1.00.07.js"></script>
    <script type="text/javascript" src="js/gerador.js"></script>
    <script type="text/javascript" src="js/busca_dados_codigo.js"></script>

    </script>
</body>

</html>