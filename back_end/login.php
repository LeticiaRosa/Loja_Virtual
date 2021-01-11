<?php
    session_start(); 
        //Incluindo a conexão com banco de dados   
        
    include_once("conexao.php");    
    //O campo usuário e senha preenchido entra no if para validar
    if((isset($_POST['usuario'])) && (isset($_POST['senha']))){
        $usuario = mysqli_real_escape_string($conexao,$_POST ['usuario']);
        $senha = mysqli_real_escape_string($conexao,$_POST ['senha']);
        $senha = md5($senha);
            
        //Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
        $result_usuario = "SELECT * FROM USUARIO WHERE LOGIN = '{$usuario}' and senha = '{$senha}' LIMIT 1";
        $resultado_usuario = mysqli_query($conexao, $result_usuario);
        $resultado = mysqli_fetch_assoc($resultado_usuario);
        
        //Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
        if(isset($resultado)){
            $_SESSION['usuarioId'] = $resultado['id_usuario'];
            $_SESSION['empresausuario'] = $resultado['id_empresa'];
            $_SESSION['usuarioNome'] = $resultado['nome_usuario'];
            $_SESSION['login'] = $resultado['login'];
            header("Location:/loja_virtual/Tela_inicial_1.php");
            
        //Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
        //redireciona o usuario para a página de login
        }else{    
            //Váriavel global recebendo a mensagem de erro
            $_SESSION['loginErro'] = "Usuário ou senha Inválido";
            header("Location:/loja_virtual/Tela_login_nova.php");
        }
    //O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
    }else{
        $_SESSION['loginErro'] = "Usuário ou senha inválido";
        header("Location: Location:/loja_virtual/Tela_login_nova.php");
    }
mysqli_close($conexao);
  
?>