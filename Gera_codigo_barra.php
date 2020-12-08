<!DOCTYPE html>
<html lang="en" id="teste">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Starter Template for Bootstrap</title>
        <!-- Bootstrap core CSS -->
        <link href="http://leandrolisura.com.br/wp-content/uploads/2017/11/bootstrap.min_.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="http://leandrolisura.com.br/wp-content/uploads/2017/12/starter-template.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/css_codigo_barras.css">
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top" id="navbar">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Leandro Lisura</a>
                </div>
                <!--/.nav-collapse -->
            </div>
        </nav>
        <div class="container">
            <div class="screen" id="screen">
                <div>
                    <div class="starter-template">
                        <h1>Gerando codigo de barras por intervalo.</h1>
                        <p class="lead">
                            Gerar de: <input type="number" name="begin" id="number_begin" /> até:
                            <input type="number" name="end" id="number_end" />
                            <button id="button_generate">Gerar codigos de barras</button>
                        </p>
                    </div>
                </div>
            </div>
             
            
            
            <div class="cod_barra" id="barcodeDiv">
                
            </div>




        </div>
        <!-- /.container -->
        <!-- Bootstrap core JavaScript -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/valida_lista.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="js/bytescoutbarcode128_1.00.07.js"></script>
  <script type="text/javascript" src="js/gerador.js"></script>
           
        </script>
    </body>
</html>