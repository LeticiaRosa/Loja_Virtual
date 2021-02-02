$(async function() {
    // Atribui evento e função para limpeza dos campos
    // $('#clicar').on('input', limpaCampos);
    empresa = document.getElementById("empresa_usuario").value;
    await $.ajax({

        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'lista_movimento',
            sessao: empresa,
        },
        success: function(data) {
            DATA_MOVIMENTO = data.map(d => d.DATA_MOVIMENTO);
            ID_PRODUTO = data.map(d => d.ID_PRODUTO);
            NOME_PRODUTO = data.map(d => d.NOME_PRODUTO);
            QUANTIDADE = data.map(d => d.QUANTIDADE);
            TIPO_MOVI = data.map(d => d.TIPO_MOVI);

            for (i = 0; i < data.length; i++) {
                var newRow = $('<tr class = "corpo selecionado" >');
                var cols = "";
                cols += '<td>' + DATA_MOVIMENTO[i] + '</td>';
                cols += '<td>' + ID_PRODUTO[i] + '</td>';
                cols += '<td>' + NOME_PRODUTO[i] + '</td>';
                cols += '<td>' + QUANTIDADE[i] + '</td>';
                cols += '<td>' + TIPO_MOVI[i] + '</td>';

                newRow.append(cols);
                $("#products-table").append(newRow);
            }

            var tabela = document.getElementById("products-table");
            var selecionados = tabela.getElementsByClassName("selecionado");
            console.log(selecionados);
            for (i = 0; i < selecionados.length; i++) {

                selecionado = selecionados[i];
                selecionado = selecionado.getElementsByTagName("td");
                console.log(selecionado[4].innerHTML);
                if (selecionado[4].innerHTML == "Saida") {
                    selecionado[0].style.color = "red";
                    //selecionado[0].style.backgroundColor = "white";
                    selecionado[1].style.color = "red";
                    selecionado[2].style.color = "red";
                    selecionado[3].style.color = "red";
                    selecionado[4].style.color = "red";
                } else if (selecionado[4].innerHTML == "Entrada") {
                    selecionado[0].style.color = "green";
                    selecionado[1].style.color = "green";
                    selecionado[2].style.color = "green";
                    selecionado[3].style.color = "green";
                    selecionado[4].style.color = "green";

                } else {
                    selecionado[0].style.color = "#ffb34f";
                    selecionado[1].style.color = "#ffb34f";
                    selecionado[2].style.color = "#ffb34f";
                    selecionado[3].style.color = "#ffb34f";
                    selecionado[4].style.color = "#ffb34f";
                }
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