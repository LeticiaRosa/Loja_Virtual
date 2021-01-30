$(window).on("load", (function() {
    document.getElementById('codigo1').focus();
}));

function formatarMoeda(moeda) {
    atual = moeda
    var f2 = atual.toLocaleString('pt-br', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });

    //console.log(f2);
    return f2;
}

function produto() {
    window.location.replace("#openModal");
    abremodal();
    $("#openModal").load("Tela_selec_prod.php");

}

function produto_saida() {
    window.location.replace("#openModal");
    abremodal();
    $("#openModal").load("Tela_selec_prod_saida.php");

}

function abremodal() {
    $('#openModal').css("display", "inline-block");

}

function busca_produto_saida(teste) {
    t1 = "";
    t2 = "";
    valor = 0;
    qtd_pro = 0;
    existe_valor = -1;
    selecionado = '';
    total_u = 0;
    total = 0;
    resultado = 0;
    qtd = document.getElementById("Quantidade-saida").value;

    if (qtd == "") {
        qtd = 1;
    }

    $.ajax({
        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'CAIXA',
            parametro: $('#nome-saida').val(),
            sessao: teste
        },
        success: function(data) {
            id = data.map(d => d.ID_PRODUTO);
            NOME = data.map(d => d.NOME);
            PRECO_VENDA = data.map(d => d.PRECO_VENDA);
            //
            var html = " <div class='deleteSearch'  onclick='excluirlinha_saida(" + id + ")'> <img src='imagens/icons8_delete_bin_48px.png'></img>  </div>   ";

            if (data.length > 0) {

                for (i = 0; i < data.length; i++) {
                    teste = id[i];
                    var newRow = $('<tr class = "corpo selecionado" id="teste' + id + '">');
                    var cols = "";
                    cols += '<td>' + id[i] + '</td>';
                    cols += '<td>' + NOME[i] + '</td>';
                    cols += '<td>' + PRECO_VENDA[i] + '</td>';
                    cols += '<td>' + qtd + '</td>';
                    cols += '<td>' + html + '</td>';
                    var tabela = document.getElementById("products-table-2");
                    var selecionados = tabela.getElementsByClassName("selecionado");
                    //console.log(selecionados.length);
                    //Verificar se está selecionado
                    if (selecionados.length == 0) {
                        newRow.append(cols);
                        $("#products-table-2").append(newRow);
                        qtd_pro = qtd_pro + 1;
                        //console.log(qtd_pro);
                    } else {
                        qtd_pro = 1;
                        for (var j = 0; j < selecionados.length; j++) {
                            qtd_pro = qtd_pro + 1;

                            selecionado = selecionados[j];
                            selecionado = selecionado.getElementsByTagName("td");
                            if (selecionado[0].innerHTML == teste) {
                                qtd_pro = qtd_pro - 1;
                                existe_valor = j;

                            }

                        }
                        if (existe_valor > -1) {
                            selecionado = selecionados[existe_valor];
                            selecionado = selecionado.getElementsByTagName("td");
                            valor = selecionado[3].innerHTML;
                            resultado = parseFloat(valor) + parseFloat(qtd);
                            selecionado[3].innerHTML = resultado;

                        } else {
                            newRow.append(cols);

                            $("#products-table-2").append(newRow);
                        }



                    }
                    for (var j = 0; j < selecionados.length; j++) {

                        selecionado = selecionados[j];
                        selecionado = selecionado.getElementsByTagName("td");
                        //console.log(parseFloat(selecionado[2].innerHTML));
                        total_u = total_u + parseFloat(selecionado[2].innerHTML) * parseFloat(selecionado[3].innerHTML);
                    }
                    // console.log(total_u);
                }
                document.getElementById("itens-saida").value = qtd_pro;

                document.getElementById("venda-saida").value = formatarMoeda(total_u);
            }
        }
    });

    $(document).ready(function() {
        document.getElementById('nome-saida').value = "";
        document.getElementById('produto-saida').value = "";
        document.getElementById('Quantidade-saida').value = "";
        document.getElementById('nome-saida').focus();
    });



};


function busca_produto(teste) {
    t1 = "";
    t2 = "";
    valor = 0;
    qtd_pro = 0;
    existe_valor = -1;
    selecionado = '';
    total_u = 0;
    total = 0;
    resultado = 0;
    qtd = document.getElementById("Quantidade").value;

    if (qtd == "") {
        qtd = 1;
    }

    $.ajax({
        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'CAIXA',
            parametro: $('#codigo1').val(),
            sessao: teste
        },
        success: function(data) {
            id = data.map(d => d.ID_PRODUTO);
            NOME = data.map(d => d.NOME);
            PRECO_VENDA = data.map(d => d.PRECO_VENDA);
            //
            var html = " <div class='deleteSearch'  onclick='excluirlinha(" + id + ")'> <img src='imagens/icons8_delete_bin_48px.png'></img>  </div>   ";

            if (data.length > 0) {

                for (i = 0; i < data.length; i++) {
                    teste = id[i];
                    var newRow = $('<tr class = "corpo selecionado" id="testee' + id + '">');
                    var cols = "";
                    cols += '<td>' + id[i] + '</td>';
                    cols += '<td>' + NOME[i] + '</td>';
                    cols += '<td>' + PRECO_VENDA[i] + '</td>';
                    cols += '<td>' + qtd + '</td>';
                    cols += '<td>' + html + '</td>';
                    var tabela = document.getElementById("products-table-1");
                    var selecionados = tabela.getElementsByClassName("selecionado");
                    //console.log(selecionados.length);
                    //Verificar se está selecionado
                    if (selecionados.length == 0) {
                        newRow.append(cols);
                        $("#products-table-1").append(newRow);
                        qtd_pro = qtd_pro + 1;
                        //console.log(qtd_pro);
                    } else {
                        qtd_pro = 1;
                        for (var j = 0; j < selecionados.length; j++) {
                            qtd_pro = qtd_pro + 1;

                            selecionado = selecionados[j];
                            selecionado = selecionado.getElementsByTagName("td");
                            if (selecionado[0].innerHTML == teste) {
                                qtd_pro = qtd_pro - 1;
                                existe_valor = j;

                            }

                        }
                        if (existe_valor > -1) {
                            selecionado = selecionados[existe_valor];
                            selecionado = selecionado.getElementsByTagName("td");
                            valor = selecionado[3].innerHTML;
                            resultado = parseFloat(valor) + parseFloat(qtd);
                            selecionado[3].innerHTML = resultado;

                        } else {
                            newRow.append(cols);

                            $("#products-table-1").append(newRow);
                        }



                    }
                    for (var j = 0; j < selecionados.length; j++) {

                        selecionado = selecionados[j];
                        selecionado = selecionado.getElementsByTagName("td");
                        //console.log(parseFloat(selecionado[2].innerHTML));
                        total_u = total_u + parseFloat(selecionado[2].innerHTML) * parseFloat(selecionado[3].innerHTML);
                    }
                    // console.log(total_u);
                }
                document.getElementById("itens").value = qtd_pro;

                document.getElementById("venda").value = formatarMoeda(total_u);
            }
        }
    });

    $(document).ready(function() {
        document.getElementById('codigo1').value = "";
        document.getElementById('produto2').value = "";
        document.getElementById('Quantidade').value = "";
        document.getElementById('codigo1').focus();
    });



};


function fechamdal() {

    $('#openModal').css("display", "none");
    document.getElementById('codigo1').focus();
}


function fechamodal() {
    $('#conteiner-1').css("display", "none");

}

function confirma() {
    $('#conteiner').css("display", "none");
}

function excluirlinha(id) {
    //console.log(document.querySelector("tbody tr"));
    a = 'testee' + id;
    selecionado = document.getElementById(a);
    selecionados = selecionado.getElementsByTagName("td");
    quantidade = selecionados[3].innerHTML;
    preco_venda = selecionados[2].innerHTML;
    valor_diminuir = parseFloat(quantidade) * parseFloat(preco_venda);
    caixa = document.getElementById('venda').value;
    valor_caixa = parseFloat(caixa) - valor_diminuir;
    if (Number.isNaN(valor_caixa)) {
        document.getElementById('venda').value = '0'
    } else {
        document.getElementById('venda').value = formatarMoeda(valor_caixa);
    }
    itens = document.getElementById("itens").value;
    total_itens = itens - 1;
    document.getElementById("itens").value = total_itens;
    document.getElementById(a).remove();


}



function excluirlinha_saida(id) {
    //console.log(document.querySelector("tbody tr"));
    a = 'teste' + id;
    selecionado = document.getElementById(a);
    selecionados = selecionado.getElementsByTagName("td");
    quantidade = selecionados[3].innerHTML;
    preco_venda = selecionados[2].innerHTML;
    valor_diminuir = parseFloat(quantidade) * parseFloat(preco_venda);
    caixa = document.getElementById('venda-saida').value;
    valor_caixa = parseFloat(caixa) - valor_diminuir;
    if (Number.isNaN(valor_caixa)) {
        document.getElementById('venda-saida').value = '0'
    } else {
        document.getElementById('venda-saida').value = formatarMoeda(valor_caixa);
    }
    itens = document.getElementById("itens-saida").value;
    total_itens = itens - 1;
    document.getElementById("itens-saida").value = total_itens;
    document.getElementById(a).remove();


}


window.onkeyup = function chamda() {
    cal();
};

window.onclick = function chamda() {
    cal();
};

function cal() {
    tl_fim = document.getElementById('tl_fim').value;
    valor_entreda = document.getElementById('venda').value.replace(".", "");
    valor_saida = document.getElementById('venda-saida').value.replace(".", "");
    if (valor_entreda != "" && valor_saida != "") {
        tl = parseFloat(valor_saida) - parseFloat(valor_entreda);
    } else if (valor_entreda != "" && valor_saida == "") {
        tl = parseFloat(valor_entreda) * (-1);

    } else {
        tl = parseFloat(valor_saida);
    }


    if (tl >= 0) {
        document.getElementById('tl_fim').value = formatarMoeda(tl);
        document.getElementById('tl_fim').style.border = "none";
        document.getElementById('img_alter').style.display = 'none';

    } else if (Number.isNaN(tl)) {
        document.getElementById('tl_fim').value = formatarMoeda(0);

    } else if (tl < 0) {
        document.getElementById('img_alter').style.display = 'block';
        document.getElementById('tl_fim').style.border = "1px solid red";
        document.getElementById('tl_fim').value = formatarMoeda(tl);
    } else {

        document.getElementById('tl_fim').value = 0;
    }
};


function aletar_val() {
    document.getElementById('mensagem-alter').style.display = 'block';


}

function Remove_alert() {
    document.getElementById('mensagem-alter').style.display = 'none';
}



$('#pagamento').on('change', function() {
    var select = document.getElementById('pagamento');
    var tipo = select.options[select.selectedIndex].value
    document.getElementById('pagamento').style.border = "none";
    if (tipo == "credito") {
        $('#col-5').prop("disabled", false);
        $('#forma_pagamento').attr("required", true);
        $('#col-5').css("display", "block");

    } else if (tipo != "credito") {
        $('#col-5').prop("disabled", true);
        $('#col-5').css("display", "none");
    }
});

$('#forma_pagamento').on('change', function() {
    document.getElementById('forma_pagamento').style.border = "none";
});



function finaliza_troca() {

    var dados_entrou = new Array();
    var tabela = document.getElementById("products-table-1");
    var selecionados = tabela.getElementsByClassName("selecionado");
    for (i = 0; i < selecionados.length; i++) {

        selecionado = selecionados[i];
        selecionado = selecionado.getElementsByTagName("td");
        dados_entrou.push({ "id_produto": selecionado[0].innerHTML, "quantidade": selecionado[3].innerHTML });

    }
    /// console.log(dados_entrou);

    var dados_saiu = new Array();
    var tabela = document.getElementById("products-table-2");
    var selecionados = tabela.getElementsByClassName("selecionado");
    for (i = 0; i < selecionados.length; i++) {

        selecionado = selecionados[i];
        selecionado = selecionado.getElementsByTagName("td");
        dados_saiu.push({ "id_produto": selecionado[0].innerHTML, "quantidade": selecionado[3].innerHTML });

    }
    jQuery.ajax({
        url: "back_end/id_troca.php",
        type: "POST",
        data: { dados_entrou: JSON.stringify(dados_entrou), dados_saiu: JSON.stringify(dados_saiu) },
        dataType: "json",
        success: function(data) {

        }




    });
    valor = document.getElementById('tl_fim').value;
    if (parseFloat(valor) < 0) {
        document.getElementById('Texto').innerHTML = "Troca Não pode ser finalizada Devido ao Valor da Devolução ser maior ao Valor Saida";
        document.getElementById('conteiner').style.display = 'flex';
        return false;
    } else {
        var select = document.getElementById('pagamento');
        var tipo = select.options[select.selectedIndex].value
        var pag_selec = document.getElementById('forma_pagamento');
        var value_selec = pag_selec.options[select.selectedIndex].value
        if (tipo == "") {
            document.getElementById('Texto').innerHTML = "Gentileza informar a forma de Pagamento!";
            document.getElementById('conteiner').style.display = 'flex';
            document.getElementById('pagamento').focus();
            document.getElementById('pagamento').style.border = "1px solid red";

        } else if (tipo == "credito" && value_selec == "") {
            document.getElementById('Texto').innerHTML = "Para  pagamento em Cartão de Credito e necessario selecionar as parcelas!";
            document.getElementById('conteiner').style.display = 'flex';
            document.getElementById('forma_pagamento').focus();
            document.getElementById('forma_pagamento').style.border = "1px solid red";
        } else {

            return true;
        }

    }



}