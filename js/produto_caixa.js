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
            document.getElementById("venda").value = "R$ " + total_u;
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









function fecha() {
    $('#openModal').css("display", "none");
    $('#openModal1').css("display", "none");
    $('#openModal2').css("display", "none");
    $('#openModal3').css("display", "none");
    document.getElementById('codigo').focus();

};

function fechamdal() {
    $('#openModal').css("display", "none");
    $('#openModal1').css("display", "none");
    $('#openModal2').css("display", "none");
    $('#openModal3').css("display", "none");
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
    valor_caixa = parseFloat(parseFloat(caixa.substr(3)) - valor_diminuir);
    if (Number.isNaN(valor_caixa)) {
        document.getElementById('venda').value = '0'
    } else {
        document.getElementById('venda').value = valor_caixa;
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
    console.log(texto);
    if (texto == "Deseja Cancelar Venda?") {
        document.location.reload();
        fechamdal()
        return true;
    }


}