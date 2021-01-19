<?php
session_start();

for($i=0;$i<count($_SESSION['id']);$i++){
    $quantidade=$_SESSION['quant'][$i];
    $id_produto=$_SESSION['id'][$i];
    $update_protudo="update produto set qunatidade=quantidade-'$quantidade'where id_produto='$id_produto'";
    echo  $update_protudo;
};
unset ($_SESSION['quant']);
unset ($_SESSION['id']);
