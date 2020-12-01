<?php
require_once("conexao.php");
$dados=$conexao->query("select id_categoria,nome from categoria ");
 echo json_encode($dados->fetch_all(PDO::FETCH_ASSOC));
 $obj =json_decode($dados);
 echo $obj;
?>

