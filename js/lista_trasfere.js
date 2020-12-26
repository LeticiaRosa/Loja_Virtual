$(async function() {
    // Atribui evento e função para limpeza dos campos
    // $('#clicar').on('input', limpaCampos);

    var nomes = [];
    await $.ajax({
        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'autocomplete_empresa',
            parametro: $('#empresa').val()
        },
        success: function(data) {
            nomes = data.map(d => d.nome);

        }
    });
    $("#empresa").autocomplete({
        source: nomes
    });
});

$(window).on("load", $(async function() {
    // Atribui evento e função para limpeza dos campos
    // $('#clicar').on('input', limpaCampos);

    var nomes = [];
    await $.ajax({
        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'Busca_ult_produto_p',
            parametro: $('#id_produto').val()
        },
        success: function(data) {
            id = data.map(d => d.ID_PRODUTO);
            nome = data.map(d => d.nome);
            nome_empresa = data.map(d => d.nome_empresa);
            quantidate = data.map(d => d.quantidade);
            document.getElementById('nome').value = nome_empresa;
            document.getElementById('produto').value = nome;
            document.getElementById('Quantidade').value = quantidate;




        }

    });

}));

function validar() {
    var nome = document.getElementById("nome");
    var empresa = document.getElementById("empresa");
    if (nome.value == empresa.value) {
        $('#conteiner').css("display", "flex");
        return false;
    }
}

function fechamodal() {
    $('#conteiner').css("display", "none");
    var empresa = document.getElementById("empresa");
    empresa.focus();

}