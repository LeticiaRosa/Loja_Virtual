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

         }
     });
     $("#id_fornecedor").autocomplete({
         source: nomes
     });
 });
 //Para buscar EMPRESA
 $(async function() {
     var nomes = [];
     await $.ajax({
         url: "back_end/busca_autocomplete.php",
         dataType: "json",
         data: {
             acao: 'autocomplete_empresa',
             parametro: $('#empresa1').val()
         },
         success: function(data) {
             nomes = data.map(d => d.nome);

         }
     });
     $("#empresa1").autocomplete({
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

         }
     });
     $("#id_sub_categoria").autocomplete({
         source: nomes
     });
 });




 function fechamodal_menu() {
     $('#conteiner-1').css("display", "none");
 }