<?php
session_start();


if (empty($_SESSION['login'])) {
  header('Location:/Loja_Virtual/Tela_login_nova.php');

  exit();
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Menu</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/css_menu.css">
</head>

<body onload = "pesquisaPermissoes(<?php echo $_SESSION['usuarioId']?>)">


  <div class="menu-container">
    <!--menu-->
    <ul class="menu clearfix">
      <li>
        <label id="icone" for="check"><img src="imagens/icons8_menu_50px.png" width="35" height="35"> </label>
        <ul class="sub-menu clearfix">
          <li id = "clientes" class = "clientes"><a href="#">Clientes</a>
            <ul class="sub-menu">
              <li><a href="/loja_virtual/Cadastro_clientes.php">Cadastro De Clientes</a>
                <ul class="sub-menu">
                  <li><a href="/loja_virtual/Tela_listar_clientes.php">Listar Clientes</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li id= "caixa" class= "caixa">
            <a href="#" > Caixa</a>
            <ul class="sub-menu">
              <li><a href="/loja_virtual/Tela_caixa.php">Caixa</a> </li>
            </ul>
          </li>
          <li id= "empresa" class= "empresa">
            <a href="#">Empresa</a>
            <ul class="sub-menu">
              <li><a href="/loja_virtual/Tela_cadastro_empresa.php">Cadastro de Empresa</a>
                <ul class="sub-menu">
                  <li><a href="/loja_virtual/Tela_listar_empresa.php">Listar Empresas</a></li>
                </ul>
              </li>
            </ul>
          </li>

          <li id= "produto" class= "produto">
            <a href="#">Produto</a>
            <ul class="sub-menu">
              <li><a href="/loja_virtual/Tela_cadastro_produto_1.php">Cadastro de Produto</a>
                <ul class="sub-menu">
                  <li><a href="/loja_virtual/Tela_visualizar_produto.php">Listar Produtos</a></li>
                </ul>

              </li>
              <li><a href="/loja_virtual/Cadastro_categoria.php">Cadastro de Categoria</a>
                <ul class="sub-menu">
                  <li><a href="/loja_virtual/Editar_categoria.php">Listar Categorias</a></li>

                </ul>
              </li>
              <li><a href="/loja_virtual/Cadastro_Sub_Categoria.php">Cadastro de Sub Categoria</a>
                <ul class="sub-menu">
                  <li><a href="/loja_virtual/Tela_listar_subcategoria.php">Listar Sub Categorias</a></li>
                </ul>
              </li>
             <!--- <li><a href="/loja_virtual/Gera_codigo_barra.php">Gerar codigo de barras</a></li> -->


            </ul>
          </li>
          <li id= "fornecedor" class = "fornecedor">
          <a href="#">Fornecedor</a>
            <ul class="sub-menu">
              <li><a href="/loja_virtual/Cadastro_fornecedor.php">Cadastro de Fornecedor</a>
                <ul class="sub-menu">
                  <li><a href="/loja_virtual/Tela_listar_fornecedor.php">Listar Fornecedores</a></li>
                </ul>
              </li>
              
            </ul>
          </li>
          <li id= "estoque" class= "estoque" ><a href="#">Estoque</a>
            <ul class="sub-menu">
              <li><a href="#">Controle de Estoque</a></li>
              <li><a href="/loja_virtual/tela_vizualizar_trasferencia.php">Transferência de Produtos</a>
              <ul class="sub-menu">
                  <li><a href="/loja_virtual/Tela_listar_trafere.php">Transferir Produtos</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li id= "relatorios" class= "relatorios"><a href="#">Relatórios</a>
            <ul class="sub-menu">

            </ul>
          </li>

          <li id= "usuario" class= "usuario" ><a href="#">Usuário</a>
            <ul class="sub-menu">
              <li><a href="/loja_virtual/Tela_cadastro_usuario.php">Cadastro</a>
              <ul  class="sub-menu">
              <li><a href="/loja_virtual/Tela_listar_usuario.php">Listar Usuarios</a>
              </ul>
            </li>
              <li><a href="#">Permissões</a></li>
              <li><a href="#">LOG</a></li>
            </ul>
          </li>
          <li id= "ferramentas" class= "ferramentas"><a href="#">Ferramentas</a>
            <ul class="sub-menu">
              <li><a href="#">Calculadora</a></li>
            </ul>
          </li>

        </ul>
      </li>
      <li>

      <li class="sair"><a href="/loja_virtual/Tela_login_nova.php">Sair </a></li>
      <li class="ajuda"><a href="#">Ajuda</a></li>
      <li class="configurações"><a href="#">Configurações</a>
        <ul class="sub-menu">
          <li><a href="#">Meu perfil</a></li>
          <li><a href="#">Configurações</a></li>
          <li><a href="#">Sobre</a></li>
        </ul>
      </li>
      <li class="welcome"><a href="#">Bem vindo! <?php echo $_SESSION['login']; ?> </a> </li>
      <li class="notificacao"><a href="#">Notificações</a>
        <span class="contador" id="contador"></span>
        <ul class="sub-menu" id="notifica">

        </ul>
      </li>
      </li>


    </ul>

  </div>
  <!--menu-->


  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="js/notificar.js"></script>

</body>

</html>