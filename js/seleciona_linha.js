$(window).on("load", $(async function() {
    // Atribui evento e função para limpeza dos campos
    // $('#clicar').on('input', limpaCampos);

    await $.ajax({
        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'produto'
        },
        success: function(data) {
            id = data.map(d => d.id_produto);
            nome = data.map(d => d.nome);
            descricao = data.map(d => d.descricao);
            empresa = data.map(d => d.empresa);
            NOME_CATEGORIA = data.map(d => d.NOME_CATEGORIA);
            NOME_SUB_CATEGORIA = data.map(d => d.NOME_SUB_CATEGORIA);
            preco_venda = data.map(d => d.preco_venda);
            preco_custo = data.map(d => d.preco_custo);
            quantidade = data.map(d => d.quantidade);
            FORNECEDOR = data.map(d => d.FORNECEDOR);
            marca = data.map(d => d.marca);
            unidade_medida = data.map(d => d.unidade_medida);
            valor_medida = data.map(d => d.valor_medida);
            observacao = data.map(d => d.observacao);
            USUARIO = data.map(d => d.USUARIO);
            data_cadastro = data.map(d => d.data_cadastro);
            codigo_barras = data.map(d => d.codigo_barras);


            for (i = 0; i < data.length; i++) {
                var newRow = $('<tr class = "corpo" >');
                var cols = "";
                cols += '<td class= "sumir-sempre">' + id[i] + '</td>';
                cols += '<td>' + nome[i] + '</td>';
                cols += '<td class="sumir">' + descricao[i] + '</td>';
                cols += '<td>' + empresa[i] + '</td>';
                cols += '<td class="sumir2">' + NOME_CATEGORIA[i] + '</td>';
                cols += '<td class="sumir2">' + NOME_SUB_CATEGORIA[i] + '</td>';
                cols += '<td>' + preco_venda[i] + '</td>';
                cols += '<td>' + preco_custo[i] + '</td>';
                cols += '<td>' + quantidade[i] + '</td>';
                cols += '<td class="sumir1">' + FORNECEDOR[i] + '</td>';
                cols += '<td class="sumir1">' + marca[i] + '</td>';
                cols += '<td class="sumir">' + unidade_medida[i] + '</td>';
                cols += '<td class="sumir">' + valor_medida[i] + '</td>';
                cols += '<td class="sumir-sempre">' + observacao[i] + '</td>';
                cols += '<td class="sumir-sempre">' + codigo_barras[i] + '</td>';


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
}));


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
            console.log(selecionado);
        }





        window.location.replace("#openModal");
        $("#openModal").load("Tela_alterar_produto.php?id=" + selecionado[0].innerHTML);
    });


}));


function fechamdal() {
    $('#openModal').css("display", "none");
}


function abremodal() {
    $('#openModal').css("display", "inline-block");

}