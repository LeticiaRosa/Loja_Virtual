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

btnVisualizar.addEventListener("click", function(){
	var selecionados = tabela.getElementsByClassName("selecionado");
  //Verificar se eestá selecionado
  var dados = "";
  for(var i = 0; i < selecionados.length; i++){
  	var selecionado = selecionados[i];
    selecionado = selecionado.getElementsByTagName("td");
    dados += "Nome: " + selecionado[0].innerHTML + " - Descrição: " + selecionado[1].innerHTML + " - Categoria: " + selecionado[2].innerHTML + "\n";
  }
  window.location.replace("#openModal");
 
});