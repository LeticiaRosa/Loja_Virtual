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
    qtd = document.getElementById("quantidade").value;

    if (qtd == "") {
        qtd = 1;
    }

    $.ajax({
        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'CAIXA',
            parametro: $('#codigo').val(),
            sessao: teste
        },
        success: function(data) {
            id = data.map(d => d.ID_PRODUTO);
            NOME = data.map(d => d.NOME);
            PRECO_VENDA = data.map(d => d.PRECO_VENDA);
            //
            var html = " <div class='deleteSearch'  onclick='excluirlinha(" + id + ")'> <img src='imagens/icons8_delete_bin_48px.png'></img>  </div>   ";



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
    });

    $(document).ready(function() {
        document.getElementById('codigo').value = "";
        document.getElementById('produto').value = "";
        document.getElementById('quantidade').value = "";
        document.getElementById('codigo').focus();
    });



};

$(window).on("load", (function() {
    document.getElementById('codigo').focus();
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
    $("#openModal").load("Tela_visualizar_produto_CAIXA.php");

}

function Vendedor() {
    $('#openModal1').css("display", "inline-block");
    window.location.replace("#openModal1");
    $("#openModal1").load("tele_pesq_vendedor_CAIXA.php");

}

function cliente() {
    $('#openModal2').css("display", "inline-block");
    window.location.replace("#openModal2");
    $("#openModal2").load("tela_pesq_cliente.php");

}

function retirada() {
    $('#openModal3').css("display", "inline-block");
    window.location.replace("#openModal3");
    $("#openModal3").load("tela_retirada.php");

}

function finalizar_venda() {
    $('#openModal4').css("display", "inline-block");
    window.location.replace("#openModal4");
    itens = document.getElementById('itens').value;
    venda = document.getElementById('venda').value;
    cliente = document.getElementById('cliente').value;
    Vendedor = document.getElementById('Vendedor').value;

    document.getElementById('Vendedo').value = Vendedor;
    document.getElementById('Cliente').value = cliente;
    document.getElementById('total_itens').value = itens;
    document.getElementById('Valor_total').value = venda;
    document.getElementById('tl_fim').value = venda;;
    document.getElementById('desconto').value = 0;
    var dados = new Array();
    var tabela = document.getElementById("products-table-1");
    var selecionados = tabela.getElementsByClassName("selecionado");
    for (i = 0; i < selecionados.length; i++) {

        selecionado = selecionados[i];
        selecionado = selecionado.getElementsByTagName("td");
        dados.push({ "id_produto": selecionado[0].innerHTML, "quantidade": selecionado[3].innerHTML });

        var newRow = $('<tr class="corpo2">');
        var cols = "";
        cols += '<td>' + selecionado[0].innerHTML + '</td>';
        cols += '<td>' + selecionado[1].innerHTML + '</td>';
        cols += '<td>' + selecionado[2].innerHTML + '</td>';
        cols += '<td>' + selecionado[3].innerHTML + '</td>';
        newRow.append(cols);
        $("#products-table-8").append(newRow);
    }
    jQuery.ajax({
        url: "back_end/caixa.php",
        type: "POST",
        data: { dados: JSON.stringify(dados) },
        dataType: "json",
        success: function(data) {

        }



    });
}

$('#col-5').prop("disabled", true);
$('#col-5').css("display", "none");

$('#pagamento').on('change', function() {
    var select = document.getElementById('pagamento');
    var tipo = select.options[select.selectedIndex].value
    if (tipo == "credito") {
        $('#col-5').prop("disabled", false);
        $('#forma_pagamento').attr("required", true);
        $('#col-5').css("display", "block");

    } else if (tipo != "credito") {
        $('#col-5').prop("disabled", true);
        $('#col-5').css("display", "none");
    }
});


function chamda() {
    cal();
};

function cal() {
    valor_s_d = document.getElementById('Valor_total').value.replace(".", "");
    desconto = document.getElementById('desconto').value;

    procentagem = parseFloat(valor_s_d) * parseFloat(desconto) / 100;
    console.log(procentagem);
    if (desconto == 0) {
        document.getElementById('tl_fim').value = formatarMoeda(valor_s_d)
    } else {
        console.log(valor_s_d);

        total_desc = parseFloat(valor_s_d) - parseFloat(procentagem);

        document.getElementById('tl_fim').value = formatarMoeda(total_desc);
    }
};

function fecha() {
    $('#openModal').css("display", "none");
    $('#openModal1').css("display", "none");
    $('#openModal2').css("display", "none");
    $('#openModal3').css("display", "none");
    $('#openModal4').css("display", "none");
    document.getElementById('codigo').focus();

};

function tiralinha() {
    var linhas = document.getElementById("products-table-8").rows;

    for (i = linhas.length - 1; i >= 1; i--) {
        document.getElementById("products-table-8").deleteRow(i);
    }
}

function fechamdal() {

    $('#openModal').css("display", "none");
    $('#openModal1').css("display", "none");
    $('#openModal2').css("display", "none");
    $('#openModal3').css("display", "none");
    $('#openModal4').css("display", "none");
    document.getElementById('codigo').focus();
}



function abremodal() {
    $('#openModal').css("display", "inline-block");

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



function openConfirmacao(tipo) {

    $('#conteiner').css("display", "flex");
    if (tipo == "excluir") {
        $('#Texto').html("Deseja Cancelar Venda?");
        return false;
    }


}


function confirma() {
    var texto = document.getElementById("Texto").innerHTML;
    if (texto != "Deseja Cancelar Venda?") {
        fechamodal();
    } else if (texto == "Deseja Cancelar Venda?") {
        console.log("entrou");
        document.location.reload();
        fechamdal();
    }
}

/*
window.onload = function() {

    $.ajax({
        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'BUSCA_CAIXA_ABERTO'
        },
        success: function(data) {
            console.log(data);
        }
    });

    var select = document.getElementById('pega').value;
    console.log(select);
    if (select == "Caixa precisa estar aberto para efetuar vendas!") {
        $('#conteiner').css("display", "flex");
        return false;

    } else if (select == "Erro ao abrir caixa!") {
        $('#conteiner').css("display", "flex");
        return false;
    } else {

        return true;
    }


}
*/