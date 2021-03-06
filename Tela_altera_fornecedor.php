<!DOCTYPE html>

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/css_editar_fornecedor.css">
    <link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.ico">
    <title>Editar Fornecedor</title>
</head>

<body>
    <div class="center">
        <section class="cover-form-1">
            <div class="form-container">
                <h1>Editar Fornecedor</h1>
                <form method="POST" name="form" action="back_end/fornecedor.php">
                    <div class="col3">
                        <div class="col">
                            <p>ID FORNECEDOR</p>
                            <input type="text" name="id_fornecedor" id="id_fornecedor" readonly="readonly" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-wraper">
                        <div class="col">
                            <p>Nome Fornecedor*</p>
                            <input type="text" name="nome" id="nome" required placeholder="Nome" autocomplete="off" maxlength="100" >
                        </div>
                        <div class="col">
                            <p>Razao Social</p>
                            <input type="text" name="Razao_Social" id="Razao_Social" placeholder="Razao Social" autocomplete="off" maxlength="100" >
                        </div>
                        <div class="col-1">
                            <p>Status:</p>
                            <select name="status" id="status" placeholder="Status">
                                <option value="S" id="S">Disponível</option>
                                <option value="N" id="N">Indisponível</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-wraper">
                        <div class="col">
                            <p>CNPJ*:</p>
                            <input type="text" name="CNPJ" id="CNPJ" required placeholder="Cnpj" autocomplete="off" maxlength="11">
                        </div>
                        <div class="col">
                            <p>Telefone Fixo:</p>
                            <input type="text" name="fixo" id="fixo" placeholder="Telefone" autocomplete="off" maxlength="15">
                        </div>
                        <div class="col">
                            <p>Telefone celular:</p>
                            <input type="text" name="celular" id="celular" class="celular" placeholder="Telefone" autocomplete="off" maxlength="15">
                        </div>

                    </div>
                    <div class="form-wraper">

                        <div class="col">
                            <p>Contato:</p>
                            <input type="text" name="Contato" id="Contato" placeholder="Nome Pessoa Referencia" autocomplete="off" maxlength="100">
                        </div>

                        <div class="col">
                            <p>E-MAIL:</p>
                            <input type="email" name="E-MAIL" id="E-MAIL" placeholder="E-mail" autocomplete="off" maxlength="100">
                        </div>
                    </div>
                    <div class="form-wraper">
                        <div class="col">
                            <p>Endereço:</p>
                            <input type="text" name="endereco" id="endereco" placeholder="Endereço" autocomplete="off" maxlength="100">
                        </div>
                        <div class="col">
                            <p>CEP:</p>
                            <input type="text" name="CEP" id="CEP" placeholder="CEP" autocomplete="off" maxlength="25">
                        </div>


                    </div>


                    <div class="form-wraper">
                        <div class="col">
                            <p>Observação:</p>
                            <input type="text" name="observacao" id="observacao" placeholder="Observação" autocomplete="off" maxlength="100">
                        </div>

                    </div>

                    <div class="enviar">

                        <input type="submit" name="Salvar" id="Salvar" value="Salvar" />
                        <input type="submit" name="Excluir" id="Excluir" value="Excluir" />

                    </div>

                    <div class="teste">
                            <img src="imagens/icons8_ok_48px.png"></img>
                        </div>

                        <div class="teste1">
                            <img src="imagens/icons8_cancel_48px.png"></img>
                        </div>

                </form>

            </div>
            <!--container bg-->
        </section>
        <!--cover-form-->
    </div>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
</body>

</html>