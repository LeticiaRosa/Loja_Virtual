$(window).on("load", $(async function() {
    // Atribui evento e função para limpeza dos campos
    // $('#clicar').on('input', limpaCampos);
    var id = $('#id').val();
    console.log($('#id').val());
    var nomes = [];
    await $.ajax({
        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'busca',
            parametro: $('#id').val()
        },
        success: function(data) {
            id = data.map(d => d.id_produto);
            nome = data.map(d => d.nome);
            descricao = data.map(d => d.descricao);
            empresa = data.map(d => d.empresa);
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
            document.getElementById('nome').value = nome;
            console.log(data);
        }

    });

}));