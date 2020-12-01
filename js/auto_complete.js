$(async function() {
	   // Atribui evento e função para limpeza dos campos
	   $('#categoria').on('input', limpaCampos);
	var nomes = [];
	await $.ajax({
		url: "back_end/busca_autocomplete.php",
		dataType: "json",
		data: {
			acao: 'autocomplete',
			parametro: $('#categoria').val()
		},
		success: function(data) {
		  nomes= data.map(d=>d.nome); 
		  console.log(nomes);
		}
	});
$( "#categoria" ).autocomplete({
		source: nomes
	  });
	} );

	  // Função para limpar os campos caso a busca esteja vazia
	  function limpaCampos(){
		var busca = $('#categoria').val();
 
		if(busca == ""){
		$('#categoria').val('');
		  
		}
	 }
;



