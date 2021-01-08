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
            parametro: $('#Empresa').val()
        },
        success: function(data) {
            nomes = data.map(d => d.nome);

        }
    });
    $("#Empresa").autocomplete({
        source: nomes
    });
});



document.getElementById('v').addEventListener('mousedown', function() {
    document.getElementById('Senha').type = 'text';
});

document.getElementById('v').addEventListener('mouseup', function() {
    document.getElementById('Senha').type = 'password';
});

// Para que o password não fique exposto apos mover a imagem.
document.getElementById('v').addEventListener('mousemove', function() {
    document.getElementById('Senha').type = 'password';
});