<!DOCTYPE html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/css_cadastro_categoria.css">
  <link rel="shortcut icon" type="image/x-icon" href="imagens/favicon.ico">
  <title>Cadastro</title>
</head>

<body>

  <?php
  include_once("menu.php");
  ?>
  <div class="center">
    <section class="cover-form">
      <div class="form-container">
        <h1>Editar Categoria</h1>
        <form method="POST" name="form" action="back_end/categorias.php">
          <div class="form-wraper">
            <div class="col3">
              <p>Id Do Produto</p>
              <input type="text" name="id_categoria" id="id_categoria" readonly="readonly">
            </div>
          </div>

          <div class="form-wraper">

            <div class="col">
              <p>Nome Categoria*</p>
              <input type="text" name="nome" id="nome" required placeholder="Nome" autocomplete="off">
            </div>
            <div class="col">
              <p>Descrição</p>
              <input type="text" name="descricao" id="descricao" placeholder="Descrição" autocomplete="off">
            </div>
            <div class="col-1">
              <p>Status:</p>
              <select name="status" id="status" placeholder="Status">
                <option value="S" id="S">Disponível</option>
                <option value="N" id="N">Indisponível</option>
              </select>
            </div>

          </div>



          <div class="form-wraper">
            <div class="col">
              <p>Observação:</p>
              <input type="text" name="observacao" id="observacao" placeholder="Observação" autocomplete="off">
            </div>

          </div>

          <div class="enviar">
            <input type="submit" name="salvar" id="salvar" value="Salvar" />
            <input type="submit" name="excluir" id="excluir" value="Excluir" />
          </div>


                        <div class="teste">
                            <img src="imagens/icons8_ok_48px.png"></img>
                        </div>

                        <div class="teste1">
                            <img src="imagens/icons8_cancel_48px.png"></img>
                        </div>
        </form>

      </div>
      <!--container bg-->
    </section>
    <!--cover-form-->
  </div>

  <script type="text/javascript" src="js/jquery.js"></script>

  <script type="text/javascript" src="js/jquery-ui.min.js"></script>


</body>

</html>