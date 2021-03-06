$(async function() {
    // Atribui evento e função para limpeza dos campos
    // $('#clicar').on('input', limpaCampos);

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
            document.getElementById('descricao').value = descricao;
            document.getElementById('empresa1').value = empresa;
            document.getElementById('id_categoria').value = NOME_CATEGORIA;
            document.getElementById('id_sub_categoria').value = NOME_SUB_CATEGORIA;
            document.getElementById('preco_venda').value = preco_venda;
            document.getElementById('preco_custo').value = preco_custo;
            document.getElementById('quantidade').value = quantidade;
            document.getElementById('id_fornecedor').value = FORNECEDOR;
            document.getElementById('marca').value = marca;
            document.getElementById('unidade_medida').value = unidade_medida;
            document.getElementById('valor_medida').value = valor_medida;
            document.getElementById('observacao').value = observacao;
            /*
                        if (id == codigo_barras) {
                            document.getElementById('radio-1').checked = true;
                        } else {
                            document.getElementById('radio-2').checked = true;
                        }
                        document.getElementById('gerar_codigo_1').value = codigo_barras;
            */

        }

    });

});

function fechamodal_menu() {
    $('#conteiner-1').css("display", "none");
}