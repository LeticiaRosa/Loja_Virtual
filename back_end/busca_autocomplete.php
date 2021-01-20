<?php
include_once("sessao.php");
//$id_usuario=$_SESSION['usuarioId'];
//require_once ("conexao.php");
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
$empresa=(isset($_GET['sessao'])) ? $_GET['sessao'] : '';


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


if ($acao == 'codigo_barras') :

	$sql = "SELECT P.ID_PRODUTO,UPPER(P.nome)AS nome,P.quantidade, P.PRECO_VENDA, cg.codigo_barras FROM produto as p left outer join CODIGO_BARRAS as cg on cg.id_produto =p.id_produto where P.id_produto=?";
	$stm = $conexao->prepare($sql);
	$stm->bindValue(1,$parametro);
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);

	echo $json;
endif;


if ($acao == 'codigo_barras_max') :

	$sql = "SELECT P.ID_PRODUTO,UPPER(P.nome)AS nome,P.quantidade, P.PRECO_VENDA, cg.codigo_barras FROM produto as p left outer join CODIGO_BARRAS as cg on cg.id_produto =p.id_produto where P.id_produto=(select max(aux.ID_produto) from produto aux )";
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

	$sql = "SELECT p.id_produto, p.nome, p.descricao, E.NOME AS empresa, C.NOME AS NOME_CATEGORIA, CASE WHEN SB.NOME IS NULL THEN '' ELSE SB.NOME END AS NOME_SUB_CATEGORIA ,p.preco_venda, p.preco_custo,p.quantidade, F.NOME AS FORNECEDOR, p.marca, p.unidade_medida, p.valor_medida, p.observacao,U.Nome_usuario AS USUARIO, DATE_format(p.data_cadastro, '%d-%m-%Y') as data_cadastro,B.codigo_barras from produto p left outer join fornecedor F ON P.ID_FORNECEDOR=F.ID_FORNECEDOR LEFT OUTER JOIN categoria C ON C.ID_CATEGORIA=P.ID_CATEGORIA LEFT OUTER JOIN usuario U ON U.ID_USUARIO=P.ID_USUARIO  LEFT OUTER JOIN SUB_CATEGORIA SB ON SB.ID_SUB_CATEGORIA=P.ID_SUB_CATEGORIA LEFT OUTER JOIN CODIGO_BARRAS B ON B.ID_produto=P.ID_produto LEFT OUTER JOIN EMPRESA E ON P.ID_EMPRESA = E.ID_EMPRESA";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);

	echo $json;
endif;
if ($acao == 'caixa_produto') :

	$sql = "SELECT p.id_produto, p.nome, p.descricao, E.NOME AS empresa, C.NOME AS NOME_CATEGORIA, CASE WHEN SB.NOME IS NULL THEN '' ELSE SB.NOME END AS NOME_SUB_CATEGORIA ,p.preco_venda, p.preco_custo,p.quantidade, F.NOME AS FORNECEDOR, p.marca, p.unidade_medida, p.valor_medida, p.observacao,U.Nome_usuario AS USUARIO, DATE_format(p.data_cadastro, '%d-%m-%Y') as data_cadastro,B.codigo_barras from produto p left outer join fornecedor F ON P.ID_FORNECEDOR=F.ID_FORNECEDOR LEFT OUTER JOIN categoria C ON C.ID_CATEGORIA=P.ID_CATEGORIA LEFT OUTER JOIN usuario U ON U.ID_USUARIO=P.ID_USUARIO  LEFT OUTER JOIN SUB_CATEGORIA SB ON SB.ID_SUB_CATEGORIA=P.ID_SUB_CATEGORIA LEFT OUTER JOIN CODIGO_BARRAS B ON B.ID_produto=P.ID_produto LEFT OUTER JOIN EMPRESA E ON P.ID_EMPRESA = E.ID_EMPRESA where p.id_empresa=?";
	$stm = $conexao->prepare($sql);
	$stm->bindValue(1, $parametro);
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);

	echo $json;
endif;
if ($acao == 'busca') :
	
	$sql = "SELECT p.id_produto, p.nome, p.descricao, E.NOME AS empresa, C.NOME AS NOME_CATEGORIA, CASE WHEN SB.NOME IS NULL THEN '' ELSE SB.NOME END AS NOME_SUB_CATEGORIA ,p.preco_venda, p.preco_custo,p.quantidade, F.NOME AS FORNECEDOR, p.marca, p.unidade_medida, p.valor_medida, p.observacao,U.Nome_usuario AS USUARIO, DATE_format(p.data_cadastro, '%d-%m-%Y') as data_cadastro,B.codigo_barras from produto p left outer join fornecedor F ON P.ID_FORNECEDOR=F.ID_FORNECEDOR LEFT OUTER JOIN categoria C ON C.ID_CATEGORIA=P.ID_CATEGORIA LEFT OUTER JOIN usuario U ON U.ID_USUARIO=P.ID_USUARIO  LEFT OUTER JOIN SUB_CATEGORIA SB ON SB.ID_SUB_CATEGORIA=P.ID_SUB_CATEGORIA LEFT OUTER JOIN CODIGO_BARRAS B ON B.ID_produto=P.ID_produto LEFT OUTER JOIN EMPRESA E ON P.ID_EMPRESA = E.ID_EMPRESA where p.id_produto =?";
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

if ($acao == 'lista_empresa') :
	
	$sql = "SELECT  E.ID_EMPRESA,E.NOME,E.RAZAO_SOCIAL,E.DESCRICAO,case when E.status='S' then'Disponível' ELSE 'Indisponível' END AS STATUS,E.CNPJ,E.ENDERECO,E.OBSERVACAO,DATE_format(E.data_cadastro, '%d-%m-%Y') as data_cadastro,U.NOME_USUARIO FROM EMPRESA AS E LEFT OUTER JOIN USUARIO AS U ON U.ID_USUARIO=E.ID_USUARIO";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);

	echo $json;

endif;



if ($acao == 'Busca_ult_produto') :

	$sql = "SELECT P.ID_PRODUTO,UPPER(P.nome)AS nome,P.quantidade, e.NOME as nome_empresa FROM produto as p left outer join empresa as e on e.id_empresa=p.id_empresa ";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);

	echo $json;
endif;


if ($acao == 'Busca_ult_produto_p') :

	$sql = "SELECT P.ID_PRODUTO,UPPER(P.nome)AS nome,P.quantidade, e.NOME as nome_empresa FROM produto as p left outer join empresa as e on e.id_empresa=p.id_empresa where p.id_produto=? ";
	$stm = $conexao->prepare($sql);
	$stm->bindValue(1, $parametro);
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);

	echo $json;
endif;

if ($acao == 'contar_notificacao') :

	$sql = "SELECT count(1) as quant FROM  trasferencia as t  where t.status='N' ";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);

	echo $json;
endif;
if ($acao == 'Busca_notificacao') :

	$sql = "SELECT t.id_trasferencia, es.nome AS EMPRESA,e.nome AS EMPRESA_TRASFERENCIA, u.nome_usuario,t.qtd_trasfere ,p.nome as produto,mensagem as STATUS FROM  trasferencia as t LEFT OUTER JOIN USUARIO AS U on u.id_usuario=t.id_usuario left outer join empresa as es on  es.id_empresa= t.id_empresa left outer join empresa as e on  e.id_empresa= t.id_empresa_tras left outer join produto as p on p.ID_produto=t.id_produto ";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);

	echo $json;
endif;

if ($acao == 'Confirma_notificacao') :

	$sql = "SELECT  es.nome AS EMPRESA,e.nome AS EMPRESA_TRASFERENCIA, u.nome_usuario,t.qtd_trasfere ,p.nome as produto ,t.id_produto,p.CODIGO_REFERENCIA FROM  trasferencia as t LEFT OUTER JOIN USUARIO AS U on u.id_usuario=t.id_usuario left outer join empresa as es on  es.id_empresa= t.id_empresa left outer join empresa as e on  e.id_empresa= t.id_empresa_tras left outer join produto as p on p.ID_produto=t.id_produto where  t.status='N' and t.id_trasferencia=?";
	$stm = $conexao->prepare($sql);
	$stm->bindValue(1, $parametro);
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);

	echo $json;
endif;
if ($acao == 'lista_cliente') :

	$sql = "  SELECT id_cliente,nome,cpf,e_mail,fixo,celular,endereco,cep,observacao, DATE_format(data_cadastro, '%d-%m-%Y')as data_cadastro FROM CLIENTE as c";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);

	echo $json;
endif;

if ($acao == 'lista_cliente_p') :

	$sql = "  SELECT id_cliente,nome,cpf,e_mail,fixo,celular,endereco,cep,observacao, DATE_format(data_cadastro, '%d-%m-%Y')as data_cadastro FROM CLIENTE as c where id_cliente = ? ";
	$stm = $conexao->prepare($sql);
	$stm->bindValue(1, $parametro);
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);

	echo $json;
endif;
if ($acao == 'CAIXA') :

	$sql = "SELECT P.ID_PRODUTO,P.NOME,P.PRECO_VENDA FROM produto AS P LEFT OUTER JOIN CODIGO_BARRAS AS COD ON COD.ID_PRODUTO=P.ID_PRODUTO WHERE P.ID_EMPRESA='$empresa'AND COD.codigo_barras=?";
	$stm = $conexao->prepare($sql);
	$stm->bindValue(1, $parametro);
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);

	echo $json;
endif;
if ($acao == 'lista_usuario') :

	$sql = "SELECT U.id_usuario,U.Nome_usuario,U.LOGIN,U.permissao,E.NOME AS NOME_EMPRESA,DATE_format(u.data_cadastro, '%d-%m-%Y')as Data_cadastro FROM usuario  AS U LEFT OUTER JOIN EMPRESA AS E ON E.ID_EMPRESA=U.ID_EMPRESA";
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);

	echo $json;
endif;


if ($acao == 'busca_dados_user') :

	$sql = "SELECT U.id_usuario,U.Nome_usuario,U.LOGIN,U.permissao,E.NOME AS NOME_EMPRESA,DATE_format(u.data_cadastro, '%d-%m-%Y')as Data_cadastro FROM usuario  AS U LEFT OUTER JOIN EMPRESA AS E ON E.ID_EMPRESA=U.ID_EMPRESA where  u.id_usuario=?";
	$stm = $conexao->prepare($sql);
	$stm->bindValue(1, $parametro);
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);

	echo $json;
endif;



if ($acao == 'PERMISSOES') :

	$sql = "SELECT U.permissao FROM usuario AS U where  u.id_usuario=?";
	$stm = $conexao->prepare($sql);
	$stm->bindValue(1, $parametro);
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);

	echo $json;
endif;


if ($acao == 'BUSCA_CAIXA') :

	$sql = "SELECT E.NOME AS nome_empresa, C.NOME as nome, C.NOME_MAQUINA, C.STATUS FROM CAIXA C LEFT OUTER JOIN EMPRESA E ON E.ID_EMPRESA = C.ID_EMPRESA WHERE C.NOME LIKE ? AND C.STATUS='Ativo' limit 10";
	$stm = $conexao->prepare($sql);
	$stm->bindValue(1, '%' . $parametro . '%');
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);

	echo $json;
endif;

if ($acao == 'FECHA_CAIXA') :

	$sql = "SELECT CAX.NOME AS NOME_CAIXA,EMP.NOME AS NOME_EMPRESA,CAX.NOME_MAQUINA, US.NOME_USUARIO, CX.DATA_ABERTURA,CX.HORA_ABERTURA FROM CONTROLE_CAIXA AS CX 	LEFT OUTER JOIN CAIXA AS CAX	ON CAX.ID_CAIXA=CX.ID_CAIXA	LEFT OUTER JOIN EMPRESA AS EMP	ON EMP.ID_EMPRESA=CAX.ID_EMPRESA	LEFT OUTER JOIN USUARIO  AS US	ON US.ID_USUARIO=CX.ID_USUARIO_ABERTURA	WHERE CAX.NOME_MAQUINA=? AND  CX.DATA_FECHAMENTO IS NULL AND CX.HORA_ABERTURA=(SELECT MAX(AUX.HORA_ABERTURA) FROM CONTROLE_CAIXA AS AUX  WHERE AUX.ID_CAIXA=CX.ID_CAIXA)";
	$stm = $conexao->prepare($sql);
	$stm->bindValue(1,  $parametro  );
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);

	echo $json;
endif;


if ($acao == 'lista_caixa') :
	$sql = "SELECT CAX.NOME AS NOME_CAIXA, EMP.NOME AS NOME_EMPRESA, CAX.NOME_MAQUINA, CAX.STATUS, CASE WHEN ( CX.DATA_ABERTURA IS NULL AND CX.DATA_FECHAMENTO IS NULL ) OR ( CX.DATA_ABERTURA IS NOT NULL AND CX.DATA_FECHAMENTO IS NULL) THEN 'Caixa Aberto' ELSE 'Caixa Fechado' END AS STATUS_CAIXA, coalesce(US.NOME_USUARIO,'') AS USUARIO_ABERTURA, coalesce(DATE_format(CX.DATA_ABERTURA, '%d-%m-%Y'),'') AS DATA_ABERTURA , coalesce(USF.NOME_USUARIO,'') AS USUARIO_FECHAMENTO, coalesce(DATE_format(CX.DATA_FECHAMENTO, '%d-%m-%Y'),'') AS DATA_FECHAMENTO FROM CONTROLE_CAIXA AS CX LEFT OUTER JOIN CAIXA AS CAX ON CAX.ID_CAIXA=CX.ID_CAIXA LEFT OUTER JOIN EMPRESA AS EMP ON EMP.ID_EMPRESA=CAX.ID_EMPRESA LEFT OUTER JOIN USUARIO  AS US	ON US.ID_USUARIO=CX.ID_USUARIO_ABERTURA LEFT OUTER JOIN USUARIO  AS USF	ON USF.ID_USUARIO=CX.ID_USUARIO_FECHAMENTO WHERE CAX.ID_EMPRESA='$x'";	
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$dados = $stm->fetchAll(PDO::FETCH_OBJ);

	$json = json_encode($dados);

	echo $json;
endif;