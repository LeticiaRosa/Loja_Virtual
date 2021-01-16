$(async function() {
    // Atribui evento e função para limpeza dos campos
    // $('#clicar').on('input', limpaCampos);

    await $.ajax({
        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'lista_usuario'
        },
        success: function(data) {
            Nome_usuario = data.map(d => d.Nome_usuario);


            for (i = 0; i < data.length; i++) {
                var newRow = $('<tr class = "corpo" >');
                var cols = "";

                cols += '<td>' + Nome_usuario[i] + '</td>';


                newRow.append(cols);
                $("#products-table-2").append(newRow);

            }

        }
    });
    $(document).ready(function() {
        $('#products-table-2').dataTable({
            "autoWidth": false,
            "lengthMenu": [
                [5, 10, 15, -1],
                [5, 10, 15, "Todos"]
            ],


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


    var tabela = document.getElementById("products-table-2");
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
        // console.log(linha);
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

    var btnVisualizar = document.getElementById("visualizarDados-2");
    btnVisualizar.addEventListener("click", function() {
        var selecionados = tabela.getElementsByClassName("selecionado");
        //Verificar se está selecionado
        for (var i = 0; i < selecionados.length; i++) {
            var selecionado = selecionados[i];
            selecionado = selecionado.getElementsByTagName("td");
        }
        document.getElementById('Vendedor').value = selecionado[0].innerHTML;
        $('#openModal1').css("display", "none");
    });

}));