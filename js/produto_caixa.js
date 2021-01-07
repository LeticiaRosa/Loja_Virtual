function busca_produto() {
    t1 = "";
    t2 = "";
    $.ajax({
        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'CAIXA',
            parametro: $('#codigo').val()
        },
        success: function(data) {
            id = data.map(d => d.ID_PRODUTO);
            NOME = data.map(d => d.NOME);
            PRECO_VENDA = data.map(d => d.PRECO_VENDA);

            for (i = 0; i < data.length; i++) {
                teste = id[i]
                var newRow = $('<tr class = "corpo selecionado" >');
                var cols = "";
                cols += '<td>' + id[i] + '</td>';
                cols += '<td>' + NOME[i] + '</td>';
                cols += '<td>' + PRECO_VENDA[i] + '</td>';
                cols += '<td>' + 1 + '</td>';
                var tabela = document.getElementById("products-table");
                var selecionados = tabela.getElementsByClassName("selecionado");
                //console.log(selecionados.length);
                //Verificar se está selecionado
                if (selecionados.length == 0) {
                    newRow.append(cols);
                    $("#products-table").append(newRow);
                } else {
                    for (var j = 0; j < selecionados.length; j++) {

                        var selecionado = selecionados[j]
                        selecionado = selecionado.getElementsByTagName("td");
                        selecionado[0].innerHTML
                        t2 = selecionado[3].innerHTML; //quantidade
                        console.log(selecionado[0].innerHTML);
                        console.log(t2);
                        if (selecionado[0].innerHTML == teste) {
                            selecionado[3].value = t2 + 1;
                        }
                    }
                    /*
                                        if (selecionado[0].innerHTML == teste) {
                                            selecionado[3].innerHTML = selecionado[3].innerHTML + 1;
                                        } else {
                                            newRow.append(cols);
                                            $("#products-table").append(newRow);
                                        }*/

                }


            }

        }
    });
    $(document).ready(function() {
        document.getElementById('codigo').value = "";


    });


};

$(window).on("load", (function() {
    document.getElementById('codigo').focus();
}));