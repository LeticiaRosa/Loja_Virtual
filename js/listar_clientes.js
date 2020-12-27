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


 $(window).on("click", (function() {

     var tabela = document.getElementById("products-table");
     var linhas = tabela.getElementsByTagName("tr");

     for (var i = 0; i < linhas.length; i++) {
         var linha = linhas[i];
         linha.addEventListener("click", function() {
             //Adicionar ao atual

             selLinha(this, false); //Selecione apenas um
             //selLinha(this, true); //Selecione quantos quiser
         });
     }

     /**
     Caso passe true, você pode selecionar multiplas linhas.
     Caso passe false, você só pode selecionar uma linha por vez.
     **/
     function selLinha(linha, multiplos) {

         if (!multiplos) {
             var linhas = linha.parentElement.getElementsByTagName("tr");
             for (var i = 0; i < linhas.length; i++) {
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
     btnVisualizar.addEventListener("click", function() {
         abremodal();
         var selecionados = tabela.getElementsByClassName("selecionado");
         //Verificar se está selecionado

         for (var i = 0; i < selecionados.length; i++) {
             var selecionado = selecionados[i];
             selecionado = selecionado.getElementsByTagName("td");

         }

         window.location.replace("#openModal");
         $("#openModal").load("Tela_alterar_cliente.php?id=" + selecionado[0].innerHTML);

     });


 }));


 function fechamdal() {
     $('#openModal').css("display", "none");
 }


 function abremodal() {
     $('#openModal').css("display", "inline-block");

 }