<?php
	//Inicializado primeira a sessão para posteriormente recuperar valores das variáveis globais. 
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<html>
    <body> 
    <main >
        <div class="center">
            <div class="form">
                <h2> Entrar</h2><!--fecha h2-->
                
                <form method="POST" action="back_end/login.php">
                        <div class="input-cont">
                            
                            <input type="text" name="usuario" id="usuario" required placeholder="Usuario"/> 
                        </div><!-- fecha input-cont-->

                        <div class="input-cont">
                            <input type="password" name="senha" id="senha" placeholder="Senha"/> 
                        </div><!-- fecha input-cont-->

                        <div class="input-submit">
                            <input type="submit" name="acao" id="enviar" value="Enviar">
                        </div><!--input-submit-->
                </form><!-- fecha form-->
                
            </div><!--bg1-->
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
</main>  

    </body>
</html>