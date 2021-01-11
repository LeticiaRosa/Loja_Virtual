<!DOCTYPE html>

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/css_usuario.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">

    <title>Cadastro De Usuario</title>
</head>

<body>

    <?php
    include_once("menu.php");
    ?>
    <section class="cover-form">
        <div class="form-container">
            <h1>Cadastro de Usuario</h1>
            <form method="POST" name="form" action="back_end/usuario.php">
                <div class="form-wraper">

                    <div class="col">
                        <p>Nome Usuario*</p>
                        <input type="text" name="nome" id="nome" required placeholder="Nome" autocomplete="off">
                    </div>
                    <div class="col">
                        <p>Login*</p>
                        <input type="text" name="Login" id="Login" required placeholder="Login" autocomplete="off">
                    </div>
                    <div class="col">
                        <p>Senha*:</p>

                        <input type="password" name="Senha" id="Senha" required placeholder="Senha" autocomplete="off">

                    </div>
                    <div class="olho" id="olho">
                        <img src="https://cdn0.iconfinder.com/data/icons/ui-icons-pack/100/ui-icon-pack-14-512.png" id="v" class="v">
                    </div>
                    <div class="limpa"></div>

                </div>
                <div class="form-wraper">

                    <div class="col">
                        <p>Empresa</p>
                        <input type="text" name="Empresa" id="Empresa" required placeholder="Empresa" autocomplete="off">
                    </div>
                    <div class="col-1">
                        <p>Permissões:</p>
                        <select name="permissao" id="permissao" placeholder="permissao de Medida">
                            <option selected disabled value="">Selecione</option>
                            <option value="Administrador">Administrador</option>
                            <option value="Estoque_caixa">Estoque e Caixa</option>
                            <option value="Caixa">Caixa</option>
                            <option value="">Nenhum</option>
                        </select>
                    </div>

                </div>


                <!---
                <div class="form-wraper">
                    <div class="col">
                        <p>Observação:</p>
                        <input type="text" name="observacao" id="observacao" placeholder="Observação" autocomplete="off">
                    </div>

                </div> -->

                <div class="enviar">

                    <input type="submit" name="acao" id="clicar" value="Cadastrar" />

                </div>

            </form>

        </div>
        <!--container bg-->
    </section>
    <!--cover-form-->
    <div class="pega">
        <input id="pega" type="text" value="<?php if (isset($_SESSION['sucesso_cadastro'])) {
                                          echo $_SESSION['sucesso_cadastro'];
                                        }else if (isset($_SESSION['erro_cadastro'])) {
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
    <script type="text/javascript" src="js/usuario.js"></script>
    <script type="text/javascript" src="js/modal.js"></script>


</body>

</html>