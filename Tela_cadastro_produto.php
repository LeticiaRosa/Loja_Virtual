<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <link href="bootstrap-4.0.0-dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
<script src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
<script src="bootstrap-4.5.3-dist/jquery-1.11.1.min.js"></script>
    <title>Menu</title>
    <meta charset="utf-8"/>
    <meta name= "viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel= "stylesheet" type="text/css" href="css/css_tela_cadastro_produto.css">
</head>

<body> 

<div class="menu-container"> <!--menu-->
    <ul class="menu clearfix">
      <li> 
        <label id="icone" for="check"><img src="imagens/icons8_menu_50px.png" width="35" height="35"> </label> 
        <ul class="sub-menu clearfix">
          <li>
            <a href="#">Produto</a>
            <ul class="sub-menu">
              <li><a href="#">Cadastro de Produto</a></li>
              <li><a href="#">Cadastro de Categoria</a></li>
              <li><a href="#">Sub Sub</a></li>
            </ul>
          </li>
          <li><a href="#">Fornecedor</a>
            <ul class="sub-menu">
                <li><a href="#">Cadastro de Fornecedor</a></li>
                <li><a href="#">Sub Sub</a></li>
            </ul>
        </li>
        <li><a href="#">Estoque</a>
            <ul class="sub-menu">
                <li><a href="#">Controle de Estoque</a></li>
                <li><a href="#">Sub Sub</a></li>
            </ul>
        </li>
        <li><a href="#">Relatórios</a>
          <ul class="sub-menu">
              
          </ul>
      </li>

      <li><a href="#">Usuário</a>
        <ul class="sub-menu">
          <li><a href="#">Cadastro</a></li>
          <li><a href="#">Permissões</a></li>
          <li><a href="#">LOG</a></li>
        </ul>
    </li>
    <li><a href="#">Ferramentas</a>
      <ul class="sub-menu">
        <li><a href="#">Calculadora</a></li>
      </ul>
  </li>

        </ul>
      </li>
    <li>
      
      <li class = "sair" ><a href="/Loja_Virtual/Tela_login.php">Sair</a></li>
      <li class = "ajuda"><a href="#">Ajuda</a></li>
      <li class = "configurações"><a href="#">Configurações</a></li>
      <li class = "welcome"><a href="#">Bem vindo! <?php echo $_SESSION['login']; ?> </a> </li>
      
    </li>
    
    
    </ul>
    <div class="clear"></div>
</div> <!--menu-->
 


  

<div class="center">
  <div class="row justify-content-md-center">
  <h1> <p> Cadastro de Produtos </p></h1>

<form class="form col-md-10">
  <div class="form-row col-md-10">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Senha</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="Senha">
    </div>
    <div class="form-group col-md-4">
      <label for="inputCity">Cidade</label>
      <input type="text" class="form-control" id="inputCity">
    </div>
  </div>
  <div class="form-group col-md-10">
    <label for="inputAddress">Endereço</label>
    <input type="text" class="form-control" id="inputAddress" placeholder="Rua dos Bobos, nº 0">
  </div>
  <div class="form-group col-md-10">
    <label for="inputAddress2">Endereço 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartamento, hotel, casa, etc.">
  </div>
  <div class="form-row col-md-10">
   
    <div class="form-group col-md-4">
      <label for="inputEstado">Estado</label>
      <select id="inputEstado" class="form-control">
        <option selected>Escolher...</option>
        <option>...</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputCEP">CEP</label>
      <input type="text" class="form-control" id="inputCEP">
    </div>
  </div>
  <div class="form-group col-md-10">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Clique em mim
      </label>
    </div>
  </div>
  <div class="form-group col-md-10">
  <button type="submit" class="btn btn-primary">Entrar</button>
  </div>
</form>

<div class="center">
</body>
</html>    