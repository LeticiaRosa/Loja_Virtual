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

             nomes = data.map(d => d.nome);
             console.log(nomes);
         }
     });
     $("#id_categoria").autocomplete({

         source: nomes

     });
 });

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
             nomes = data.map(d => d.nome);
             console.log(nomes);
         }
     });
     $("#id_fornecedor").autocomplete({
         source: nomes
     });
 });


 //Para buscar sub_categoria
 $(async function() {
     // Atribui evento e função para limpeza dos campos
     // $('#clicar').on('input', limpaCampos);

     var nomes = [];
     await $.ajax({
         url: "back_end/busca_autocomplete.php",
         dataType: "json",
         data: {
             acao: 'autocomplete_sub_categoria',
             parametro: $('#id_sub_categoria').val()
         },
         success: function(data) {
             nomes = data.map(d => d.nome);
             console.log(nomes);
         }
     });
     $("#id_sub_categoria").autocomplete({
         source: nomes
     });
 });