<?php
session_start();
include ('conexap.php');
$usuario = mysqli_real_escape_string($conexo,$_POST ['usuario']);
$senha = mysqli_real_escape_string($conexo,$_POST ['senha']);
   
        $verifica = " SELECT * FROM USUARIO WHERE LOGIN = '{$usuario}' AND SENHA = md5('{$senha}')";
        $resultado = mysqli_query ($conexo,$verifica);

        if(mysqli_num_rows($resultado) <= 0){
            echo "Usuario não existe";
        }else{
            $_SESSION['usuario']=$usuario;
            header("Location:/Loja_Virtual/Tela_inicial.php");
        }
 
?>