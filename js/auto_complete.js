



//Para buscar produto
$(async function() {
	   // Atribui evento e função para limpeza dos campos
	// $('#clicar').on('input', limpaCampos);
	   
	var nomes = [];
	await $.ajax({
		url: "back_end/busca_autocomplete.php",
		dataType: "json",
		data: {
			acao: 'autocomplete',
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
//Para buscar fornecedor
	$(async function() {
		// Atribui evento e função para limpeza dos campos
	 // $('#clicar').on('input', limpaCampos);
		
	 var nomes = [];
	 await $.ajax({
		 url: "back_end/busca_autocomplete.php",
		 dataType: "json",
		 data: {
			 acao: 'autocomplete_fornecedor',
			 parametro: $('#id_fornecedor').val()
		 },
		 success: function(data) {
		   nomes= data.map(d=>d.nome); 
		   console.log(nomes);
		 }
	 });
 $( "#id_fornecedor" ).autocomplete({
		 source: nomes
	   });
	 } );

function teste($a) {
	//var teste =  document.getElementById('sucess').value;
	var teste = $a
	console.log(teste);
	
	if (teste  == 1 ) {
		
  alert('Email enviado com Sucesso!');
  "<?php echo $_SESSION['sucesso'] = 0 ;?>";
  window.location='/Loja_Virtual/Tela_cadastro_produto_1.php';
  teste = 0;
  }
  
};

