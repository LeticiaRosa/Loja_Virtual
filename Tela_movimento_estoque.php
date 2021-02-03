  <!DOCTYPE html>
  <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
      <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css" />
      <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
      <link rel="stylesheet" type="text/css" href="css/css_listar_empresa.css">
      <link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.ico">

      <title>Controle de Estoque</title>
  </head>
  <html>
  <body>
      <?php
        include_once("menu.php");
        ?>
       
 <div class="center" >
    <section class="cover-form">
        <div class="form-container">
                  <h1>Movimento de Estoque</h1>
                <input type="text" name="empresa_usuario" id="empresa_usuario"  class="sumir_sempre" value="<?php echo $_SESSION['empresausuario'] ?>" readonly="readonly" autocomplete="off">
                <div class="form-wraper-1">
                 
                             <table id="products-table" class="teste1">

                                  <thead class="cabeça">
                                      <tr>
                                          <th>Data Movimento</th>
                                          <th>Id Produto</th>
                                          <th>Nome Produto</th>
                                          <th>Quantidade</th>
                                          <th>Tipo Movimento</th>
                                          <th>Origem</th>
                                      </tr>
                                  </thead>

                                  <tbody id="visualizarDados" >

                                  </tbody>

                            </table>
                     
                </div>
         </div>
    </section>   
</div>
      
      <script type="text/javascript" src="js/jquery.js"></script>
      <script type="text/javascript" src="js/jquery-ui.min.js"></script>
      <script type="text/javascript" src="js/listar_movimento.js"></script>
      <script type="text/javascript" src="DataTables/datatables.min.js"></script>
  </body>




  </html>