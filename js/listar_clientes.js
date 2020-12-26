 $(async function() {
     // Atribui evento e função para limpeza dos campos
     // $('#clicar').on('input', limpaCampos);

     await $.ajax({
         url: "back_end/busca_autocomplete.php",
         dataType: "json",
         data: {
             acao: 'lista_cliente'
         },
         success: function(data) {
             id = data.map(d => d.id_cliente);
             nome = data.map(d => d.nome);
             cpf = data.map(d => d.cpf);
             e_mail = data.map(d => d.e_mail);
             fixo = data.map(d => d.fixo);
             celular = data.map(d => d.celular);
             endereco = data.map(d => d.endereco);
             cep = data.map(d => d.cep);
             observacao = data.map(d => d.observacao);
             data_cadastro = data.map(d => d.data_cadastro);
             for (i = 0; i < data.length; i++) {
                 var newRow = $('<tr class = "corpo" >');
                 var cols = "";
                 cols += '<td class="sumir_sempre">' + id[i] + '</td>';
                 cols += '<td>' + nome[i] + '</td>';
                 cols += '<td>' + cpf[i] + '</td>';
                 cols += '<td>' + e_mail[i] + '</td>';
                 cols += '<td>' + fixo[i] + '</td>';
                 cols += '<td>' + celular[i] + '</td>';
                 cols += '<td>' + endereco[i] + '</td>';
                 cols += '<td>' + cep[i] + '</td>';
                 cols += '<td>' + observacao[i] + '</td>';
                 cols += '<td>' + data_cadastro[i] + '</td>';

                 newRow.append(cols);
                 $("#products-table").append(newRow);
             }

         }
     });
     $(document).ready(function() {
         $('#products-table').dataTable({
             "autoWidth": false,
             language: {
                 "sEmptyTable": "Nenhum registro encontrado",
                 "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                 "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                 "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                 "sInfoPostFix": "",
                 "sInfoThousands": ".",
                 "sLengthMenu": "_MENU_ resultados por página",
                 "sLoadingRecords": "Carregando...",
                 "sProcessing": "Processando...",
                 "sZeroRecords": "Nenhum registro encontrado",
                 "sSearch": "Pesquisar",
                 "oPaginate": {
                     "sNext": "Próximo",
                     "sPrevious": "Anterior",
                     "sFirst": "Primeiro",
                     "sLast": "Último"
                 },
                 "oAria": {
                     "sSortAscending": ": Ordenar colunas de forma ascendente",
                     "sSortDescending": ": Ordenar colunas de forma descendente"
                 }
             }




         });


     });
 });