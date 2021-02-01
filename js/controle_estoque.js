function busca_produto(teste) {
    t1 = "";
    t2 = "";
    valor = 0;
    qtd_pro = 0;
    qtd_total = 0;
    existe_valor = -1;
    selecionado = '';
    total_u = 0;
    total = 0;
    resultado = 0;
    quantidade_entrada = 0;
    quantidade_saida = 0;
    qtd = document.getElementById("quantidade").value;
    tipo = document.getElementById("tipo").value;
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
            var html = " <div class='deleteSearch'  onclick='excluirlinha(" + id + "," + tipo + ")'> <img src='imagens/icons8_delete_bin_48px.png'></img>  </div>   ";

            for (i = 0; i < data.length; i++) {
                teste = id[i];
                var newRow = $('<tr class = "corpo selecionado" id="testee' + id + tipo + '">');
                var cols = "";
                cols += '<td>' + id[i] + '</td>';
                cols += '<td>' + NOME[i] + '</td>';
                cols += '<td>' + qtd + '</td>';
                cols += '<td>' + tipo + '</td>';
                cols += '<td>' + html + '</td>';
                var tabela = document.getElementById("products-table-1");
                var selecionados = tabela.getElementsByClassName("selecionado");
                //console.log(selecionados.length);
                //Verificar se está selecionado
                if (selecionados.length == 0) {
                    newRow.append(cols);
                    $("#products-table-1").append(newRow);
                    qtd_pro = qtd_pro + 1;
                } else {
                    qtd_pro = 1;
                    for (var j = 0; j < selecionados.length; j++) {
                        qtd_pro = qtd_pro + 1;
                        selecionado = selecionados[j];
                        selecionado = selecionado.getElementsByTagName("td");
                        if (selecionado[0].innerHTML == teste && selecionado[3].innerHTML == tipo) {
                            qtd_pro = qtd_pro - 1;
                            existe_valor = j;
                        }
                    }
                    if (existe_valor > -1) {
                        selecionado = selecionados[existe_valor];
                        selecionado = selecionado.getElementsByTagName("td");
                        valor = selecionado[2].innerHTML;
                        resultado = parseFloat(valor) + parseFloat(qtd);
                        selecionado[2].innerHTML = resultado;
                    } else {
                        newRow.append(cols);
                        $("#products-table-1").append(newRow);
                    }
                }
                for (var j = 0; j < selecionados.length; j++) {
                    selecionado = selecionados[j];
                    selecionado = selecionado.getElementsByTagName("td");
                    if (selecionado[3].innerHTML == "Entrada") {
                        quantidade_entrada = quantidade_entrada + parseFloat(selecionado[2].innerHTML);
                        document.getElementById("itens_entrada").value = quantidade_entrada;
                    } else {
                        quantidade_saida = quantidade_saida + parseFloat(selecionado[2].innerHTML);
                        document.getElementById("itens_saida").value = quantidade_saida;
                    }
                }
            }



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

function excluirlinha(id, tipo) {
    //console.log(document.querySelector("tbody tr"));
    a = 'testee' + id + tipo.value;
    selecionado = document.getElementById(a);
    selecionados = selecionado.getElementsByTagName("td");
    quantidade = selecionados[2].innerHTML;
    itens_entrada = document.getElementById("itens_entrada").value;
    itens_saida = document.getElementById("itens_saida").value;
    document.getElementById(a).remove();

    if (selecionados[3].innerHTML == "Entrada") {
        total_itens_entrada = parseFloat(itens_entrada) - parseFloat(quantidade);
        document.getElementById("itens_entrada").value = total_itens_entrada;

    } else {
        total_itens_saida = parseFloat(itens_saida) - parseFloat(quantidade);
        document.getElementById("itens_saida").value = total_itens_saida;
    }

}



function openConfirmacao(tipo) {
    $('#conteiner').css("display", "flex");
    if (tipo == "excluir") {
        $('#Texto').html("Deseja Cancelar Movimento?");
        return false;
    }
    if (tipo == "confirma") {
        $('#Texto').html("Deseja Salvar esse Movimento?");
        return false;
    }
}

function openConfirmaE() {
    $('#conteiner').css("display", "flex");
    $('#Texto').html("Salvo com sucesso");
    return false;
}


function confirma() {
    var texto = document.getElementById("Texto").innerHTML;
    if (texto == "Deseja Salvar esse Movimento?") {
        $('#conteiner').css("display", "none");
        finalizar_movimento();
        document.location.reload();
        $('#conteiner').css("display", "flex");
        $('#Texto').html("Salvo com sucesso");
        return false;

    } else if (texto == "Deseja Cancelar Movimento?") {
        document.location.reload();
        fechamdal();
    }

}


function fechamodal_menu() {
    $('#conteiner-1').css("display", "none");
}


function finalizar_movimento() {
    var dados = new Array();
    var tabela = document.getElementById("products-table-1");
    var selecionados = tabela.getElementsByClassName("selecionado");
    for (i = 0; i < selecionados.length; i++) {

        selecionado = selecionados[i];
        selecionado = selecionado.getElementsByTagName("td");
        dados.push({ "id_produto": selecionado[0].innerHTML, "quantidade": selecionado[2].innerHTML, "tipo_movimento": selecionado[3].innerHTML });
    }
    jQuery.ajax({
        url: "back_end/estoque.php",
        async: false,
        type: "POST",
        data: { dados: JSON.stringify(dados) },
        dataType: "json",
        success: function(data) {
            console.log(data);
        }
    });

}