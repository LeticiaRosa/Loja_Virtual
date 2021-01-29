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


//Para buscar EMPRESA
$(async function() {
    // Atribui evento e função para limpeza dos campos
    // $('#clicar').on('input', limpaCampos);

    await $.ajax({
        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'busca_dados_user',
            parametro: $('#id').val()
        },
        success: function(data) {
            Nome_usuario = data.map(d => d.Nome_usuario);
            LOGIN = data.map(d => d.LOGIN);
            permissao = data.map(d => d.permissao);
            NOME_EMPRESA = data.map(d => d.NOME_EMPRESA);
            observacao = data.map(d => d.observacao);
            document.getElementById('nome').value = Nome_usuario;
            document.getElementById('Login').value = LOGIN;
            document.getElementById('permissao').value = permissao;
            document.getElementById('Empresa').value = NOME_EMPRESA;
            document.getElementById('observacao').value = observacao;


        }
    });
});


function fechamodal_menu() {
    $('#conteiner-1').css("display", "none");
}