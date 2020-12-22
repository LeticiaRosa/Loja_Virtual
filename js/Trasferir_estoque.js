$(async function() {
    // Atribui evento e função para limpeza dos campos
    // $('#clicar').on('input', limpaCampos);

    await $.ajax({
        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'Busca_ult_produto'
        },
        success: function(data) {
            id = data.map(d => d.ID_PRODUTO);
            nome = data.map(d => d.nome);
            quantidate = data.map(d => d.quantidade);
            nome_empresa = data.map(d => d.nome_empresa);
            document.getElementById('id_produto').value = id;
            document.getElementById('nome').value = nome_empresa;
            document.getElementById('produto').value = nome;
            document.getElementById('Quantidade').value = quantidate;



        }
    });

});



$(async function() {
    // Atribui evento e função para limpeza dos campos
    // $('#clicar').on('input', limpaCampos);

    await $.ajax({
        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'Busca_ult_produto_b'
        },
        success: function(data) {
            id = data.map(d => d.ID_PRODUTO);
            nome = data.map(d => d.nome);
            quantidate = data.map(d => d.quantidade);
            nome_empresa = data.map(d => d.nome_empresa);
            document.getElementById('id_produto').value = id;
            document.getElementById('nome').value = nome_empresa;
            document.getElementById('produto').value = nome;
            document.getElementById('Quantidade').value = quantidate;



        }
    });

});