$(async function() {
    // Atribui evento e função para limpeza dos campos
    // $('#clicar').on('input', limpaCampos);
    empresa = document.getElementById('id_empresa').value;
    await $.ajax({
        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'caixa_produto',
            parametro: empresa,
        },
        success: function(data) {
            id = data.map(d => d.id_produto);
            nome = data.map(d => d.nome);
            descricao = data.map(d => d.descricao);
            preco_venda = data.map(d => d.preco_venda);
            quantidade = data.map(d => d.quantidade);
            marca = data.map(d => d.marca);
            unidade_medida = data.map(d => d.unidade_medida);
            valor_medida = data.map(d => d.valor_medida);
            codigo_barras = data.map(d => d.codigo_barras);


            for (i = 0; i < data.length; i++) {
                var newRow = $('<tr class = "corpo" >');
                var cols = "";
                cols += '<td>' + id[i] + '</td>';
                cols += '<td>' + nome[i] + '</td>';
                cols += '<td class="sumir">' + descricao[i] + '</td>';
                cols += '<td>' + preco_venda[i] + '</td>';
                cols += '<td>' + quantidade[i] + '</td>';
                cols += '<td class="sumir1">' + marca[i] + '</td>';
                cols += '<td class="sumir">' + unidade_medida[i] + '</td>';
                cols += '<td class="sumir">' + valor_medida[i] + '</td>';
                cols += '<td >' + codigo_barras[i] + '</td>';

                newRow.append(cols);
                $("#products-table").append(newRow);

            }

        }
    });
    $(document).ready(function() {
        $('#products-table').dataTable({
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
                "Search": "Empresa",
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

    var btnVisualizar = document.getElementById("visualizarDados-1");
    btnVisualizar.addEventListener("click", function() {
        var selecionados = tabela.getElementsByClassName("selecionado");
        //Verificar se está selecionado
        for (var i = 0; i < selecionados.length; i++) {
            var selecionado = selecionados[i];
            selecionado = selecionado.getElementsByTagName("td");
        }
        document.getElementById('produto').value = selecionado[1].innerHTML;
        document.getElementById('codigo').value = parseFloat(selecionado[8].innerHTML);
        document.getElementById('quantidade').focus();
        $('#openModal').css("display", "none");
    });

}));


function fechamdal() {
    $('#openModal').css("display", "none");
}


function abremodal() {
    $('#openModal').css("display", "inline-block");

}

function fechamodal_menu() {
    $('#conteiner-1').css("display", "none");
}