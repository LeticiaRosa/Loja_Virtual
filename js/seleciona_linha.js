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

                cols += '<td>' + nome[i] + '</td>';
                cols += '<td class="sumir">' + descricao[i] + '</td>';
                cols += '<td>' + NOME_CATEGORIA[i] + '</td>';
                cols += '<td>' + NOME_SUB_CATEGORIA[i] + '</td>';
                cols += '<td>' + preco_venda[i] + '</td>';
                cols += '<td class = "sumir2">' + preco_custo[i] + '</td>';
                cols += '<td class = "sumir2">' + quantidade[i] + '</td>';
                cols += '<td class="sumir1">' + FORNECEDOR[i] + '</td>';
                cols += '<td class="sumir1">' + marca[i] + '</td>';
                cols += '<td class="sumir">' + unidade_medida[i] + '</td>';
                cols += '<td class="sumir">' + valor_medida[i] + '</td>';




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
        var selecionados = tabela.getElementsByClassName("selecionado");
        //Verificar se está selecionado

        for (var i = 0; i < selecionados.length; i++) {
            var selecionado = selecionados[i];
            selecionado = selecionado.getElementsByTagName("td");
        }

        if (selecionado[1].innerHTML !== null) {
            window.location.replace("#openModal");
            /* document.getElementById('id').value = selecionado[0].innerHTML; */
            document.getElementById('nome').value = selecionado[1].innerHTML;
            document.getElementById('descricao').value = selecionado[2].innerHTML;
            document.getElementById('id_categoria').value = selecionado[3].innerHTML;
            document.getElementById('id_sub_categoria').value = selecionado[4].innerHTML;
            document.getElementById('preco_venda').value = selecionado[5].innerHTML;
            document.getElementById('preco_custo').value = selecionado[6].innerHTML;
            document.getElementById('quantidade').value = selecionado[7].innerHTML;
            document.getElementById('id_fornecedor').value = selecionado[8].innerHTML;
            document.getElementById('marca').value = selecionado[9].innerHTML;
            document.getElementById('unidade_medida').value = selecionado[10].innerHTML;
            /*document.getElementById('valor_medida').value = selecionado[11].innerHTML;
            document.getElementById('observacao').value = selecionado[11].innerHTML;*/
            /*document.getElementById('gerar_codigo-1').value = selecionado[15].innerHTML;

            if (selecionado[0].innerHTML !== selecionado[15].innerHTML) {
                document.getElementById('radio-2').checked = true;
            } else {
                document.getElementById('radio-1').checked = true;
            }*/
        }
    });

    function fechamodal() {
        $('#modal').css("display", "none");
    }


}));