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


   
    <div class="center">
        <section class="cover-form-1">
            <div><a href="Tela_listar_clientes.php" title="Close" class="close">X</a>
                <div class="form-container">
                    <h1>Editar Cliente</h1>
                    <form method="POST" name="form" action="back_end/cliente.php">
                        <div class="form-wraper">
                            <div class="col" style="  width: 25%; ">
                                <p>ID_Produto</p>
                                <input type="text" name="id" id="id" value="<?php $id = $_GET['id'];
                                                                            echo $id; ?>" placeholder="id" autocomplete="off" readonly="readonly">
                            </div>
                            <div class="col">
                                <p>Nome*</p>
                                <input type="text" name="nome" id="nome" required placeholder="Nome" autocomplete="off" maxlength="100"  >
                            </div>
                            <div class="col">
                                <p>CPF*</p>
                                <input type="text" name="cpf" id="cpf" required placeholder="cpf" autocomplete="off" maxlength="11">
                            </div>
                            <div class="col">
                                <p>E-MAIL:</p>
                                <input type="email" name="E-MAIL" id="E-MAIL" placeholder="E-mail" autocomplete="off" maxlength="100">
                            </div>
                        </div>
                        <div class="form-wraper">
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

                            <input type="submit" name="Excluir" id="Excluir" value="Excluir">



                            <input type="submit" name="Salvar" id="Salvar" value="Salvar" />

                        </div>
                        <div class="teste">
                            <img src="imagens/icons8_ok_48px.png"></img>
                        </div>

                        <div class="teste1">
                            <img src="imagens/icons8_cancel_48px.png"></img>
                        </div>
                        <div class="limpa"></div>


                    </form>

                </div>
                <!--container bg-->
        </section>
        <!--cover-form-->
    </div>
   

    <script>
        var url = "js/Altera_cliente.js";
        $.getScript(url);
    </script>


</body>

</html>