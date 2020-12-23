$(window).on("load", $(async function() {
    // Atribui evento e função para limpeza dos campos
    // $('#clicar').on('input', limpaCampos);

    await $.ajax({
        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'Confirma_notificacao',
            parametro: $('#id_tras').val()
        },
        success: function(data) {
            EMPRESA = data.map(d => d.EMPRESA);
            EMPRESA_TRASFERENCIA = data.map(d => d.EMPRESA_TRASFERENCIA);
            nome_usuario = data.map(d => d.nome_usuario);
            qtd_trasfere = data.map(d => d.qtd_trasfere);
            produto = data.map(d => d.produto);
            console.log(data);
            document.getElementById('nome').value = EMPRESA;
            document.getElementById('produto').value = produto;
            document.getElementById('Qtd_tras').value = qtd_trasfere;
            document.getElementById('empresa').value = EMPRESA_TRASFERENCIA;

        }
    });
}));