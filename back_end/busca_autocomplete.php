<?php

// Dados da conexão com o banco de dados
define("HOST", "25.107.219.2");
define("USUARIO", "Gabriel");
define("SENHA", "Gb@30173572");
define("DB", "Loja");

// Recebe os parâmetros enviados via GET
$acao = (isset($_GET['acao'])) ? $_GET['acao'] : '';
$parametro = (isset($_GET['parametro'])) ? $_GET['parametro'] : '';

// Configura uma conexão com o banco de dados
$opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
$conexao = new PDO("mysql:host=" . HOST . "; dbname=" . DB, USUARIO, SENHA, $opcoes);

// Verifica se foi solicitado uma consulta para o autocomplete
if ($acao == 'autocomplete') :

	$sql = "SELECT nome FROM categoria where nome like ? and status='S' limit 10 ";
	$stm = $conexao->prepare($sql);
	$stm->bindValue(1, '%' . $parametro . '%');
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);

	echo $json;
endif;


if ($acao == 'autocomplete_fornecedor') :

	$sql = "SELECT nome FROM fornecedor where nome like ?  and status='S' limit 10 ";
	$stm = $conexao->prepare($sql);
	$stm->bindValue(1, '%' . $parametro . '%');
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);

	echo $json;
endif;

if ($acao == 'autocomplete_sub_categoria') :

	$sql = "SELECT nome FROM sub_categoria where nome like ? and status='S' limit 10 ";
	$stm = $conexao->prepare($sql);
	$stm->bindValue(1, '%' . $parametro . '%');
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);

	echo $json;
endif;

if ($acao == 'autocomplete_empresa') :

	$sql = "SELECT nome FROM EMPRESA where nome like ? and status='S' limit 10 ";
	$stm = $conexao->prepare($sql);
	$stm->bindValue(1, '%' . $parametro . '%');
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);

	echo $json;
endif;


if ($acao == 'teste') :

	$sql = "SELECT P.ID_PRODUTO,UPPER(P.nome)AS nome,P.quantidade, P.PRECO_VENDA, cg.codigo_barras FROM produto as p left outer join CODIGO_BARRAS as cg on cg.id_produto =p.id_produto where P.id_produto=(select max(id_produto) from produto)";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);

	echo $json;
endif;


if ($acao == 'categoria') :

	$sql = "SELECT c.id_categoria,UPPER(C.NOME) AS NOME ,UPPER(C.DESCRICAO ) AS DESCRICAO,CASE WHEN C.STATUS='S' THEN 'DISPONIVEL' ELSE'INDISPONIVEL' END AS STATUS,UPPER(U.NOME_USUARIO) AS USUARIO,DATE_format(C.data_cadastro, '%d-%m-%Y') AS DATA_CADASTRO,	UPPER(C.OBSERVACAO) OBSERVACAO  from CATEGORIA C    LEFT OUTER JOIN USUARIO U    ON U.ID_USUARIO=C.ID_USUARIO";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);

	echo $json;
endif;

if ($acao == 'subcategoria') :

	$sql = "SELECT c.id_SUB_categoria,UPPER(C.NOME) AS NOME ,UPPER(C.DESCRICAO ) AS DESCRICAO,CASE WHEN C.STATUS='S' THEN 'DISPONIVEL' ELSE'INDISPONIVEL' END AS STATUS,UPPER(U.NOME_USUARIO) AS USUARIO,DATE_format(C.data_cadastro, '%d-%m-%Y') AS DATA_CADASTRO,UPPER(C.OBSERVACAO) OBSERVACAO from sub_categoria C    LEFT OUTER JOIN USUARIO U    ON U.ID_USUARIO=C.ID_USUARIO";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);

	echo $json;
endif;

if ($acao == 'produto') :

	$sql = "SELECT p.id_produto, p.nome, p.descricao, E.NOME AS empresa, C.NOME AS NOME_CATEGORIA, CASE WHEN SB.NOME IS NULL THEN 'NAO POSSUI' ELSE SB.NOME END AS NOME_SUB_CATEGORIA ,p.preco_venda, p.preco_custo,p.quantidade, F.NOME AS FORNECEDOR, p.marca, p.unidade_medida, p.valor_medida, p.observacao,U.Nome_usuario AS USUARIO, DATE_format(p.data_cadastro, '%d-%m-%Y') as data_cadastro,B.codigo_barras from produto p left outer join fornecedor F ON P.ID_FORNECEDOR=F.ID_FORNECEDOR LEFT OUTER JOIN categoria C ON C.ID_CATEGORIA=P.ID_CATEGORIA LEFT OUTER JOIN usuario U ON U.ID_USUARIO=P.ID_USUARIO  LEFT OUTER JOIN SUB_CATEGORIA SB ON SB.ID_SUB_CATEGORIA=P.ID_SUB_CATEGORIA LEFT OUTER JOIN CODIGO_BARRAS B ON B.ID_produto=P.ID_produto LEFT OUTER JOIN EMPRESA E ON P.ID_EMPRESA = E.ID_EMPRESA";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);

	echo $json;
endif;
if ($acao == 'busca') :
	
	$sql = "SELECT p.id_produto, p.nome, p.descricao, E.NOME AS empresa, C.NOME AS NOME_CATEGORIA, CASE WHEN SB.NOME IS NULL THEN 'NAO POSSUI' ELSE SB.NOME END AS NOME_SUB_CATEGORIA ,p.preco_venda, p.preco_custo,p.quantidade, F.NOME AS FORNECEDOR, p.marca, p.unidade_medida, p.valor_medida, p.observacao,U.Nome_usuario AS USUARIO, DATE_format(p.data_cadastro, '%d-%m-%Y') as data_cadastro,B.codigo_barras from produto p left outer join fornecedor F ON P.ID_FORNECEDOR=F.ID_FORNECEDOR LEFT OUTER JOIN categoria C ON C.ID_CATEGORIA=P.ID_CATEGORIA LEFT OUTER JOIN usuario U ON U.ID_USUARIO=P.ID_USUARIO  LEFT OUTER JOIN SUB_CATEGORIA SB ON SB.ID_SUB_CATEGORIA=P.ID_SUB_CATEGORIA LEFT OUTER JOIN CODIGO_BARRAS B ON B.ID_produto=P.ID_produto LEFT OUTER JOIN EMPRESA E ON P.ID_EMPRESA = E.ID_EMPRESA where p.id_produto =?";
	$stm = $conexao->prepare($sql);
	$stm->bindValue(1, $parametro);
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);

	echo $json;

endif;


if ($acao == 'lista_fornecedor') :
	
	$sql = "SELECT f.ID_FORNECEDOR,f.nome,f.RAZAO_SOCIAL,case when f.status='S' then'Disponível' ELSE 'Indisponível' END AS Status,f.contato,f.CNPJ,F.TEL_CEL AS CELULAR,f.TEL_FIXO as fixo,F.Endereco,F.CEP,F.E_MAIL,f.Observacao,U.Nome_usuario, DATE_format(F.data_cadastro, '%d-%m-%Y') as data_cadastro FROM  fornecedor F LEFT OUTER JOIN usuario U ON U.ID_USUARIO=f.ID_USUARIO";
	$stm = $conexao->prepare($sql);
	$stm->bindValue(1, $parametro);
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);

	echo $json;

endif;


