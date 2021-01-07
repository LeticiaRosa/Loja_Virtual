<!DOCTYPE html>


<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="css/css_caixa.css">
    <title>Caixa</title>
</head>
<html>

<body>

    <?php
    include_once("menu.php");
    ?>
    <section class="cover-form">
        <div class="form-container">
            <h1>Cadastro de Produtos</h1>
            <div class="form-wraper">

                <div class="col">
                    <p>Codigo De Barras *</p>
                    <input type="text" name="codigo" id="codigo" required placeholder="codigo" autocomplete="off" onchange="busca_produto();">
                </div>
            </div>
            <div class="form-wraper">
            <div class="col">
                    <p>Total Venda</p>
                    <input type="text" name="venda" id="venda" required placeholder="Total" autocomplete="off" >
                </div>
                <div class="col">
                    <p>Total De itens</p>
                    <input type="text" name="itens" id="itens" required placeholder="Itens" autocomplete="off" >
                </div>
                <div class="col1 tabela-container">

                <table id="products-table" class="teste">
                    <thead class="cabeça">
                        <tr>
                            <th>Id</th>
                            <th>Nome do produto</th>
                            <th>Valor produto</th>
                            <th>Quantidade</th>

                        </tr>
                    </thead>
                    <tbody id="visualizarDados" class="teste">


                    </tbody>
                </table>
            </div>
            </div>
            <div class="form-wraper">

                <div class="enviar">

                    <input type="submit" name="Confirmar" id="Confirmar" value="Confirmar" />
                    <input type="submit" name="Excluir" id="Excluir" value="Excluir" />

                </div>
            </div>
    </section>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/produto_caixa.js"></script>
</body>

</html>