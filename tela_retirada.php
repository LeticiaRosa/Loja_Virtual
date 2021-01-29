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
<div class="center">
    <section class="cover-form">
      <div class="form-container">
        <a href="#close" title="Close" class="close">X</a>
          <form method="POST" name="form" action="back_end/retirada_caixa.php">
                  <h1>Fazer retirada</h1>
                    <div class="form-wraper">
                      <div class="col">
                          <p> Valor da retirada: *</p>
                          <input type="text" name="Valor" id="Valor" required placeholder="Valor" autocomplete="off" maxlength="5">
                      </div>
                     
                    </div>
                    <div class="form-wraper">
                    <div class="col">
                          <p> Quem está retirando: *</p>
                          <input type="text" name="nome" id="nome" placeholder="Nome" maxlength="30">
                      </div>
                    </div>
                    <div class="form-wraper">
                        <div class="col">
                            <p>Observação:</p>
                            <input type="text" name="observacao" id="observacao" placeholder="Observação" autocomplete="off" maxlength="100">
                        </div>
                    </div>
                    
                      <div class="enviar">
                          <input type="submit" name="Retirar" id="Retirar" value="Retirar" />
                          <input type="button" name="Cancelar" id="Cancelar" value="Cancelar" onclick="fechamdal()">                
          </form>  
     </div>   
    </section>
</div>
    <script type="text/javascript" src="js/jquery.js"></script> 
    <script type="text/javascript" src="js/jquery-ui.min.js"></script> 
  
</body>
</html>


