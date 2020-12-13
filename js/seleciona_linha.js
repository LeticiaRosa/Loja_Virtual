var tabela = document.getElementById("table");
var linhas = tabela.getElementsByTagName("tr");

for(var i = 0; i < linhas.length; i++){
  var linha = linhas[i];
  console.log(linha);
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
  //Verificar se está selecionado
  
  for(var i = 0; i < selecionados.length; i++){
  	var selecionado = selecionados[i];
    selecionado = selecionado.getElementsByTagName("td");
    dados += "Nome: " + selecionado[0].innerHTML + " - Descrição: " + selecionado[1].innerHTML + " - Categoria: " + selecionado[2].innerHTML + "\n";
  }

  if (selecionado[0].innerHTML  !== null ){
  window.location.replace("#openModal");
  document.getElementById('id').value = selecionado[0].innerHTML;
  document.getElementById('nome').value = selecionado[1].innerHTML;
  document.getElementById('descricao').value = selecionado[2].innerHTML;
  document.getElementById('id_categoria').value = selecionado[3].innerHTML;
  document.getElementById('id_sub_categoria').value = selecionado[4].innerHTML;
  document.getElementById('preco_venda').value = selecionado[5].innerHTML;
  document.getElementById('preco_custo').value = selecionado[6].innerHTML;
  document.getElementById('quantidade').value = selecionado[7].innerHTML;
  document.getElementById('id_fornecedor').value = selecionado[8].innerHTML;
  document.getElementById('marca').value = selecionado[9].innerHTML;
  document.getElementById('unidade_medida').value = selecionado[10].innerHTML;
  document.getElementById('valor_medida').value = selecionado[11].innerHTML;
  document.getElementById('observacao').value = selecionado[11].innerHTML;
  document.getElementById('gerar_codigo-1').value = selecionado[15].innerHTML;

  if (selecionado[0].innerHTML  !== selecionado[15].innerHTML ){
    document.getElementById('radio-2').checked = true;
  }
  else{
    document.getElementById('radio-1').checked = true;
  }
}
});

function fechamodal(){
  $('#modal').css("display", "none");
}
