<?php
session_start();
  
  
if (empty ($_SESSION['login'])) {
  header('Location:/Loja_Virtual/Tela_login_nova.php');

  exit();

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/css_menu.css">
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
              <li><a href="/loja_virtual/Tela_cadastro_produto_1.php">Cadastro de Produto</a></li>
              <li><a href="/loja_virtual/Cadastro_categoria.php">Cadastro de Categoria</a></li>
              <li><a href="/loja_virtual/Cadastro_Sub_Categoria.php">Cadastro de Sub Categoria</a></li>
              <li><a href="/loja_virtual/Gera_codigo_barra.php">Gerar codigo de barras</a></li>
              <li><a href="/loja_virtual/Tela_visualizar_produto.php">Exibir</a></li>

            </ul>
          </li>
          <li><a href="#">Fornecedor</a>
            <ul class="sub-menu">
                <li><a href="/loja_virtual/Cadastro_fornecedor.php">Cadastro de Fornecedor</a></li>
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
      
      <li class = "sair"  ><a href="/loja_virtual/Tela_login_nova.php">Sair  </a></li>
      <li class = "ajuda"><a href="#">Ajuda</a></li>
      <li class = "configurações"><a href="#">Configurações</a>
      <ul class="sub-menu">
                <li><a href="#">Meu perfil</a></li>
                <li><a href="#">Configurações</a></li>
                <li><a href="#">Sobre</a></li>
            </ul>
      </li>
      <li class = "welcome"><a href="#">Bem vindo! <?php echo $_SESSION['login']; ?> </a> </li>
      
    </li>
    
 
    </ul>
    
</div> <!--menu-->

      
       
        
</body>
</html>    