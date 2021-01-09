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
            <h1>CAIXA</h1>
            <div class="form-wraper">

                <div class="col">
                    <p>Codigo De Barras *</p>
                    <input type="text" name="codigo" id="codigo" required placeholder="codigo" autocomplete="off" onchange="busca_produto();">
                </div>
            </div>
            <div class="form-wraper">
            
                <div class="conter">
                    <div class="col">
                        <p>Produto *</p>
                        <input type="text" name="produto" id="produto" required placeholder="produto" autocomplete="off">
                    </div>
                    <div class="col">
                        <p>Vendedor</p>
                        <input type="text" name="Vendedor" id="Vendedor" placeholder="Vendedor" autocomplete="off">
                    </div>
                    <div class="col">
                        <p>Nome Cliente</p>
                        <input type="text" name="cliente" id="cliente" placeholder="cliente" autocomplete="off">

                    </div>

                </div>
                <div class="tabela-container">
                <div class= "corpao">
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

                        </tbody>
                       
                    </table>
                    </div>
                    <div class="form-wraper1">
                        
                        <div class="col1">
                            <p>Total De itens</p>
                            <input type="text" name="itens" id="itens" autocomplete="off">
                        </div>
                        <div class="col2">
                            <p>Total Venda</p>
                            <input type="text" name="venda" id="venda"  autocomplete="off">
                        </div>
                    </div>
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