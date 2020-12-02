$(async function() {
    // Atribui evento e função para limpeza dos campos
    $('#id_categoria').on('input', limpaCampos);
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

   // Função para limpar os campos caso a busca esteja vazia
   function limpaCampos(){
     var busca = $('#id_categoria').val();

     if(busca == ""){
     $('#id_categoria').val('');
       
     }
  }
;