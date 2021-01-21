$(async function() {

    // Atribui evento e função para limpeza dos campos
    // $('#clicar').on('input', limpaCampos);

    await $.ajax({
        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'lista_caixa'

        },

        success: function(data) {
            ID_CAIXA = data.map(d => d.ID_CAIXA);
            NOME_CAIXA = data.map(d => d.NOME_CAIXA);
            NOME_EMPRESA = data.map(d => d.NOME_EMPRESA);
            NOME_MAQUINA = data.map(d => d.NOME_MAQUINA);
            STATUS = data.map(d => d.STATUS);
            STATUS_CAIXA = data.map(d => d.STATUS_CAIXA);
            USUARIO_ABERTURA = data.map(d => d.USUARIO_ABERTURA);
            DATA_ABERTURA = data.map(d => d.DATA_ABERTURA);
            USUARIO_FECHAMENTO = data.map(d => d.USUARIO_FECHAMENTO);
            DATA_FECHAMENTO = data.map(d => d.DATA_FECHAMENTO);

            for (i = 0; i < data.length; i++) {
                var newRow = $('<tr class = "corpo" >');
                var cols = "";
                cols += '<td class = "sumir_sempre">' + ID_CAIXA[i] + '</td>';
                cols += '<td>' + NOME_CAIXA[i] + '</td>';
                cols += '<td>' + NOME_EMPRESA[i] + '</td>';
                cols += '<td>' + NOME_MAQUINA[i] + '</td>';
                cols += '<td>' + STATUS[i] + '</td>';
                cols += '<td>' + STATUS_CAIXA[i] + '</td>';
                cols += '<td>' + USUARIO_ABERTURA[i] + '</td>';
                cols += '<td>' + DATA_ABERTURA[i] + '</td>';
                cols += '<td class="sumir">' + USUARIO_FECHAMENTO[i] + '</td>';
                cols += '<td>' + DATA_FECHAMENTO[i] + '</td>';

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

        if (selecionado[1].innerHTML !== null) {

            window.location.replace("#openModal");

            document.getElementById('nome_caixa').value = selecionado[1].innerHTML;
            document.getElementById('empresa1').value = selecionado[2].innerHTML;
            document.getElementById('maquina').value = selecionado[3].innerHTML;
            if (selecionado[4].innerHTML == "Ativo") {

                document.getElementById('status').value = document.getElementById('S').value;
            } else {

                document.getElementById('status').value = document.getElementById('N').value;
            }
            document.getElementById('status_caixa').value = selecionado[5].innerHTML;
            document.getElementById('usuario_abertura').value = selecionado[6].innerHTML;
            document.getElementById('data_abertura').value = selecionado[7].innerHTML;
            document.getElementById('usuario_fechamento').value = selecionado[8].innerHTML;
            document.getElementById('data_fechamento').value = selecionado[9].innerHTML;
            document.getElementById('id_caixa-1').value = selecionado[0].innerHTML;
        }
    });



}));

function fechamdal() {
    $('#openModal').css("display", "none");
}


function abremodal() {
    $('#openModal').css("display", "inline-block");

}