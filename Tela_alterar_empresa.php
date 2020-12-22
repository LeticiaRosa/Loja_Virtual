<!DOCTYPE html>

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/css_editar_empresa.css">
    <title>Editar Empresa</title>
</head>

<body>

    <?php
    include_once("menu.php");
    ?>
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
                        <input type="text" name="nome" id="nome" required placeholder="Nome" autocomplete="off">
                    </div>
                    <div class="col">
                        <p>Razao Social</p>
                        <input type="text" name="Razao_Social" id="Razao_Social" placeholder="Razao Social" autocomplete="off">
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
                        <input type="text" name="descricao" id="descricao" autocomplete="off">
                    </div>
                </div>
                <div class="form-wraper">
                    <div class="col">
                        <p>CNPJ*:</p>
                        <input type="text" name="CNPJ" id="CNPJ" required placeholder="Cnpj" autocomplete="off">
                    </div>

                    <div class="col">
                        <p>Endereço:</p>
                        <input type="text" name="endereco" id="endereco" placeholder="Endereço" autocomplete="off">
                    </div>
                </div>

                
                    



                


                <div class="form-wraper">
                    <div class="col">
                        <p>Observação:</p>
                        <input type="text" name="observacao" id="observacao" placeholder="Observação" autocomplete="off">
                    </div>

                </div>

                <div class="enviar">

                    <input type="submit" name="Salvar" id="Salvar" value="Salvar" />
                    <input type="submit" name="Excluir" id="Excluir" value="Excluir" />

                </div>

            </form>

        </div>
        <!--container bg-->
    </section>
    <!--cover-form-->



    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    



</body>

</html>