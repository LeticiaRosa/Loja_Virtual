<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/cadastro_caixa.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.ico">



</head>
<html>

<body>

    <?php
    include_once("menu.php");
    ?>
    <div class="center">
        <section class="cover-form">
            <div class="form-container">
                <h1>Cadastro de Caixa</h1>
                <form method="POST" name="form" action="back_end/Cadastro_caixa.php">
                    <div class="form-wraper">

                        <div class="col">
                            <p>Nome do Caixa *</p>
                            <input type="text" name="nome_caixa" id="nome_caixa" required placeholder="Nome do Caixa" autocomplete="off">
                        </div>

                        <div class="col">
                            <p>Empresa</p>
                            <input type="text" name="Empresa1" id="Empresa1" required placeholder="Empresa" autocomplete="off" >
                        </div>
                    </div>
                    <div class="form-wraper">
                        <div class="col">
                            <p>Nome da Máquina: </p>
                            <input type="text" name="maquina" id="maquina" readonly = "readonly"  value = "<?php echo gethostbyaddr($_SERVER['REMOTE_ADDR']); ?>" autocomplete="off">
                        </div>
                        <div class="col-1">
                            <p>Status: *</p>
                            <select name="status" id="status" placeholder="Status">
                            <option selected disabled value="">Selecione</option>
                            <option value="Inativo">Inativo</option>
                            <option value="Ativo">Ativo</option>
                            </select>
                        
                        </div>
                    </div>
                    <div class="form-wraper">
                        <div class="col">
                            <p>Observação</p>
                            <input type="text" name="Observacao" id="Observacao" placeholder="Observação" autocomplete="off">
                        </div>
                    </div>
                    <div class="enviar">
                        <input type="submit" name="acao" id="clicar" value="Cadastrar" />

                    </div>

                </form>
            </div>
        </section>
    </div>
    <div class="pega">
        <input id="pega" type="text" value="<?php if (isset($_SESSION['sucesso_cadastro'])) {
                                                echo $_SESSION['sucesso_cadastro'];
                                            } else if (isset($_SESSION['erro_cadastro'])) {
                                                echo $_SESSION['erro_cadastro'];
                                            } ?>">
    </div>
    <div class="conteiner" id="conteiner">
        <div class="couver">
            <p> <?php
                //Recuperando o valor da variável global, os erro de login.
                if (isset($_SESSION['sucesso_cadastro'])) {
                    echo $_SESSION['sucesso_cadastro'];
                    unset($_SESSION['sucesso_cadastro']);
                } ?>
            </p>
            <p> <?php
                //Recuperando o valor da variável global, deslogado com sucesso.
                if (isset($_SESSION['erro_cadastro'])) {
                    echo $_SESSION['erro_cadastro'];
                    unset($_SESSION['erro_cadastro']);
                }
                ?>
            </p>
            <input type="submit" value="OK" onclick="fechamodal()" /> </p>

        </div>
    </div>


    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/cadastrar_caixa.js"></script>
    <script type="text/javascript" src="js/modal.js"></script>

</body>

</html>