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


	 $(async function() {
		// Atribui evento e função para limpeza dos campos
	 // $('#clicar').on('input', limpaCampos);
		
	 var nomes = [];
	 await $.ajax({
		 url: "back_end/busca_autocomplete.php",
		 dataType: "json",
		 data: {
			 acao: 'teste'
		 },
		 success: function(data) {
		   nome= data.map(d=>d.nome); 
		   id= data.map(d=>d.ID_PRODUTO); 
		   quantidate= data.map(d=>d.quantidade); 
		   valor= data.map(d=>d.PRECO_VENDA); 
		   codigo=data.map(d=>d.codigo_barras)
		   console.log(nome);
		   console.log(id);
		   console.log(quantidate);
		   console.log(valor);
		   document.getElementById('Id').value = id;
		   document.getElementById('valor_produto').value = valor+',00';
		   document.getElementById('qtd_estoque').value = quantidate;
		   document.getElementById('produto').value = nome;
		   document.getElementById('codigo').value = codigo;


		 }
	 });
 
	 } );

