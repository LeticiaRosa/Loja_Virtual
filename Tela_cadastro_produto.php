<?php
session_start();
?>
<link href="bootstrap-4.0.0-dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="bootstrap-4.0.0-dist/js/bootstrap.min.js"></script>
<script src="bootstrap-4.5.3-dist/jquery-1.11.1.min.js"></script>
<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/css_tela_inicial.css">
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
    
</div> <!--menu-->

      

<div>
<form class="form-horizontal">

<div class="panel panel-primary">
    <div class="panel-heading">Cadastro de Produto</div>
    
<div class="panel-body">
<div class="form-group">
<div class="col-md-11 control-label">
        <p class="help-block"><h11>*</h11> Campo Obrigatório </p>
</div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-2 control-label" for="Nome">Descrição <h11>*</h11></label>  
  <div class="col-md-5">
  <input id="Nome" name="Nome" placeholder="" class="form-control input-md" required="" type="text">
  </div>
  
  <label class="col-md-2 control-label" for="Nome">Data do Cadastro<h11>*</h11></label>  
  <div class="col-md-2">
  <input id="dtnasc" name="dtnasc" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="text" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
  </div>
</div>


<div class="form-group">
  <label class="col-md-2 control-label" for="prependedtext">Email <h11>*</h11></label>
  <div class="col-md-5">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
      <input id="prependedtext" name="prependedtext" class="form-control" placeholder="email@email.com" required="" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" >
    </div>
  </div>
</div>

</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-2 control-label" for="Cadastrar"></label>
  <div class="col-md-8">
    <button id="Cadastrar" name="Cadastrar" class="btn btn-success" type="Submit">Cadastrar</button>
    <button id="Cancelar" name="Cancelar" class="btn btn-danger" type="Reset">Cancelar</button>
  </div>
</div>

</div>
</div>


</form>


</div> 

</body>
</html>    