<?php
session_start();

$recebe = $_POST['dados'];
$data = json_decode($recebe);



foreach ($data as $key => $value) {
   $id[] =$value->id_produto;
    $quant[] =$value->quantidade;

    
}

$_SESSION['id']=$id;
$_SESSION['quant']=$quant;





?> 