<?php
session_start();
require_once ("conexao.php");
if(isset($_POST['acao'])){
$nome = $_POST['nome'];
$descricao= $_POST['descricao'];
$observacao=$_POST['observacao'];
$id_usuario=$_SESSION['usuarioId'];

    $query_2 = "insert into CATEGORIA (nome, descricao,  observacao,id_usuario ,data_cadastro) values ('$nome', '$descricao','$observacao','$id_usuario', now())";
    ECHO $query_2;
    $produto= mysqli_query($conexao, $query_2);
     
    if($produto==1){
        $_SESSION['sucesso_cadastro'] = "Produto inserido com sucesso";

            
            header("Location:/loja_virtual/Cadastro_categoria.php");
        
    }else {
        $_SESSION['erro_cadastro'] = "Produto Não cadastrado";
        header("Location:/loja_virtual/Cadastro_categoria.php");
    }


}else {

    header("Location:/loja_virtual/Cadastro_categoria.php");
}
   



?>