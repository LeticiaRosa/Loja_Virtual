<?php
session_start();
require_once ("conexao.php");
if(isset($_POST['acao']))
{

    $nome = $_POST['nome'];
    $Razao_Social= $_POST['Razao_Social'];
    $cnpj=$_POST['CNPJ'];
    $fixo=$_POST['fixo'];
    $celular=$_POST['celular'];
    $Contato=$_POST['Contato'];
    $E_MAIL=$_POST['E-MAIL'];
    $endereco=$_POST['endereco'];
    $observacao=$_POST['observacao'];
    $id_usuario=$_SESSION['usuarioId'];

    $query_2 = "INSERT INTO FORNECEDOR(NOME,RAZAO_SOCIAL,CONTRATO,CNPJ,TEL_CEL,TEL_FIXO,ENDERECO,CEP,E_MAIL,ID_USUARIO,OBSERVACAO,DATA_CADASTRO)VALUES('$nome','$Razao_Social','$cnpj','$fixo','$celular','$Contato','$E_MAIL','$endereco','$observacao','$id_usuario', now())";
    ECHO $query_2;
    $produto= mysqli_query($conexao, $query_2);
    mysqli_close($conexao);

    if($produto==1){
        $_SESSION['sucesso_cadastro'] = "Produto inserido com sucesso";

            
            header("Location:/loja_virtual/Cadastro_fornecedor.php");
        
    }else {
        $_SESSION['erro_cadastro'] = "Produto Não cadastrado";
        header("Location:/loja_virtual/Cadastro_fornecedor.php");
    }


}else {

    header("Location:/loja_virtual/Cadastro_fornecedor.php");
}
    
?>