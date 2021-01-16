//Para buscar CAIXA
$(async function() {
    // Atribui evento e função para limpeza dos campos
    // $('#clicar').on('input', limpaCampos);

    var nomes = [];
    await $.ajax({
        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'BUSCA_CAIXA',
            parametro: $('#nome_caixa').val()
        },
        success: function(data) {

            nomes = data.map(d => d.nome);
        }
    });
    $("#nome_caixa").autocomplete({
        source: nomes
    });
});


function buscaDados() {
    //Para buscar CAIXA
    $(async function() {
        // Atribui evento e função para limpeza dos campos
        // $('#clicar').on('input', limpaCampos);

        var nomes = [];
        await $.ajax({
            url: "back_end/busca_autocomplete.php",
            dataType: "json",
            data: {
                acao: 'BUSCA_CAIXA',
                parametro: $('#nome_caixa').val()
            },
            success: function(data) {
                nomes = data.map(d => d.nome);
                empresa = data.map(d => d.nome_empresa);
                maquina = data.map(d => d.NOME_MAQUINA);
                status = data.map(d => d.STATUS);
                document.getElementById("Empresa1").value = empresa;
                document.getElementById("maquina").value = maquina;
                document.getElementById("status").value = status;
            }
        });
    });
}