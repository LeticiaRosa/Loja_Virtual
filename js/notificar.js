$(async function BUSCA() {
    await $.ajax({
        url: "back_end/busca_autocomplete.php",
        dataType: "json",
        data: {
            acao: 'contar_notificacao'
        },
        success: function(data) {

            quant = data.map(d => d.quant);

            var cols = "";
            cols += '<li>' + '<a href="/loja_virtual/tela_vizualizar_trasferencia.php">' + 'Existe ' + quant + ' trasferencia pendete de aprovação' + '</a>' + '</li>';

            $("#notifica").html(cols);
            if (quant == 0) {
                $('#contador').html();
            } else {
                $('#contador').html(quant);
            }

        },
        complete: function(data) {
            setTimeout(BUSCA, 60000);
        }

    });

});

function pesquisaPermissoes(id_usuario) {
    $.ajax({
            url: "back_end/busca_autocomplete.php",
            dataType: "json",
            data: {
                acao: 'PERMISSOES',
                parametro: id_usuario
            },
            success: function(data) {
                permissao = data.map(d => d.permissao);
                console.log(permissao);


                if (permissao == "Administrador") {
                    document.getElementById("clientes").style.display = 'flex';
                    document.getElementById("caixa").style.display = 'flex';
                    document.getElementById("empresa").style.display = 'flex';
                    document.getElementById("produto").style.display = 'flex';
                    document.getElementById("fornecedor").style.display = 'flex';
                    document.getElementById("estoque").style.display = 'flex';
                    document.getElementById("relatorios").style.display = 'flex';
                    document.getElementById("usuario").style.display = 'flex';
                } else if (permissao == "Caixa") {
                    document.getElementById("caixa").style.display = 'flex';
                } else if (permissao == "Estoque_caixa") {
                    document.getElementById("clientes").style.display = 'flex';
                    document.getElementById("caixa").style.display = 'flex';
                    document.getElementById("produto").style.display = 'flex';
                    document.getElementById("estoque").style.display = 'flex';
                } else if (permissao == "Estoque") {
                    document.getElementById("produto").style.display = 'flex';
                    document.getElementById("estoque").style.display = 'flex';
                }

                console.log("teste");
            }

        }

    );
    /*Administrador, Caixa, Estoque_caixa */


}