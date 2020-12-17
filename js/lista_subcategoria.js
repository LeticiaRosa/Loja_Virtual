$(window).on("load", $(async function() {
    // Atribui evento e função para limpeza dos campos
    // $('#clicar').on('input', limpaCampos);
    var id = [];
    var nomes = [];
    await $.ajax({
        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'subcategoria'
        },
        success: function(data) {
            id = data.map(d => d.id_sub_categoria);
            nome = data.map(d => d.NOME);
            descricao = data.map(d => d.DESCRICAO);
            STATUS = data.map(d => d.STATUS);
            observacao = data.map(d => d.OBSERVACAO);
            USUARIO = data.map(d => d.USUARIO);
            DATA_CADASTRO = data.map(d => d.DATA_CADASTRO);
            for (i = 0; i < data.length; i++) {
                var newRow = $('<tr class = "corpo" >');
                var cols = "";
                cols += '<td>' + id[i] + '</td>';
                cols += '<td>' + nome[i] + '</td>';
                cols += '<td>' + descricao[i] + '</td>';
                cols += '<td>' + STATUS[i] + '</td>';
                cols += '<td class="sumir">' + observacao[i] + '</td>';
                cols += '<td class="sumir">' + USUARIO[i] + '</td>';
                cols += '<td class="sumir">' + DATA_CADASTRO[i] + '</td>';

                newRow.append(cols);
                $("#products-table").append(newRow);


            }

        }
    });
    $(document).ready(function() {
        $('#products-table').dataTable({
            "autoWidth": false,
            "language": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }



        });


    });
}));