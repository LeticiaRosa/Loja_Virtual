<?php 
// Dados da conexão com o banco de dados
define("HOST","25.107.219.2");
define("USUARIO","Gabriel");
define("SENHA","Gb@30173572");
define("DB","Loja");

// Recebe os parâmetros enviados via GET
$acao = (isset($_GET['acao'])) ? $_GET['acao'] : '';
$parametro = (isset($_GET['parametro'])) ? $_GET['parametro'] : '';

// Configura uma conexão com o banco de dados
$opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
$conexao = new PDO("mysql:host=".HOST."; dbname=".DB, USUARIO, SENHA, $opcoes);
 echo ($parametro);
// Verifica se foi solicitado uma consulta para o autocomplete
if($acao == 'autocomplete'):
	
	$sql = "SELECT nome FROM categoria where nome like ? limit 10";
	$stm = $conexao->prepare($sql);
	$stm->bindValue(1, '%'.$parametro.'%');
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);
	
	$json = json_encode($dados);
	
	echo $json;
endif;


if($acao == 'autocomplete_fornecedor'):
	
	$sql = "SELECT nome FROM fornecedor where nome like ? limit 10";
	$stm = $conexao->prepare($sql);
	$stm->bindValue(1, '%'.$parametro.'%');
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);
	
	$json = json_encode($dados);
	
	echo $json;
endif;


if($acao == 'teste'):
	
	$sql = "SELECT ID_PRODUTO,nome,quantidade, PRECO_VENDA  FROM produto where id_produto=(select max(id_produto) from produto)";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);
	
	$json = json_encode($dados);
	
	echo $json;
endif;
