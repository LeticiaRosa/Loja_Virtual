<?php
session_start();
require_once ("conexao.php");
$dados_saiu = $_POST['dados_saiu'];
$ds = json_decode($dados_saiu);
foreach ($ds as $key => $value) {
    $id[] =$value->id_produto;
     $quant[] =$value->quantidade;
 
     
 }
$dados_entrou = $_POST['dados_entrou'];
$de = json_decode($dados_entrou);

foreach ($de as $key => $value) {
    $id_e[] =$value->id_produto;
     $quant_e[] =$value->quantidade;
 
     
 }


 $_SESSION['id_s']=$id;
$_SESSION['quant_s']=$quant;


 $_SESSION['id_e']=$id_e;
$_SESSION['quant_e']=$quant_e;