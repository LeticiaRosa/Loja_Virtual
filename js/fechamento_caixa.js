$(async function() {
    // Atribui evento e função para limpeza dos campos
    // $('#clicar').on('input', limpaCampos);

    await $.ajax({
        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'FECHA_CAIXA',
            parametro: $('#Maquina').val()
        },
        success: function(data) {

            NOME_CAIXA = data.map(d => d.NOME_CAIXA);
            NOME_EMPRESA = data.map(d => d.NOME_EMPRESA);
            NOME_MAQUINA = data.map(d => d.NOME_MAQUINA);
            NOME_USUARIO = data.map(d => d.NOME_USUARIO);
            DATA_ABERTURA = data.map(d => d.DATA_ABERTURA);
            HORA_ABERTURA = data.map(d => d.HORA_ABERTURA);
            VALOR_INICIAL = data.map(d => d.VALOR_INICIAL);
            document.getElementById("v_Caixa").value = VALOR_INICIAL;
            document.getElementById("Caixa").value = NOME_CAIXA;
            document.getElementById("Loja").value = NOME_EMPRESA;
            document.getElementById("user_abt").value = NOME_USUARIO;
            document.getElementById("dt_abertura").value = DATA_ABERTURA;
            document.getElementById("hr_abertura").value = HORA_ABERTURA;

            time();

        }
    });
});


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
    var str_data = ano4 + '-' + (mes) + '-' + dia;
    document.getElementById("dt_fechamento").value = str_data;
    document.getElementById("hr_fechamento").value = str_hora;
    setTimeout('time()', 1000);
}

$(async function() {
    qtd_total = 0;
    venda_total = 0;
    // Atribui evento e função para limpeza dos campos
    // $('#clicar').on('input', limpaCampos);

    await $.ajax({
        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'BUSCA_DADOS_FECHAMENTO',
            parametro: $('#Maquina').val()
        },
        success: function(data) {
            tirar = 0;
            TIPO_VENDA = data.map(d => d.TIPO_VENDA);
            TOTAL = data.map(d => d.TOTAL);
            QUANTIDADE = data.map(d => d.QUANTIDADE);

            for (i = 0; i < data.length; i++) {
                total_f = formatarMoeda(TOTAL[i]);
                var newRow = $('<tr class = "corpo selecionado" >');
                var cols = "";
                cols += '<td>' + TIPO_VENDA[i] + '</td>';
                cols += '<td>' + 'R$' + total_f + '</td>';
                cols += '<td>' + QUANTIDADE[i] + '</td>';

                if (TIPO_VENDA[i] == 'Retiradas') {
                    venda_total = venda_total - parseFloat(TOTAL[i]);
                    tirar = tirar - parseFloat(QUANTIDADE[i]);

                } else {

                    qtd_total = qtd_total + parseFloat(QUANTIDADE[i]) - tirar;
                    venda_total = venda_total + parseFloat(TOTAL[i]);


                    //console.log(parseFloat(QUANTIDADE[i]));
                }
                newRow.append(cols);
                $("#products-table").append(newRow);



            }
            v_inicial = document.getElementById("v_Caixa").value;
            venda_total = venda_total - parseFloat(v_inicial);
            document.getElementById('qtd_vendas').value = qtd_total;
            document.getElementById('v_total').value = formatarMoeda(venda_total);


        }
    });
});

function formatarMoeda(moeda) {
    atual = moeda
    var f2 = atual.toLocaleString('pt-br', {
        minimumFractionDigits: 2,
        maximumFractionDigits: 2
    });

    //console.log(f2);
    return f2;
}