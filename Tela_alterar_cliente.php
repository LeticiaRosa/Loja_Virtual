<!DOCTYPE html>

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/css_editar_empresa.css">
    <title>Editar Empresa</title>
</head>

<body>

<section class="cover-form">
    <div><a href="Tela_listar_clientes.php" title="Close" class="close">X</a>
        <div class="form-container">
            <h1>Editar Cliente</h1>
            <form method="POST" name="form" action="back_end/cliente.php">
            <div class="form-wraper">
                 <div class="col" style="  width: 25%; ">
                <p>ID_Produto</p>
                <input type="text" name="id" id="id" value="<?php $id = $_GET['id'];
                                                            echo $id; ?>" placeholder="id" autocomplete="off">
                </div>
                <div class="col">
                    <p>Nome*</p>
                    <input type="text" name="nome" id="nome" required placeholder="Nome" autocomplete="off">
                </div>
                <div class="col">
                    <p>CPF*</p>
                    <input type="text" name="cpf" id="cpf" required placeholder="cpf" autocomplete="off">
                </div>
                <div class="col">
                    <p>E-MAIL:</p>
                    <input type="email" name="E-MAIL" id="E-MAIL" placeholder="E-mail" autocomplete="off">
                </div>
                </div>
                <div class="form-wraper">
                <div class="col">
                    <p>Telefone Fixo:</p>
                    <input type="text" name="fixo" id="fixo" placeholder="Telefone" autocomplete="off">
                </div>
                <div class="col">
                    <p>Telefone celular:</p>
                    <input type="text" name="celular" id="celular" placeholder="Telefone" autocomplete="off">
                </div>
                </div>
                <div class="form-wraper">
                <div class="col">
                    <p>Endereço:</p>
                    <input type="text" name="endereco" id="endereco" placeholder="Endereço" autocomplete="off">
                </div>
                <div class="col">
                    <p>CEP:</p>
                    <input type="text" name="CEP" id="CEP" placeholder="CEP" autocomplete="off">
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
    <script type="text/javascript" src="js/auto_complete.js"></script>
    



</body>

</html>