<!DOCTYPE html>

    <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/cadastro.css">   
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">      
    <link rel="stylesheet" type="text/css" href="css/css_codigo_barras.css">
    <title>Gerar Codigo De Barras</title>
    </head>
    <body>

    <?php 

   include_once("menu.php"); 


?>
        <nav class="menu" id="menu">
            <h1>Gerador De Codigos</h1>
               <div class="corpo">
           
                <div class="campos">
                     <div class="col">
                        <p>ID_PRODUTO:</p>
                         <input  type="text" name="Id" id="Id" autocomplete="off" >
                    </div>

                    <div class="col">
                        <p>PRODUTO:</p>
                        <input  type="text" name="produto" id="produto" autocomplete="off" >
                    </div>

                    <div class="col">
                        <p>VALOR_PRODUTO:</p>
                        <input  type="text" name="valor_produto" id="nome" autocomplete="off" >
                    </div>
                </div>
        </div>
       
        <div class="cod_barra" id="barcodeDiv">
                
            </div>


            
        </nav>
        
        
        <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="js/bytescoutbarcode128_1.00.07.js"></script>
  <script type="text/javascript" src="js/gerador.js"></script>
           
        </script>
    </body>
</html>