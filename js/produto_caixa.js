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
    document.getElementById('tl_fim').value = venda;
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

    } else if (tipo == "dinheiro") {
        $('#col-5').prop("disabled", true);
        $('#col-5').css("display", "none");
        $('#troco_habilitar').css("display", "block");

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
<<<<<<< HEAD

=======
>>>>>>> 0feed26c97cad30706a36746ae2dfea539f9a8d6
    if (desconto == 0) {
        document.getElementById('tl_fim').value = formatarMoeda(valor_s_d)
    } else {


        total_desc = parseFloat(valor_s_d) - parseFloat(procentagem);

        document.getElementById('tl_fim').value = formatarMoeda(total_desc);



    }

};

const round = (num, places) => {
    if (!("" + num).includes("e")) {
        return +(Math.round(num + "e+" + places) + "e-" + places);
    } else {
        let arr = ("" + num).split("e");
        let sig = ""
        if (+arr[1] + places > 0) {
            sig = "+";
        }

        return +(Math.round(+arr[0] + "e" + sig + (+arr[1] + places)) + "e-" + places);
    }
}

function chamda_troco() {
    calcula_troco();
};

function calcula_troco() {
    valor_final = document.getElementById('tl_fim').value.replace(",", ".");
    dinheiro = document.getElementById('dinheiro_1').value;
    troco = parseFloat(dinheiro - parseFloat(valor_final));
    if (parseFloat(dinheiro) >= parseFloat(valor_final)) {
        document.getElementById('troco').innerHTML = round(troco, 2);
    } else {
        document.getElementById('troco').innerHTML = "";
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
    $('#openModal5').css("display", "none");
    $('#openModal6').css("display", "none");

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

        document.location.reload();
        fechamdal();
    }
}


function fechamodal_menu() {
    $('#conteiner-1').css("display", "none");
}


function imprimir_cupom(EMPRESA, tela) {
    if (tela == "Retirada realizada com sucesso!") {

        jQuery.ajax({
            url: "back_end/busca_autocomplete.php",
            dataType: "json",
            data: {
                acao: 'busca_dados_cupom',
                parametro: EMPRESA,
            },
            success: function(data) {
                caixa = data.map(d => d.caixa);
                CNPJ = data.map(d => d.CNPJ);
                ENDERECO = data.map(d => d.ENDERECO);
                nome_empresa = data.map(d => d.nome_empresa);
                document.getElementById('empresa-91').innerHTML = nome_empresa;
                document.getElementById('caixa-91').innerHTML = 'Caixa:' + caixa;
            }



        });

        $('#conteiner').css("display", "none");
        window.location.replace("#openModal6");
        $('#openModal6').css("display", "inline-block");
        var Dados_cupom = JSON.parse(localStorage.getItem('cupom_retirada'));
        for (i = 0; i < Dados_cupom.length; i++) {
            document.getElementById('valor').innerHTML = "Valor Retirada: " + Dados_cupom[i].Valor;
            document.getElementById('Pessoa').innerHTML = "Pessoa Retirou :" + Dados_cupom[i].Pessoa;
            document.getElementById('obs').innerHTML = "Motivo Retirada :" + Dados_cupom[i].Obs;
            document.getElementById('ass').innerHTML = "Ass:" + "_______________________"
        }
        time();
        localStorage.clear();

    } else {


        jQuery.ajax({
            url: "back_end/busca_autocomplete.php",
            dataType: "json",
            data: {
                acao: 'busca_dados_cupom',
                parametro: EMPRESA,
            },
            success: function(data) {
                caixa = data.map(d => d.caixa);
                CNPJ = data.map(d => d.CNPJ);
                ENDERECO = data.map(d => d.ENDERECO);
                nome_empresa = data.map(d => d.nome_empresa);
                document.getElementById('empresa-90').innerHTML = nome_empresa;
                document.getElementById('endereco-90').innerHTML = ENDERECO;
                document.getElementById('CNPJ-90').innerHTML = 'CNPJ:' + CNPJ;
                document.getElementById('caixa-90').innerHTML = 'Caixa:' + caixa;
            }



        });


        $('#conteiner').css("display", "none");
        window.location.replace("#openModal5");
        $('#openModal5').css("display", "inline-block");
        var Dados_cupom = JSON.parse(localStorage.getItem('seção'));
        for (i = 0; i < Dados_cupom.length; i++) {
            var total = parseFloat(Dados_cupom[i].Valor) * Dados_cupom[i].quantidade;
            var newRow = $('<tr >');
            var cols = "";
            cols += '<td>' + Dados_cupom[i].Nome_produto + '</td>';
            cols += '<td>' + Dados_cupom[i].quantidade + '</td>';
            cols += '<td>' + formatarMoeda(parseFloat(Dados_cupom[i].Valor)) + '</td>';
            cols += '<td>' + formatarMoeda(total) + '</td>';



            newRow.append(cols);
            $("#products-table-90").append(newRow);

        }
        total_desc = parseFloat(Dados_cupom[0].Valor_total) - parseFloat(Dados_cupom[0].Valor_final)
        document.getElementById('Forma_pagamento').innerHTML = "Tipo Pagamento:" + Dados_cupom[0].pagamento;
        document.getElementById('Parcelas').innerHTML = "Qtd Parcelas:" + Dados_cupom[0].parcelas;
        document.getElementById('Valor').innerHTML = "Sub Total:" + Dados_cupom[0].Valor_total;
        document.getElementById('Desconto').innerHTML = "Desconto: " + formatarMoeda(total_desc);
        document.getElementById('Valor_venda').innerHTML = "Valor Total " + Dados_cupom[0].Valor_final;

        /// console.log(Dados_cupom);
        time();
        localStorage.clear();

    }
}


///var local = window.location.href = "Teste.php";



function Armazena_cupom() {
    var Cupom = new Array();
    var tabela = document.getElementById("products-table-1");
    var selecionados = tabela.getElementsByClassName("selecionado");
    for (i = 0; i < selecionados.length; i++) {

        selecionado = selecionados[i];
        selecionado = selecionado.getElementsByTagName("td");
<<<<<<< HEAD
        var newRow = $('<tr>');
        var cols = "";
        cols += '<td>' + selecionado[1].innerHTML + '</td>';
        cols += '<td>' + selecionado[3].innerHTML + '</td>';
        cols += '<td>' + selecionado[2].innerHTML + '</td>';



        newRow.append(cols);
        $("#products-table-90").append(newRow);
=======
        Cupom.push({ "Nome_produto": selecionado[1].innerHTML, "quantidade": selecionado[3].innerHTML, "Valor": selecionado[2].innerHTML, "Valor_total": document.getElementById('Valor_total').value, "Valor_final": document.getElementById('tl_fim').value, "pagamento": document.getElementById('pagamento').value, "parcelas": document.getElementById('forma_pagamento').value });
>>>>>>> 0feed26c97cad30706a36746ae2dfea539f9a8d6

        localStorage.setItem('seção', JSON.stringify(Cupom));
    }


}


function time() {
    function adicionaZero(numero) {
        if (numero <= 9)
            return "0" + numero;
        else
            return numero;
    }
    var data = new Date();
    var dia = data.getDate(); // 1-31
    var mes = data.getMonth(); // 0-11 (zero=janeiro)
    var ano4 = data.getFullYear(); // 4 dígitos
    var hora = data.getHours(); // 0-23
    var min = data.getMinutes(); // 0-59
    var seg = data.getSeconds(); // 0-59

    seg = adicionaZero(seg.toString());
    min = adicionaZero(min.toString());
    dia = adicionaZero(dia.toString());
    mes = mes + 1;
    mes = adicionaZero(mes.toString());
    var str_hora = hora + ':' + min + ':' + seg;
    var str_data = dia + '-' + (mes) + '-' + ano4;
    document.getElementById('data_cupom').innerHTML = "Data: " + str_data;
    document.getElementById('hr_cupom').innerHTML = "Hora: " + str_hora;
}


function teste() {
    var Cupom_retirada = new Array();
    Cupom_retirada.push({ "Valor": document.getElementById('Valor').value, "Pessoa": document.getElementById('nome').value, "Obs": document.getElementById('observacao').value })
    localStorage.setItem('cupom_retirada', JSON.stringify(Cupom_retirada));


}