<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="css/css_editar_user.css">
    <link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.ico">
    <title>Editar Usuário</title>
</head>

<body>
    <div class="center">
        <section class="cover-form">
            <div><a href="Tela_listar_usuario.php" title="Close" class="close">X</a></div>
            <div class="form-container" id="modal">
                <h1>Editar de Usuário</h1>
                <form method="POST" name="form" action="back_end/usuario.php">
                    <div class="form-wraper">
                        <div class="col" style="  width: 25%; ">
                            <p>ID_Usuario</p>
                            <input type="text" name="id" id="id" value="<?php $id = $_GET['id'];
                                                                        echo $id; ?>" placeholder="id" autocomplete="off" readonly="readonly">
                        </div>
                        <div class="col">
                            <p>Nome Usuário*</p>
                            <input type="text" name="nome" id="nome" required placeholder="Nome" autocomplete="off">
                        </div>
                        <div class="col">
                            <p>Login*</p>
                            <input type="text" name="Login" id="Login" required placeholder="Login" autocomplete="off">
                        </div>
                        <div class="col">
                            <p>Senha*:</p>

                            <input type="password" name="Senha" id="Senha" placeholder="Senha" autocomplete="off">

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
                    <div class="enviar">

                        <input type="submit" name="salvar" id="salvar" value="Salvar" />
                        <input type="submit" name="excluir" id="excluir" value="excluir" />

                    </div>

                </form>

            </div>
            <!--container bg-->
        </section>
    </div>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/usuario.js"></script>

</body>

</html>