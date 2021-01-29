<!DOCTYPE html>

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/css_editar_empresa.css">
    <link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.ico">
    <title>Editar Empresa</title>
</head>

<body>

    <?php
    include_once("menu.php");
    ?>
    <div class="center">
        <section class="cover-form">
            <div class="form-container">
                <h1>Editar Empresa</h1>
                <form method="POST" name="form" action="back_end/Empresa.php">
                    <div class="col3">
                        <div class="col">
                            <p>ID EMPRESA</p>
                            <input type="text" name="id_empresa" id="id_empresa" readonly="readonly" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-wraper">
                        <div class="col">
                            <p>Nome Empresa*</p>
                            <input type="text" name="nome" id="nome" required placeholder="Nome" autocomplete="off" maxlength="30">
                        </div>
                        <div class="col">
                            <p>Razao Social</p>
                            <input type="text" name="Razao_Social" id="Razao_Social" placeholder="Razao Social" autocomplete="off" maxlength="30">
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
                            <p>Descrição*:</p>
                            <input type="text" name="descricao" id="descricao" autocomplete="off" maxlength="100">
                        </div>
                    </div>
                    <div class="form-wraper">
                        <div class="col">
                            <p>CNPJ*:</p>
                            <input type="text" name="CNPJ" id="CNPJ" required placeholder="Cnpj" autocomplete="off" maxlength="11">
                        </div>

                        <div class="col">
                            <p>Endereço:</p>
                            <input type="text" name="endereco" id="endereco" placeholder="Endereço" autocomplete="off" maxlength="100">
                        </div>
                    </div>









                    <div class="form-wraper">
                        <div class="col">
                            <p>Observação:</p>
                            <input type="text" name="observacao" id="observacao" placeholder="Observação" autocomplete="off">
                        </div>

                    </div>

                    <div class="enviar">

                        <input type="submit" name="Excluir" id="Excluir" value="Excluir" />
                        
                        <input type="submit" name="Salvar" id="Salvar" value="Salvar" />

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