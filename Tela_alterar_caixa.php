<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/css_editar_empresa.css">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.ico">
    <title>Editar Caixas</title>
</head>
<html>

<body>
<?php
    include_once("menu.php");
    ?>

    <div class="center">
        <section class="cover-form">
            <div class="form-container">
                <h1>Editar Caixas</h1>
                <form method="POST" name="form" action="back_end/Cadastro_caixa.php">
                <div class="form-wraper">
                        <div class="col2">
                            <p> Id Caixa* </p>
                            <input type="text" name="id_caixa-1" id="id_caixa-1" readonly="readonly"  autocomplete="off">
                        </div>

                </div>
                <div class="form-wraper">
                        <div class="col">
                            <p>Nome Caixa* </p>
                            <input type="text" name="nome_caixa" id="nome_caixa" placeholder="Nome Caixa" autocomplete="off" maxlength="15">
                        </div>
                        <div class="col-1">
                            <p>Status</p>
                            <select name="status" id="status" placeholder="Status">
                                <option value="Ativo" id="S">Ativo</option>
                                <option value="Inativo" id="N">Inativo</option>
                            </select>
                        </div>
                        <div class="col">
                            <p>Nome Empresa*</p>
                            <input type="text" name="empresa1" id="empresa1" readonly="readonly" placeholder="Empresa" autocomplete="off">
                        </div>
                        <div class="col">
                            <p>Máquina</p>
                            <input type="text" name="maquina" id="maquina" readonly="readonly" placeholder="Maquina" autocomplete="off">
                        </div>

                    </div>
                       <div class="form-wraper">
                        <div class="col">
                            <p>Status Caixa  </p>
                            <input type="text" name="status_caixa" id="status_caixa" readonly="readonly" autocomplete="off">
                        </div>

                        <div class="col">
                            <p>Usuario abertura</p>
                            <input type="text" name="usuario_abertura" id="usuario_abertura" readonly="readonly" autocomplete="off" >
                        </div>

                        
                        <div class="col">
                            <p>Data abertura </p>
                            <input type="text" name="data_abertura" id="data_abertura" readonly="readonly" autocomplete="off">
                        </div>

                        <div class="col">
                            <p>Usuário Fechamento</p>
                            <input type="text" name="usuario_fechamento" id="usuario_fechamento" readonly="readonly" autocomplete="off" >
                        </div>
                        
                        <div class="col">
                            <p>Data fechamento</p>
                            <input type="text" name="data_fechamento" id="data_fechamento" readonly="readonly" autocomplete="off" >
                        </div>
                    </div>
                    <div class="enviar-1">          
                        <input type="submit" name="Salvar-1" id="Salvar-1" value="Salvar" />
                        </div>



                      
                </form>
                <div class="teste3">
                            <img src="imagens/icons8_ok_48px.png"></img>
                </div>
            </div>
        </section>
    </div>
    
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>

</body>

</html>