<?php

session_start();
require_once ("conexao.php");
$recebe = $_POST['dados'];

$data = json_decode($recebe);

$id_usuario=$_SESSION['usuarioId'];

foreach ($data as $key => $value) {
    $id[] =$value->id_produto;
    $quant[] =$value->quantidade;
    $tipo_movimento[] = $value->tipo_movimento;
};


for($i=0;$i<count($id);$i++){
    $id_produto=$id[$i];
    $quantidade=$quant[$i];
    $tipo_mov=$tipo_movimento[$i];
    
    $INSERT_MOVIMENTO = "INSERT INTO CONTRO_ESTOQUE( ID_PRODUTO, QTD, TIPO_MOVIMENTO,origem, DATA_MOVIMENTO, ID_USUARIO, DATA_CADASTRO) VALUES ('$id_produto', '$quantidade', '$tipo_mov','Estoque', CURDATE(), '$id_usuario' , now()  )";
    $resultado=$resultado+mysqli_query($conexao, $INSERT_MOVIMENTO); 
  
    if ($tipo_mov == 'Entrada'){
    $update_produto="update produto set quantidade = quantidade + '$quantidade' where id_produto='$id_produto'";
    $resultado=$resultado+mysqli_query($conexao, $update_produto);
    }else{
        $update_produto="update produto set quantidade = quantidade - '$quantidade' where id_produto='$id_produto'";
        $resultado=$resultado+mysqli_query($conexao, $update_produto);
    }   
};

if($resultado>1){
    $_SESSION['sucesso_cadastro'] = "Movimento finalizado com sucesso!";
    header("Location:/loja_virtual/Tela_controle_estoque.php");
    mysqli_close($conexao);
 } else {
    $_SESSION['erro_cadastro'] = "Ocorreu um erro!";
    mysqli_close($conexao);
 } ;

 
 $json = json_encode($INSERT_MOVIMENTO);
 echo  $json ;

?> 