$(async function() {

    // Atribui evento e função para limpeza dos campos
    // $('#clicar').on('input', limpaCampos);

    var nomes = [];
    await $.ajax({
        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'autocomplete_empresa',
            parametro: $('#empresa3').val()
        },
        success: function(data) {
            nomes = data.map(d => d.nome);

        }
    });
    $("#empresa3").autocomplete({
        source: nomes
    });
});
$(async function() {
    // Atribui evento e função para limpeza dos campos
    // $('#clicar').on('input', limpaCampos);

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
            document.getElementById('produto2').value = nome;
            document.getElementById('Quantidade').value = quantidate;




        }

    });

});

function validar() {
    var nome = document.getElementById("nome");
    var empresa = document.getElementById("empresa3");
    var Quantidade = document.getElementById("Quantidade");
    var Qtd_tras = document.getElementById("Qtd_tras");

    if (nome.value == empresa.value) {
        $('#conteiner').css("display", "flex");
        $('#texto').html("Transferencia Não pode ser para mesma empresa, gentileza verificar!!");
        return false;

    } else if (Qtd_tras.value > Quantidade.value) {
        $('#conteiner').css("display", "flex");
        $('#texto').html("Quantidade informada para trasferencia e Maior que quantidade em estoque!!");
        return false;

    }


}

function fechamodal() {
    $('#conteiner').css("display", "none");


}