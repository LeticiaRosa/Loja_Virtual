<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/css_confirma_trasferencia.css">
    <link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.ico">
    <title>Confirmar Transferência</title>
</head>

<body>
    <div class="center">
        <section class="cover-form">
            <div><a href="tela_vizualizar_trasferencia.php" title="Close" class="close">X</a>
                <div class="form-container">
                    <h1>Confirmar Transferência</h1>
                    <form method="POST" name="form" action="back_end/trasferir.php">
                        <div class="col3">
                            <div class="col">
                                <label>ID TRANSFERÊNCIA</label>
                                <input type="text" name="id_tras" id="id_tras" value="<?php $id = $_GET['id'];
                                                                                        echo $id; ?>" readonly="readonly" autocomplete="off">
                            </div>
                            <div class="col">
                                <label>ID PRODUTO</label>
                                <input type="text" name="id_produto" id="id_produto" readonly="readonly" autocomplete="off">
                            </div>
                            <div class="col">
                                <label>Codigo Referência</label>
                                <input type="text" name="cod_referencia" id="cod_referencia" readonly="readonly" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-wraper">

                            <div class="col">
                                <p>Empresa Saiu*</p>
                                <input type="text" name="nome" id="nome" readonly="readonly" placeholder="Empresa" autocomplete="off">
                            </div>
                            <div class="col">
                                <p>Nome do Produto</p>
                                <input type="text" name="produto4" id="produto4" readonly="readonly" placeholder="produto" autocomplete="off">
                            </div>
                        </div>
                        <div class="conter-1">
                            <div class="col-1">
                                <p>Quantidade Transferida</p>
                                <input type="text" name="Qtd_tras" id="Qtd_tras" readonly="readonly" placeholder="Quantidade" require autocomplete="OFF">
                            </div>
                            <div class="col-1">
                                <p>Empresa Recebeu</p>
                                <input type="text" name="empresa4" id="empresa4" readonly="readonly" placeholder="empresa" require autocomplete="OFF">
                            </div>
                        </div>


                        <div class="enviar">

                            <input type="submit" name="Confirmar" id="Confirmar" value="Confirmar" />
                            <input type="submit" name="Excluir" id="Excluir" value="Excluir" />

                        </div>
                    </form>
                </div>
                <!--container bg-->
        </section>
    </div>
    <!--cover-form-->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/confirma_trasferencia.js"></script>
</body>

</html>