$(async function() {
    // Atribui evento e função para limpeza dos campos
    // $('#clicar').on('input', limpaCampos);

    //console.log($('#Id').val().trim().length);
    if ($('#Id').val().trim() == "") {
        // console.log("entrou no if")
        await $.ajax({
            url: "back_end/busca_autocomplete.php",
            dataType: "json",
            data: {
                acao: 'codigo_barras_max'
            },
            success: function(data) {
                console.log(data);
                nome = data.map(d => d.nome);
                id = data.map(d => d.ID_PRODUTO);
                quantidate = data.map(d => d.quantidade);
                valor = data.map(d => d.PRECO_VENDA);
                codigo = data.map(d => d.codigo_barras)
                document.getElementById('valor_produto').value = valor + ',00';
                document.getElementById('qtd_estoque').value = quantidate;
                document.getElementById('produto1').value = nome;
                document.getElementById('codigo').value = codigo;
                document.getElementById('Id').value = id;
                console.log(document.getElementById('Id').value)


            }
        });

    } else if ($('#Id').val() != "0") {
        //console.log("entrou no else")
        await $.ajax({
            url: "back_end/busca_autocomplete.php",
            dataType: "json",
            data: {
                acao: 'codigo_barras',
                parametro: $('#Id').val()
            },
            success: function(data) {
                nome = data.map(d => d.nome);
                id = data.map(d => d.ID_PRODUTO);
                quantidate = data.map(d => d.quantidade);
                valor = data.map(d => d.PRECO_VENDA);
                codigo = data.map(d => d.codigo_barras)

                //   document.getElementById('Id').value = id;
                document.getElementById('valor_produto').value = valor + ',00';
                document.getElementById('qtd_estoque').value = quantidate;
                document.getElementById('produto1').value = nome;
                document.getElementById('codigo').value = codigo;


            }
        });
    }
});