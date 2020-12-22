$(async function() {
    // Atribui evento e função para limpeza dos campos
    // $('#clicar').on('input', limpaCampos);

    await $.ajax({
        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'Busca_notificacao'
        },
        success: function(data) {
            id = data.map(d => d.id_trasferencia);
            EMPRESA = data.map(d => d.EMPRESA);
            EMPRESA_TRASFERENCIA = data.map(d => d.EMPRESA_TRASFERENCIA);
            nome_usuario = data.map(d => d.nome_usuario);
            qtd_trasfere = data.map(d => d.qtd_trasfere);



            for (i = 0; i < data.length; i++) {
                var newRow = $('<tr class = "corpo" >');
                var cols = "";
                cols += '<td class="sumir-sempre">' + id[i] + '</td>';
                cols += '<td>' + EMPRESA[i] + '</td>';
                cols += '<td>' + EMPRESA_TRASFERENCIA[i] + '</td>';
                cols += '<td>' + qtd_trasfere[i] + '</td>';


                newRow.append(cols);
                $("#products-table").append(newRow);
            }

        }
    })
});