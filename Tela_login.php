<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

    <body> 
    <main>
       <!-- <div class="center">-->
            <div class="form">
                <h2> Entrar</h2><!--fecha h2-->
                
                <form method="POST" action="conexao.php">
                        <div class="input-cont">
                            
                            <input type="text" name="nome" required placeholder="Usuario"/> 
                        </div><!-- fecha input-cont-->

                        <div class="input-cont">
                            <input type="password" name="senha" placeholder="Senha"/> 
                        </div><!-- fecha input-cont-->

                        <div class="input-submit">
                            <input type="submit" name="acao" value="Enviar">
                        </div><!--input-submit-->
                    </form><!-- fecha form-->
                
            </div><!--bg1-->
       <!--</div>bg1--> 
</main>  

    </body>
</html>