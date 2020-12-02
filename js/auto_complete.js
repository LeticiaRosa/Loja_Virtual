$(async function() {
	   // Atribui evento e função para limpeza dos campos
	// $('#clicar').on('input', limpaCampos);
	   
	var nomes = [];
	await $.ajax({
		url: "back_end/busca_autocomplete.php",
		dataType: "json",
		data: {
			acao: 'autocomplete_forne',
			parametro: $('#id_categoria').val()
		},
		success: function(data) {
		  nomes= data.map(d=>d.nome); 
		  console.log(nomes);
		}
	});
$( "#id_categoria" ).autocomplete({
		source: nomes
	  });
	} );
	
	/*
	  // Função para limpar os campos caso a busca esteja vazia
	  function limpaCampos(){
		var nome = $('#nome').val('');
		var descricao = $('#descricao').val();
		var id_categoria = $('#id_categoria').val();
		var preco_venda = $('#preco_venda').val();
		var preco_custo = $('#preco_custo').val();
		var quantidade = $('#quantidade').val();
		var id_fornecedor = $('#id_fornecedor').val();
		var observacao = $('#observacao').val();
	
		
		  
		
	 }*/

	 $( "#clicar" ).submit(function() {
		//$('#form').trigger("reset");
		
		$('#form')[0].reset();
		console.log($('#form')[0]);
	  });
;



