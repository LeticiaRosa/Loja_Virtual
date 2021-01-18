<?php
session_start();


if (empty($_SESSION['login'])) {
  header('Location:/Loja_Virtual/Tela_login_nova.php');

  exit();
}
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="css/css_caixa.css">
    <link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.ico">
</head>
<html>

<body>
<div class="pega">
  <input id="id_empresa" type="text" value="<?php echo $_SESSION['empresausuario']?>">
          </div>
<div class="center">
    <section class="cover-form">
    <div><a href="#close" title="Close" class="close">X</a>
        <div class="form-container">
         

            <h1>Pesquisar Produtos</h1>

            <div class="form-wraper-1">
                <table id="products-table">
                    <thead class="cabeça">

                        <tr>
                            <th> Id <br /> </th>
                            <th> Nome <br /> </th>
                            <th class="sumir"> Descricao</th>
                            <th> Preço de Venda </th>
                            <th> Quantidade </th>
                            <th class="sumir1"> Marca</th>
                            <th class="sumir"> Unidade de Medida</th>
                            <th class="sumir"> Valor Medida </th>
                            <th> Codigo Barras </th>
                        </tr>
                    </thead>
                    <tbody id="visualizarDados-1">


                    </tbody>
                </table>
            </div>
        </div>
        <!--container bg-->
    </section>
</div>
    <!--cover-form-->

    <script type="text/javascript" src="js/jquery.js"></script> 
    <script type="text/javascript" src="js/jquery-ui.min.js"></script> 
    <script type="text/javascript" src="js/seleciona_linha_caixa.js"></script>
    <script type="text/javascript" src="DataTables/datatables.js"></script>

</body>

</html>