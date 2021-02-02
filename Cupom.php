<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="css/css_caixa.css">
    <link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.ico">

    <title>Cupom Fisacal</title>
</head>

<body>
    <div class="center-90">
        <section class="cover-form-90">
            <div class="form-container-90">
                <h1>CUPOM NÃO FISCAL </h1>
                <div class="form-wraper-90">
                    <div class="col-90">
                        <p id="empresa-90"></p>
                        <p id="endereco-90"></p>
                        <p id="CNPJ-90">CNPJ:</p>

                    </div>

                    <div class="uf">
                        <p id="uf">UF:MG</p>
                    </div>
                </div>
                <div class="form-wraper-90">
                    <div class="col-90">
                        <div class="Tabela-90">
                            <table id="products-table-90" class="tabela-90">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Qtd</th>
                                        <th>Valor</th>
                                        <th>Valor Total</th>
                                    </tr>
                                </thead>
                                <tbody id="linhas">

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

                <div class="form-wraper-90">
                    <div class="col-90">
                        <p id="Forma_pagamento">Tipo_pagamento:</p>
                        <p id="Parcelas" >Qtd_parcelas:</p>
                        <p id="Valor" >Sub Total:</p>
                        <p id="Desconto" >Valor Desconto:</p>
                        <p id="Valor_venda">Valor Total:</p>
                    </div>

                </div>

            </div>

        </section>

    </div>
    <input type="button" id="btn" onclick="window.print()" value="Imprimir" />


</body>

</html>