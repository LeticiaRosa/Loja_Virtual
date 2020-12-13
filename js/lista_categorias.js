$(window).on("load",$(async function() {
    // Atribui evento e função para limpeza dos campos
 // $('#clicar').on('input', limpaCampos);
    
 var nomes = [];
 await $.ajax({
     url: "back_end/busca_autocomplete.php",
     dataType: "json",
     data: {
         acao: 'categoria'
     },
     success: function(data) {
       console.log(data);
        nome= data.map(d=>d.NOME); 
       descricao= data.map(d=>d.DESCRICAO); 
       STATUS= data.map(d=>d.STATUS);          
       observacao= data.map(d=>d.OBSERVACAO); 
       USUARIO= data.map(d=>d.USUARIO);  
       DATA_CADASTRO= data.map(d=>d.DATA_CADASTRO);   
      for(i=0;i<data.length;i++){
        var newRow = $("<tr>");
        var cols = "";
  
      cols += '<td>'+nome[i]+'</td>';
      cols += '<td>'+descricao[i]+'</td>';
      cols += '<td>'+STATUS[i]+'</td>';
      cols += '<td>'+observacao[i]+'</td>';
      cols += '<td>'+USUARIO[i]+'</td>';
      cols += '<td>'+DATA_CADASTRO[i]+'</td>';
      
  
      newRow.append(cols);
      $("#products-table").append(newRow);

    }
     }
 });

 } ));

