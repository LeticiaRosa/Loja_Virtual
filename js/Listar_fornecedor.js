$(async function() {
    // Atribui evento e função para limpeza dos campos
    // $('#clicar').on('input', limpaCampos);

    await $.ajax({
        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'lista_fornecedor'
        },
        success: function(data) {
            id = data.map(d => d.ID_FORNECEDOR);
            nome = data.map(d => d.nome);
            RAZAO_SOCIAL = data.map(d => d.RAZAO_SOCIAL);
            STATUS = data.map(d => d.Status);
            contato = data.map(d => d.contato);
            CNPJ = data.map(d => d.CNPJ);
            CELULAR = data.map(d => d.CELULAR);
            fixo = data.map(d => d.fixo);
            Endereco = data.map(d => d.Endereco);
            CEP = data.map(d => d.CEP);
            E_MAIL = data.map(d => d.E_MAIL);
            Observacao = data.map(d => d.Observacao);
            Nome_usuario = data.map(d => d.Nome_usuario);
            data_cadastro = data.map(d => d.data_cadastro);
            for (i = 0; i < data.length; i++) {
                var newRow = $('<tr class = "corpo" >');
                var cols = "";
                cols += '<td class="sumir_sempre">' + id[i] + '</td>';
                cols += '<td>' + nome[i] + '</td>';
                cols += '<td>' + RAZAO_SOCIAL[i] + '</td>';
                cols += '<td>' + STATUS[i] + '</td>';
                cols += '<td>' + contato[i] + '</td>';
                cols += '<td>' + CNPJ[i] + '</td>';
                cols += '<td>' + CELULAR[i] + '</td>';
                cols += '<td>' + fixo[i] + '</td>';
                cols += '<td>' + Endereco[i] + '</td>';
                cols += '<td>' + E_MAIL[i] + '</td>';
                cols += '<td class="sumir">' + CEP[i] + '</td>';
                cols += '<td class="sumir">' + Observacao[i] + '</td>';
                cols += '<td>' + Nome_usuario[i] + '</td>';
                cols += '<td class="sumir">' + data_cadastro[i] + '</td>';

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
            document.getElementById('id_fornecedor').value = selecionado[0].innerHTML;
            document.getElementById('nome').value = selecionado[1].innerHTML;
            document.getElementById('Razao_Social').value = selecionado[2].innerHTML;
            if (selecionado[3].innerHTML == "Disponível") {

                document.getElementById('status').value = document.getElementById('S').value;
            } else {

                document.getElementById('status').value = document.getElementById('N').value;
            }
            document.getElementById('Contato').value = selecionado[4].innerHTML;
            document.getElementById('CNPJ').value = selecionado[5].innerHTML;
            document.getElementById('celular').value = selecionado[6].innerHTML;
            document.getElementById('fixo').value = selecionado[7].innerHTML;
            document.getElementById('endereco').value = selecionado[8].innerHTML;
            document.getElementById('E-MAIL').value = selecionado[9].innerHTML;
            document.getElementById('CEP').value = selecionado[10].innerHTML;
            document.getElementById('observacao').value = selecionado[11].innerHTML;


        }
    });



}));

function fechamdal() {
    console.log("fechou");
    $('#openModal').css("display", "none");
}


function abremodal() {
    $('#openModal').css("display", "inline-block");

}