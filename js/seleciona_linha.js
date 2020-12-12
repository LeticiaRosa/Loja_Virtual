var tabela = document.getElementById("table");
var linhas = tabela.getElementsByTagName("tr");

for(var i = 0; i < linhas.length; i++){
	var linha = linhas[i];
  linha.addEventListener("click", function(){
  	//Adicionar ao atual
		selLinha(this, false); //Selecione apenas um
    //selLinha(this, true); //Selecione quantos quiser
	});
}

/**
Caso passe true, você pode selecionar multiplas linhas.
Caso passe false, você só pode selecionar uma linha por vez.
**/
function selLinha(linha, multiplos){
	if(!multiplos){
  	var linhas = linha.parentElement.getElementsByTagName("tr");
    for(var i = 0; i < linhas.length; i++){
      var linha_ = linhas[i];
      linha_.classList.remove("selecionado");    
    }
  }
  linha.classList.toggle("selecionado");
}

/**
Exemplo de como capturar os dados
**/
var btnVisualizar = document.getElementById("visualizarDados");
var dados = "";
var nome = "";
btnVisualizar.addEventListener("click", function(){
	var selecionados = tabela.getElementsByClassName("selecionado");
  //Verificar se eestá selecionado
  
  for(var i = 0; i < selecionados.length; i++){
  	var selecionado = selecionados[i];
    selecionado = selecionado.getElementsByTagName("td");
    dados += "Nome: " + selecionado[0].innerHTML + " - Descrição: " + selecionado[1].innerHTML + " - Categoria: " + selecionado[2].innerHTML + "\n";
  }
  console.log(dados);
  console.log(selecionado[0].innerHTML);
  if (selecionado[0].innerHTML  !== null ){
  window.location.replace("#openModal");

  
  document.getElementById('nome').value = selecionado[0].innerHTML;
  document.getElementById('descricao').value = selecionado[1].innerHTML;
  document.getElementById('id_categoria').value = selecionado[2].innerHTML;
  document.getElementById('preco_venda').value = selecionado[3].innerHTML;
  document.getElementById('preco_custo').value = selecionado[4].innerHTML;
  document.getElementById('quantidade').value = selecionado[5].innerHTML;
  document.getElementById('id_fornecedor').value = selecionado[6].innerHTML;
  document.getElementById('marca').value = selecionado[7].innerHTML;
  document.getElementById('unidade_medida').value = selecionado[8].innerHTML;
  document.getElementById('valor_medida').value = selecionado[9].innerHTML;
  document.getElementById('observacao').value = selecionado[10].innerHTML;
  }
});

function fechamodal(){
  $('#modal').css("display", "none");
}
