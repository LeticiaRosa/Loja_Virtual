<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/css_trasferir_estoque.css">
    <title>Transferencia</title>
</head>

<body >

    <section class="cover-form">
    <div><a href="Tela_listar_trafere.php" title="Close" class="close">X</a>
        <div class="form-container">
            <h1>Transferencia</h1>
            <form method="POST" name="form" action="back_end/trasferir.php">
            <div class="col3">
                    <div class="col">
                        <p>ID PRODUTO</p>
                        <input type="text" name="id_produto" id="id_produto" value="<?php $id = $_GET['id'];
                                                            echo $id; ?>" readonly="readonly" autocomplete="off">
                    </div>
                </div>
            <div class="form-wraper">

                    <div class="col">
                        <p>Nome da Empresa*</p>
                        <input type="text" name="nome" id="nome" readonly="readonly" placeholder="Empresa" autocomplete="off">
                    </div>
                    <div class="col">
                        <p>Nome do Produto</p>
                        <input type="text" name="produto2" id="produto2" readonly="readonly" placeholder="produto" autocomplete="off">
                    </div>
                    <div class="col">
                        <p>Quantidade</p>
                        <input type="text" name="Quantidade" id="Quantidade" readonly="readonly" placeholder="Quantidade" autocomplete="off">
                    </div>
                </div>
                <div class="conter-1">
                <div class="col-1">
                        <p>Quantidade que deseja Transferir:</p>
                        <input type="text" name="Qtd_tras" id="Qtd_tras"  placeholder="Quantidade"require autocomplete="OFF">
                    </div>
                    <div class="col-1">
                        <p>Empresa que deseja Trasferir:</p>
                        <input type="text" name="empresa3" id="empresa3"  placeholder="empresa"require autocomplete="OFF">
                    </div>
                </div>


                <div class="enviar">

                    <input type="submit" name="trasferir" id="trasferir" value="Trasferir" onclick=" return validar()" />

                </div>
            </form>
        </div>
        <!--container bg-->
    </section>
    <!--cover-form-->
    
    <div class="conteiner" id="conteiner">
        <div class="couver">
            <p class="texto"id="texto"></p>
            
            <input type="submit" value="OK" onclick="fechamodal()" /> 

        </div>
        </div>
    <script type="text/javascript" src="js/jquery.js"></script> 
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/lista_trasfere.js"></script>  
</body>

</html>