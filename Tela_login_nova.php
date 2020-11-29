<?php
	//Inicializado primeira a sessão para posteriormente recuperar valores das variáveis globais. 
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/css_tela_login_nova.css">
</head>


<body> 
<main>

<div class="login-page">
  <div class="form">
  <h2> Entrar</h2><!--fecha h2-->
    <form class="login-form" method="POST" action="back_end/login.php">
      <input type="text" name="usuario" id="usuario" required placeholder="Usuario"/>
      <input type="password" name="senha" id="senha" placeholder="Senha"/>
      <button type="submit" name="acao" id="enviar" value="Enviar">login</button>
      <section class="Erro">
       <div class="center">
       <p>
            <?php 
			//Recuperando o valor da variável global, os erro de login.
			if(isset($_SESSION['loginErro'])){
                echo $_SESSION['loginErro'];
                unset($_SESSION['loginErro']);
            }?>
            </p>
            <p>
                <?php 
                //Recuperando o valor da variável global, deslogado com sucesso.
                if(isset($_SESSION['logindeslogado'])){
                    echo $_SESSION['logindeslogado'];
                    unset($_SESSION['logindeslogado']);
                }
                ?>
            </p>
        </div><!--center-->
</section>
    </form>
  </div>
</div>

</main>  

</body>
</html>