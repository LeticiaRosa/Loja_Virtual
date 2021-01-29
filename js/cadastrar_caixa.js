//Para buscar EMPRESA
$(async function() {
    // Atribui evento e função para limpeza dos campos
    // $('#clicar').on('input', limpaCampos);

    var nomes = [];
    await $.ajax({
        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'autocomplete_empresa',
            parametro: $('#Empresa1').val()
        },
        success: function(data) {
            nomes = data.map(d => d.nome);

        }
    });
    $("#Empresa1").autocomplete({
        source: nomes
    });
});

function fechamodal_menu() {
    $('#conteiner-1').css("display", "none");
}